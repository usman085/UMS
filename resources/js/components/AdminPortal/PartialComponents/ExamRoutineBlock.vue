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
             <template v-if="examRoutine.length > 0">
              <tr v-for="examDetail in examRoutine" :key="examDetail.id">
                <td>{{ examDetail.program.program_title }}</td>
                <td>{{ examDetail.semester }}</td>
                <td>{{ examDetail.shift.shift }}</td>

                <td>
                  <v-menu offset-y>
                    <template v-slot:activator="{ on, attrs }">
                      <v-icon color="primary" v-bind="attrs" v-on="on">mdi-dots-vertical</v-icon>
                    </template>
                    <v-list>
                      <v-list-item :to="{name:'ExamRoutinePreview',params: { id:examDetail.id,slug:examDetail.program.program_title } }">
                        <v-list-item-title >
                         
                            <v-icon class="mr-2" >mdi-eye</v-icon>Preview
                         
                        </v-list-item-title>
                      </v-list-item>
                      <v-list-item  :to="{name:'EditExamRoutine',params: { id:examDetail.id,slug:examDetail.program.program_title } }">
                        <v-list-item-title>
                          <v-icon class="mr-2">mdi-tooltip-edit</v-icon>Modify
                        </v-list-item-title>
                      </v-list-item>
                      <v-list-item @click="delet(examDetail.id)">
                        <v-list-item-title class="cursor" >
                          <v-icon class="mr-2" >mdi-delete</v-icon>Delete
                        </v-list-item-title>
                      </v-list-item>
                    </v-list>
                  </v-menu>
                </td>
              </tr>
              </template>
                <tr v-else>
                            <td colspan="7" class="text-center">
                                <template v-if="message">

                                    <v-progress-circular indeterminate color="primary"></v-progress-circular>
                                </template>
                                <template v-else>No Data Found!</template>
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
         message: true,
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
            axios.post(process.env.MIX_APP_URL + "/get-exam-routine", "", {headers: headers})
              .then(response => { 
                    this.examRoutine = response.data.examRoutine;
                    this.message = false;
                })
                .catch(error => {});
        },
      
      delet: function(id) {
      // Headers are defined for authentication
      let headers = {
        "Content-Type": "application/json",
        Authorization: "Bearer  " + this.userAuth.token
      };
      // send request to Api Route
      axios
        .post(process.env.MIX_APP_URL + "/delete-exam-routine",{ id: id},{headers: headers})
        .then(res => {
          // this.snackbar = true;
          // this.succesMessage = "Course Delete Successfully!";
          this.getExamRoutine();
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
            return cryptoJSON.decrypt(JSON.parse(localStorage.getItem("adminLogin")),"ums");
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
.cursor{
  cursor: pointer;
}
</style>
