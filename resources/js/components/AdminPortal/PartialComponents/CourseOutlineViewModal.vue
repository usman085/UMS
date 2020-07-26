<template>
  <div>
    <v-row justify="center">
      <v-dialog v-model="$store.state.CourseOutlineView" fullscreen  hide-overlay   transition="dialog-bottom-transition">
        <v-card>
          <v-toolbar dark color="primary">
            <v-btn icon dark @click="$store.dispatch('CourseOutlineView')">
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title>Scheme Of Studies</v-toolbar-title>
            <v-spacer></v-spacer>
            <div class="mr-5">
              <v-btn  color="primary" @click="editCourseOutline()">
               <v-icon  class="mr-2">mdi-tooltip-edit</v-icon>Edit
               </v-btn>
            </div>
            <div>
             <v-btn  color="primary" @click="deleteCourseOutline(courseDetailOutline.id)">
              <v-icon class="mr-2">mdi-delete</v-icon>Delete
              </v-btn>
            </div>
          </v-toolbar>
          <template v-if="course.course_outline">
            <v-list>
              <v-list-item>
                <v-list-item-content>
                  <v-list-item-title class=" mb-3">
                    <span class="mr-2">Course Name :</span>
                    {{course.course_title}}
                  </v-list-item-title>
                    <v-list-item-title  class=" mb-3">   
                    <span class="mr-2">Prerequisites: </span>
                    {{ courseDetailOutline.prerequisite }}
                    </v-list-item-title>  
                  <v-list-item-title class=" mb-3">
                    <span class="mr-2">Credit Hours: </span>
                    {{course.credit_hours}}
                  </v-list-item-title>
                  <v-list-item-title class=" mb-3">
                    <span class="mr-2 ">Lectures:</span>
                    {{ courseDetailOutline.lectures }}
                  </v-list-item-title>

                   <v-list-item-title class=" mb-3">
                    <span class="mr-2 "> Labs:</span>
                    {{ courseDetailOutline.labs }} 
                  </v-list-item-title>
 

                
                </v-list-item-content>
              </v-list-item>
            </v-list>

            <v-divider></v-divider>
            <div class="outline-wraper" v-html="courseDetailOutline.course_outline"></div>
          </template>

          <template v-else>
            <div class="add-outline-block">
              <h4 class="text-center">Still No any</h4>
            </div>
          </template>
        </v-card>
      </v-dialog>
    </v-row>

    <EditCourseOutlineModal :courseDetailOutline="courseDetailOutline" :course="course"></EditCourseOutlineModal>
  
    <!-- SnakeBar To display Success Message -->
    <v-snackbar top right v-model="snackbar" color="success">
      {{ succesMessage }}
      <template v-slot:action="{ attrs }">
        <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">Close</v-btn>
      </template>
    </v-snackbar>
  </div>
</template>

<script>
import EventBus from "../../../EventBus/eventBus";
import EditCourseOutlineModal from "./EditCourseOutlineModal";

export default {
  props: ["course", "courseDetailOutline"],
  name: "CourseOutlineViewModal",
   data() {
    return {
      succesMessage: "",
      snackbar: false,
    };
  },
  components: {
    EditCourseOutlineModal
  },
  methods: {
    deleteCourseOutline(id){      
      // Headers are defined for authentication
      let headers = {
        "Content-Type": "application/json",
        Authorization: "Bearer  " + this.userAuth.token
      };
      // send request to Api Route
      axios.post(process.env.MIX_APP_URL + "/del-course-outline",{id: id},{headers: headers})
        .then(res => {
          this.snackbar = true;
          this.succesMessage = "Course Outline Delete Successfully!";
          this.$store.dispatch("CourseOutlineView");
          EventBus.$emit("courseEdited");
        })
        .catch(error => {});
    },
    editCourseOutline() {
      this.$store.dispatch("EditCourseOutlineModalToggle");
    }
  },
   computed: {
    //User Auth function authorizing Admin & use in Header
    userAuth: function() {
      return cryptoJSON.decrypt(JSON.parse(localStorage.getItem("adminLogin")),"ums");
    }
  },
 
};
</script>

<style scoped>
.v-list--three-line .v-list-item .v-list-item__subtitle,
.v-list-item--three-line .v-list-item__subtitle {
  white-space: initial;
  -webkit-line-clamp: unset !important;
  -webkit-box-orient: vertical;
  display: -webkit-box;
}
.v-list-item__title,
.v-list-item__subtitle {
  flex: 1 1 100%;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: unset !important;
}
.outline-wraper {
  padding: 18px;
}
.add-outline-block {
  position: absolute;
  left: 0;
  right: 0;
  top: 50%;
}
</style>