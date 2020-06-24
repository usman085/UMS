<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
      <v-card>

          <v-toolbar height:100 dark color="primary">
            <v-btn icon dark @click=" $store.dispatch('AssignmentDetailPageModalToggle')">
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-row>
              <v-toolbar-title class="text-center">Object Oriented Programming</v-toolbar-title>

              <v-item></v-item>
              <v-spacer></v-spacer>

              <span class="float-right">Assignment # 2</span>
            </v-row>
          </v-toolbar>

          <v-toolbar>
            <v-row>
            <v-toolbar-title class="subheading ">
              <p>Semester 6 [Fall-17]</p>
              <p>Course Code (CSI-302)</p>
            </v-toolbar-title>

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
           <v-container>
           <fieldset class="form-field-sets">
             <legend class="form-field-set-name text-center">Instructions</legend>
             <div class="instruction-block">
             <p>Please Read the following instruction carefully before Submitting Assignment.</p>
             <nav>
               <ul>
                 <li></li>
               </ul>
             </nav>
             </div>
           </fieldset>
           </v-container>
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
.subheading {
  font-size: 14px;
  text-align: center;
  padding-top: 10px;
}
.subheading p{
  margin-bottom: 0;
}
.instruction-block{
  font-size:12px ;
}
.instruction-block ul li{
  list-style-type: square;
}
.form-field-sets{
  margin-top: 10px;
    padding: 10px;
    border-radius: 6px;
    border-color:rgba(0, 0, 0, 0.12);
    margin-bottom: 10px;
}
.form-field-set-name{
    font-weight: bold;
    color:rgba(0, 0, 0, 0.45);
    padding: 0 10px;
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
