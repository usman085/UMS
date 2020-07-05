<template>
  <div>
    <v-row justify="center">
      <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
        <v-card>
          <v-toolbar dark color="primary">
            <v-btn icon dark @click="$store.dispatch('AssignCoursesModalToggle')">
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title>Bachelor of Software Engineering</v-toolbar-title>
            <v-spacer></v-spacer>
         
          </v-toolbar>
          <v-card-text v-for="item in semester" :key="item.id">
            <v-container>
              <v-card-title text-center>{{ item.semester }}</v-card-title>
              <v-row>
                <v-col cols="12" xs="12" md="12">
                  <v-simple-table>
                    <template v-slot:default>
                      <thead>
                        <tr>
                          <th class="text-left">id</th>
                          <th class="text-left">Course Code</th>
                          <th class="text-left">Course Title</th>
                          <th class="text-left">Credit Hours</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="item in Courses" :key="item.id">
                          <td>{{ item.id }}</td>
                          <td>{{ item.courseCode }}</td>
                          <td>{{ item.courseTitle }}</td>
                          <td>{{ item.creditHours }}</td>
                        </tr>
                      </tbody>
                    </template>
                  </v-simple-table>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
          <v-divider></v-divider>
        </v-card>
      </v-dialog>
    </v-row>
  </div>
</template>

<script>
export default {
  name: "AssignCoursesModal",
  data() {
    return {
      semester: [{ semester: "Semester 1"},{ semester: "Semester 2"},{semester:"Semester 3" }],
      Courses: [
        {
          id: 1,
          courseCode: "CSI-301",
          courseTitle: " Programming Fundamentals",
          creditHours: "4 (3-1) "
        }
      ]
    };
  },
  computed: {
    dialog: function() {
      return this.$store.state.AssignCoursesModal;
    }
  }
};
</script>
<style scoped>
tbody tr:nth-of-type(odd) {
   background-color: rgba(0, 0, 0, .05);
 }
.theme--light.v-data-table tbody tr td {
    border: thin solid rgba(0, 0, 0, 0.12);
}

.theme--light.v-data-table thead tr:last-child th {
    border: thin solid rgba(0, 0, 0, 0.12);
}

.v-data-table td {
    height: 50px;
}

.hover {
    cursor: pointer;
}

@media screen and (max-width:770px) {
    .v-application .headline {
        font-size: 20px !important;
    }
}
</style>