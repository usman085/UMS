<template>
  <div class="time-table-wrapper">
    <v-card max-width="96%">
      <v-card-title>
        Manage Exam Routine
        <v-btn class="create-btn" @click="addExamRoutine()">
          <v-icon>mdi-plus-circle</v-icon>Add Exam Routine
        </v-btn>
      </v-card-title>
      <v-card-subtitle>All Exam Routines are manage here.</v-card-subtitle>
      <v-card-text>
        <v-simple-table>
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">Program Title</th>
                <th class="text-left">Semester</th>
                <th class="text-left">Shift</th>
                <th class="text-left">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ examRoutine }}</td>
                <td></td>
                <td></td>

                <td>
                  <v-menu offset-y>
                    <template v-slot:activator="{ on, attrs }">
                      <v-icon color="primary" v-bind="attrs" v-on="on">mdi-dots-vertical</v-icon>
                    </template>
                    <v-list>
                      <v-list-item>
                        <v-list-item-title>
                          <v-btn :to="{name:'ExamRoutinePreview'}">
                            <v-icon class="mr-2" >mdi-eye</v-icon>Preview
                          </v-btn>
                        </v-list-item-title>
                      </v-list-item>
                      <v-list-item>
                        <v-list-item-title>
                          <v-icon class="mr-2">mdi-tooltip-edit</v-icon>Modify
                        </v-list-item-title>
                      </v-list-item>
                      <v-list-item>
                        <v-list-item-title>
                          <v-icon class="mr-2">mdi-delete</v-icon>Delete
                        </v-list-item-title>
                      </v-list-item>
                    </v-list>
                  </v-menu>
                </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
      </v-card-text>
    </v-card>
  </div>
</template>

<script>
export default {
  name: "ExamRoutineBlock",
  data(){
    return{
      examRoutine:[],
    }
  },
  methods: {
     // getting program from Database
        getExamRoutine: function () {
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            // send request to Api Route
            axios
                .post(process.env.MIX_APP_URL + "/get-exam-routine", "", {
                    headers: headers
                })
                .then(response => {
                  console.log(response);
                    this.examRoutine = response.data.data;
                })
                .catch(error => {});
        },

    addExamRoutine: function() {
      this.$router.push({
        name: "AddExamRoutine"
      });
    }
  },
  computed:{
     //User Auth function authorizing Admin & use in Header
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("adminLogin")),
                "ums"
            );
        },
  },
  created(){
    this.getExamRoutine();
  }
};
</script>

<style scoped>
.create-btn {
  position: absolute;
  float: right;
  right: 10px;
}

.status-chip {
  color: white;
}
</style>
