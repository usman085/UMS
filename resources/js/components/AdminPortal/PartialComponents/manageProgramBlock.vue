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
                      <v-list-item @click="editProgram(item.id)">
                        <v-list-item-title>Modify</v-list-item-title>
                      </v-list-item>
                      <v-list-item @click="deleteItem(item.id)">
                        <v-list-item-title>Delete</v-list-item-title>
                      </v-list-item>
                       <v-list-item>
                        <v-list-item-title @click="addCourseModal(item)">
                        <v-icon color="primary">mdi-plus</v-icon>Add Course
                        </v-list-item-title>
                      </v-list-item>
                      <v-list-item>
                        <v-btn
                          small
                          color="primary"
                          class="create-btn pa-1"
                          @click="assigedCourses(item.id)"
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
      <v-snackbar top right v-model="snackbar" color="success">
        {{succesMessage}}
        <template v-slot:action="{ attrs }">
          <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">Close</v-btn>
        </template>
      </v-snackbar>
    </v-card>
    <AssignCoursesModal :AssignCourseData="AssignCourseData"></AssignCoursesModal>
  <CourseAssignModal></CourseAssignModal>
    <AddProgramModal :editData="editRow" :editRowMessage="editRowMessage"></AddProgramModal>
  </div>
</template>

<script>
import EventBus from "../../../EventBus/eventBus";
import AssignCoursesModal from "./AssignCoursesModal";
import AddProgramModal from "./AddProgramModal";
import CourseAssignModal from './CourseAssignModal';
export default {
  name: "manageProgramblock",

  data() {
    return {
      AssignCourseData:[],
      succesMessage: "",
      snackbar: false,
      editRowMessage: false,
      allProgram: [],
      editRow: {
        id: "",
        program_title: "",
        program_short_title: "",
        program_duration: "",
        no_of_semester: ""
      }
    };
  },
  components: {
    AddProgramModal,
    AssignCoursesModal,
    CourseAssignModal
  },
  computed: {
    userAuth: function() {
      return cryptoJSON.decrypt(
        JSON.parse(localStorage.getItem("adminLogin")),
        "ums"
      );
    }
  },
  methods: {
    assigedCourses:function(id){
      let headers={
        'Content-type':'application/json',
         'Authorization': "Bearer  " + this.userAuth.token
      }
        axios.post(process.env.MIX_APP_URL+'/assign-courses',{'id':id},{headers:headers})
        .then(res=>{
            this.AssignCourseData=res.data;
            this.$store.dispatch('AssignCoursesModalToggle');
        })
        .catch(err=>console.log('eer'));
        
    },
    addCourseModal:function(program){
        console.log(program);
    },
    editProgram: function(id) {
      let editData = this.$store.state.allProgram.filter(item => item.id == id);  
      this.editRow.id = editData[0].id;
      this.editRow.program_title = editData[0].program_title;
      this.editRow.program_short_title = editData[0].program_short_title;
      this.editRow.program_duration= editData [0].program_duration;
      this.editRow.no_of_semester = editData[0].no_of_semester;
      this.editRowMessage = true;
      this.$store.dispatch("AddProgramModalToggle");
    },
    deleteItem: function(id) {
      let headers = {
        "Content-Type": "application/json",
         'Authorization': "Bearer  " + this.userAuth.token
      };
      axios
        .post(
          process.env.MIX_APP_URL + "/del-program",
          {
            id: id
          },
          {
            headers: headers
          }
        )
        .then(res => {
          this.snackbar = true;
          this.succesMessage = "Program Delete Successfully!";
          this.getProgram();
        })
        .catch(err => alert(err));
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
    EventBus.$on("EditProgram", () => {
      this.getProgram();
      this.editRowMessage = false;
    });
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
