<template>
  <div>
    <v-row justify="center">
      <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
        <v-card>
          <v-toolbar dark color="primary">
            <v-btn icon dark @click="$store.dispatch('AssignOutlineModalToggle')">
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title></v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
              <v-btn
                dark
                text
                @click="$store.dispatch('AssignOutlineModalToggle'),snackbar = true"
              >Save</v-btn>
            </v-toolbar-items>
          </v-toolbar>
          <v-card-text>
            <v-container>
              <v-row>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="Lectures*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="Lab*"></v-text-field>
                </v-col>
              </v-row>
              <small>*indicates required field</small>
            </v-container>
          </v-card-text>
          <v-divider></v-divider>
          <div class="application-form-wrapper">
            <v-container>
              <v-row>
                <v-col cols="12" sm="12" md="12">
                  <label>Course Outline</label>
                  <ckeditor :editor="editor"></ckeditor>
                </v-col>
              </v-row>

              <v-row>
                <v-col cols="11" sm="12" md="12">
                  <div class="my-2">
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
import Vue from "vue";
import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
Vue.use(CKEditor);
export default {
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
    }
  }
};
</script>
