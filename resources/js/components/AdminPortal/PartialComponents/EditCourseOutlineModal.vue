<template>
  <div>
    <v-row justify="center">
      <v-dialog
        v-model="$store.state.EditCourseOutlineModal"
        fullscreen
        hide-overlay
        transition="dialog-bottom-transition"
      >
        <v-card>
          <v-toolbar dark color="primary">
            <v-btn icon dark @click="$store.dispatch('EditCourseOutlineModalToggle')">
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title></v-toolbar-title>
            <v-spacer></v-spacer>
          </v-toolbar>
          <v-card-text>
            <v-container>
              <v-row>
                <v-col cols="12" sm="12" md="12">
                  <v-text-field label="Prerequisite*" v-model="courseOutline.prerequisite"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="Total Lectures*" v-model="courseOutline.lectures"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="Total Labs*" v-model="courseOutline.labs"></v-text-field>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
          <div class="application-form-wrapper">
            <v-container>
              <v-row>
                <v-col cols="12" sm="12" md="12">
                  <label>Course Outline</label>
                  <ckeditor v-model="courseOutline.course_outline" :editor="editor"></ckeditor>
                </v-col>
              </v-row>
              <small class="text-right">*indicates required field</small>
              
              <v-row>
                <v-col cols="11" sm="12" md="12">
                  <div class="my-2">
                    <v-btn color="primary" @click="UpdateOutline()">Update</v-btn>
                  </div>
                </v-col>
              </v-row>
            </v-container>
          </div>
        </v-card>
      </v-dialog>
    </v-row>
  </div>
</template>

<script>
import EventBus from "../../../EventBus/eventBus";
import Vue from "vue";
import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
export default {
  props: ["course", "courseDetailOutline"],
  name: "EditCourseOutlineModal",
  data() {
    return {
      editor: ClassicEditor
    };
  },
  computed: {
       userAuth: function() {
      return cryptoJSON.decrypt(
        JSON.parse(localStorage.getItem("adminLogin")),
        "ums"
      );
    },
    courseOutline: function() {
      return {
        prerequisite:this.courseDetailOutline.prerequisite,
        lectures:this.courseDetailOutline.lectures,
        labs:this.courseDetailOutline.labs,
        course_outline:this.courseDetailOutline.course_outline,

        id: this.courseDetailOutline.id
      };
    }
  },
  methods:{
      UpdateOutline(){
           // Headers are defined for authentication
      let headers = {
        "Content-Type": "application/json",
        Authorization: "Bearer  " + this.userAuth.token
      };

      axios
        .post(
          process.env.MIX_APP_URL + "/update-course-outline",
          this.courseOutline,
          {
            headers: headers
          }
        )
        .then(res => {
          this.$store.dispatch("EditCourseOutlineModalToggle");
          EventBus.$emit("courseEdited");
        })
        .catch(() => {});
    
      }
  }

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
