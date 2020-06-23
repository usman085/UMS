<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
      <v-card>

          <v-toolbar height:100 dark color="primary">
            <v-btn
              icon
              dark
              @click="
                                $store.dispatch(
                                    'AssignmentDetailPageModalToggle'
                                )
                            "
            >
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-row>
              <v-toolbar-title>Object Oriented Programming</v-toolbar-title>

              <v-item></v-item>
              <v-spacer></v-spacer>

              <span class="float-right">Assignment # 2</span>
            </v-row>
          </v-toolbar>

          <v-toolbar>
            <v-row>
            <v-toolbar-title class="subheading ">Semester 6 [Fall-17]</v-toolbar-title>

            <v-divider class="mx-4" inset vertical></v-divider>
            <v-spacer></v-spacer>

            <v-toolbar-items  class=" float-right">
              <v-divider inset vertical></v-divider>

              <span class="marks" text>Total Marks : 12</span>

              <v-divider inset vertical></v-divider>

              <v-divider inset vertical></v-divider>
            </v-toolbar-items>
            </v-row>
          </v-toolbar>


          <v-card class="mx-auto">
            <v-list-item three-line>
              <v-list-item-content>
                <v-list-item-title class="headline mb-5 text-center">Instructions</v-list-item-title>
                <v-list-item>Please Read the instructions befor submitting assignment</v-list-item>
                <v-list-item
                  class="mt-2"
                >It should be clear that your assignment will not get any credit if :</v-list-item>

                <v-list-item>
                  <p class="red--text text--lighten-1">
                    <v-icon class="icon mr-2">mdi-checkbox-blank-circle</v-icon>The assignment is submitted after due date.
                  </p>
                </v-list-item>

                <v-list-item>
                  <p class="red--text text--lighten-1">
                    <v-icon class="icon mr-2">mdi-checkbox-blank-circle</v-icon>The submitted assignment does not open or file is corrupt.
                  </p>
                </v-list-item>

                <v-list-item>
                  <p class="red--text text--lighten-1">
                    <v-icon class="icon mr-2">mdi-checkbox-blank-circle</v-icon>All types of plagiarism are strictly prohibited.
                  </p>
                </v-list-item>
                <v-list-item>
                  <p>
                    Note 1:
                    <span class="red--text text--lighten-1 line">
                      You have to submit java files. Assignment in any other format (extension) will not be accepted. If you
                      will submit code in .doc (Word document) or .txt file then you will get zero marks.
                    </span>
                  </p>
                </v-list-item>

                <v-list-item>
                  <p>
                    Note 2:
                    <span
                      class="red--text text--lighten-1"
                    >This is a simple assignment so do not cheat.</span>
                  </p>
                </v-list-item>

                <v-list-item>
                  <p>
                    <span class="md-4">Procedure :</span>
                    <span class="red--text text--lighten-1" id="line">
                      Place all the files in a folder and name it as
                      “SectionName_RegistrationNumber_StudentName_AssignmentNo” e.g.
                      “A_BCS-FA10_ID_AHMAD_ASSIGN2”
                      Open the folder \\172.16.17.35\Shahid Bhatti\OOP” and Right click on the folder by your section name and
                      paste there. In case of any genuine problem you can mail me on the following id but the mail subject should be
                      the same as your folder name.
                      <br />Email :Demo@gmail.com
                    </span>
                  </p>
                </v-list-item>
              </v-list-item-content>
            </v-list-item>
          </v-card>



          <v-card class="mx-auto">
            <v-list-item three-line>
              <v-list-item-content>
                <v-list-item-title class="headline mb-5 text-center">Details</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-card>
        
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  name: "AssignmentDetailPage",
  data() {
    return {};
  },
  computed: {
    dialog: function() {
      return this.$store.state.AssignmentDetailPageModal;
    }
  }
};
</script>

<style scoped>
.ref-doc-wrapper {
  width: 50%;
}
.ref-doc {
  width: 50%;
  font-size: 11px;
  color: rgba(0, 0, 0, 0.6);
  padding: 5px;
  background: rgba(200, 200, 200, 1);
  font-weight: bold;
}
.list-detail {
  color: rgba(0, 0, 0, 0.6);
  line-height: 1.2;
  font-size: 0.875rem;
}
.download-file {
  text-align: right;
  font-size: 11px;
  padding-left: 10px;
  padding-right: 5px;
}
.mdi-arrow-collapse-down,
.mdi-arrow-collapse-down:hover {
  text-align: right;
  cursor: pointer;
  font-size: 15px;
  font-weight: bold;
}
.marks {
  padding: 20px;
}
.icon {
  font-size: 12px;
}
.mdi-checkbox-blank-circle::before {
  content: "\F012F";
  color: #ff07078f;
}
.line {
  line-height: 2 !important;
}
#line {
  line-height: 2;
}
.next {
  justify-content: center;
}
@media only screen and (max-width: 600px) {
  .marks {
    padding: 0px;
  }
}
</style>
