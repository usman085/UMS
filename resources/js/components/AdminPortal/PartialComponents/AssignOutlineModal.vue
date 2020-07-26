<template>
  <div>
    <v-row justify="center">
      <v-dialog
        v-model="$store.state.AssignOutlineModal"
        fullscreen
        hide-overlay
        transition="dialog-bottom-transition"
      >
        <v-card>
          <v-toolbar dark color="primary">
            <v-btn icon dark @click="$store.dispatch('AssignOutlineModalToggle')">
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title>{{ course.course_title }}</v-toolbar-title>
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
                  <div class="my-2" v-if="course.course_outline">
                    <v-btn color="primary" @click="UpdateOutline()" :disabled="submitBtn">Update</v-btn>
                  </div>
                  <div class="my-2" v-else>
                    <v-btn color="primary" @click="Submit()" :disabled="submitBtn">Submit</v-btn>
                  </div>
                </v-col>
              </v-row>
            </v-container>
          </div>
        </v-card>
      </v-dialog>
    </v-row>
    <v-snackbar top right v-model="snackbar" color="success">
      Course Outline is Added successfully!
      <template v-slot:action="{ attrs }">
        <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">Close</v-btn>
      </template>
    </v-snackbar>
  </div>
</template>

<script>
import EventBus from "../../../EventBus/eventBus";
import Vue from "vue";
import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
Vue.use(CKEditor);
export default {
  props: ["course"],
  name: "AssignOutlineModal",
  data() {
    return {
      editor: ClassicEditor,
      values: [],
      value: null,
      editorConfig: {
        // The configuration of the editor.
      },
      submitBtn: false,
      snackbar: false,
      semester: ["1", "2", "3", "4", "5"],
      session: ["fall-17-2020", "fall-17-2021", "fall-17-2022"]
    };
  },
  computed: {
    dialog: function() {
      return this.$store.state.AssignOutlineModal;
    },
    courseOutline: function() {
      return {
        prerequisite: "",
        lectures: "",
        labs: "",
        course_outline: "",
        //   course_id:this.course.id,
        id: this.course.id
      };
    },
    userAuth: function() {
      return cryptoJSON.decrypt(
        JSON.parse(localStorage.getItem("adminLogin")),
        "ums"
      );
    }
  },
  methods: {
    Submit: function() {
      // Headers are defined for authentication
      let headers = {
        "Content-Type": "application/json",
        Authorization: "Bearer  " + this.userAuth.token
      };
      axios.post(process.env.MIX_APP_URL + "/add-course-outline", this.courseOutline,{headers: headers})
            .then(res => {
              this.$store.dispatch("AssignOutlineModalToggle");
              EventBus.$emit("courseEdited");
            })
          .catch(() => {});
    }
  }
};
</script>
