<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon dark @click="$store.dispatch('CourseOutlinePageModalToggle')">
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-toolbar-title>Scheme Of Studies</v-toolbar-title>
          <v-spacer></v-spacer>
        </v-toolbar>
        <v-list subheader>
          <v-list-item>
            <v-list-item-content class="text-center">
              <v-list-item-title>Semester 1</v-list-item-title>
              <v-list-item-subtitle>BSSE-Fall-17</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title><span cl>Course Name </span>: DBMS</v-list-item-title>
              <v-list-item-title>Course Structure: Lectures: 3, Labs: 1 Credit Hours: 4</v-list-item-title>

              <v-list-item-title>Prerequisites: None</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>

        <v-divider></v-divider>
        <v-list three-line subheader>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Objective :</v-list-item-title>
              <v-list-item-subtitle>The course is designed to familiarize students with the basic structured programming skills. It emphasizes upon problem analysis, algorithm designing, and program development and testing.</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Course Outline: </v-list-item-title>
              <v-list-item-subtitle>Overview of computers and programming. Overview of language for e.g. C language C. Basics of structured and Modular programming. Basic Algorithms and problem solving, development of basic algorithms, analyzing problem, designing solution, testing designed solution. Fundamental programming constructs, translation of algorithms to programs, data types, control structures, functions, arrays, records, files, testing programs</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Reference Material: </v-list-item-title>
              <v-list-item-subtitle>1. Problem Solving and Program Design in C / 6E Hanly & Koffman   Addison-Wesley | Published: 02/06/2009 ISBN-10: 0321535421 | ISBN-13: 9780321535429
  </v-list-item-subtitle>
            <v-list-item-subtitle>2. C How to Program, 5/E   (Harvey & Paul) Deitel & Deitel, ISBN-10: 0132404168 ISBN13: 9780132404167 Publisher: Prentice Hall Copyright: 2007</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>


        </v-list>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  name: "CourseOutlinePage",
  data() {
    return {};
  },
  computed: {
    dialog: function() {
      return this.$store.state.CourseOutlinePageModal;
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
</style>
