<template>
  <div class="time-table-wrapper">
    <v-card max-width="96%">
      <v-card-title>
        Manage Programs
        <v-btn class="create-btn" @click="$store.dispatch('AddProgramModalToggle')">
          <v-icon>mdi-plus-circle</v-icon>Add New Program
        </v-btn>
      </v-card-title>
      <v-card-subtitle>All Programs are manage here.</v-card-subtitle>
      <v-card-text>
        <v-simple-table>
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">Program Title</th>
                <th class="text-left">Short Name</th>
                <th class="text-left">Duration</th>
                <th class="text-left">No of Semesters</th>
                <th class="text-left">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in $store.state.allProgram " :key="item.id">
                <td>{{ item.program_title }}</td>
                <td>{{ item.program_short_title }}</td>
                <td>{{ item.no_of_semester }}</td>
                <td>{{ item.program_duration }}</td>

                <td>
                  <v-menu offset-y>
                    <template v-slot:activator="{ on, attrs }">
                      <v-icon color="primary" v-bind="attrs" v-on="on">mdi-dots-vertical</v-icon>
                    </template>
                    <v-list>
                      <v-list-item>
                        <v-list-item-title>Modify</v-list-item-title>
                      </v-list-item>
                      <v-list-item>
                        <v-btn small color="primary"   @click="deleteItem(item.id)" class="create-btn pa-1">Delete</v-btn>
                      </v-list-item>
                      <v-list-item>
                        <v-list-item-title>Assign Courses</v-list-item-title>
                      </v-list-item>
                      <v-list-item>
                        <v-btn
                          small
                          color="primary"
                          class="create-btn pa-1"
                          @click="$store.dispatch('AssignCoursesModalToggle')"
                        >Assigned Course</v-btn>
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
    <AssignCoursesModal></AssignCoursesModal>
    <AddProgramModal></AddProgramModal>
  </div>
</template>

<script>
import EventBus from "../../../EventBus/eventBus";
import AssignCoursesModal from "./AssignCoursesModal";
import AddProgramModal from "./AddProgramModal";
export default {
  name: "manageProgramblock",
  data() {
    return {
      allProgram: []
    };
  },
  components: {
    AddProgramModal,
    AssignCoursesModal
  },
  methods: {
    deleteItem:function(id){
      alert(id);
    },
    getProgram: function() {
      let data = cryptoJSON.decrypt(
        JSON.parse(localStorage.getItem("adminLogin")),
        "ums"
      );
      const headers = {
        "Content-Type": "application/json",
        Authorization: "Bearer  " + data.token
      };
      console.log(headers);
      axios
        .post(process.env.MIX_APP_URL + "/get-program", "", {
          headers: headers
        })
        .then(res => {
          console.log(res);
          this.$store.dispatch("allProgram", res.data.allProgram);
        })
        .catch(err => {
          if (error.response.status === 401) {
            this.$router.push({
              name: "login"
            });
          }
        });
    }
  },
  created() {
    EventBus.$on("programEdited", () => this.getProgram());
    this.$store.dispatch("overlay");
    this.getProgram();
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
