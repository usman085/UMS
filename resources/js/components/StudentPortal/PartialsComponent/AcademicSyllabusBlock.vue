<template>
  <div>
    <v-simple-table class="mt-5 elevation-2">
      <template>
        <thead>
          <tr>
            <th class="text-center headline">Course Code</th>
            <th class="text-center headline">Course Title</th>
            <th class="text-center headline">Credit Hours</th>
            <th class="text-center headline">Course Outline</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="ite in ites" :key="ite.name">
            <td class="text-center body-1">{{ ite.coursecode }}</td>
            <td class="text-center body-1">{{ ite.coursetitle }}</td>
            <td class="text-center body-1">{{ ite.credithours }}</td>
            <td class="text-center body-1" @click="CourseOutlineModal()">
              <v-icon class="list-acnhor">mdi-eye</v-icon>
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
    <div class="mt-7">
      <span v-for="itemm in itemms" :key="itemm.name">
        <v-menu offset-y>
          <template v-slot:activator="{ on }">
            <v-btn class="my-2" v-on="on">{{ itemm.semester }}</v-btn>
          </template>

          <v-simple-table class="mt-7 elevation-2">
            <template>
              <thead>
                <tr>
                  <th class="text-center">Course Code</th>
                  <th class="text-center">Course Title</th>
                  <th class="text-center">Credit Hours</th>
                  <th class="text-center">Scheme of Studies</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="semester in semesters" :key="semester.name">
                  <td class="text-center">{{ semester.coursecodeS1 }}</td>
                  <td class="text-center">{{ semester.coursetitleS1 }}</td>
                  <td class="text-center">{{ semester.credithoursS1 }}</td>
                  <td class="text-center">
                    <v-icon class="list-acnhor">mdi-eye</v-icon>
                  </td>
                </tr>
              </tbody>
            </template>
          </v-simple-table>
        </v-menu>
      </span>
    </div>

    <!-- AssignmentDetailPage -->

    <CourseOutlinePage></CourseOutlinePage>

    <!-- AssignmentDetailPage -->
  </div>
</template>
<script>
import CourseOutlinePage from "./CourseOutlinePage";
export default {
  name: "ClassRoutineBlock",
  components: { CourseOutlinePage },
  methods: {
    CourseOutlineModal: function() {
      this.$store.dispatch("CourseOutlinePageModalToggle");
    }
  },
  data() {
    return {
      ites: [
        {
          coursecode: "CSI-402",
          coursetitle: "DBMS",
          credithours: "4(3-1)",

        },
        {
          coursecode: "CRI-472",
          coursetitle: "Software Engineering",
          credithours: "4(3-0)",

        },
        {
          coursecode: "PAK-402",
          coursetitle: "Economics",
          credithours: "3(3-0)",

        },
        {
          coursecode: "CSI-402",
          coursetitle: "DBMS",
          credithours: "4(3-1)",

        }
      ],
      semesters: [
        {
          coursecodeS1: "CSI-402",
          coursetitleS1: "DBMS",
          credithourS1: "4(3-1)",

        },
        {
          coursecodeS1: "CRI-472",
          coursetitle: "Software Engineering",
          credithours: "4(3-0)",

        },
        {
          coursecode: "PAK-402",
          coursetitle: "Economics",
          credithours: "3(3-0)",

        },
        {
          coursecode: "CSI-402",
          coursetitle: "DBMS",
          credithours: "4(3-1)",

        }
      ],
      itemms: [{ semester: "semester 2" }, { semester: "semester 3" }]
    };
  }
};
</script>
<style  scoped>
.theme--light.v-data-table tbody tr td {
  border: thin solid rgba(0, 0, 0, 0.12);
}
.theme--light.v-data-table thead tr:last-child th {
  border: thin solid rgba(0, 0, 0, 0.12);
}
.v-data-table td {
  height: 50px;
}
</style>
