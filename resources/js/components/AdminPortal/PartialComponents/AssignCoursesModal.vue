<template>
  <div>
    <v-row justify="center">
      <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
        <v-card>
          <v-toolbar dark color="primary">
          <!-- Close Model of Assign Course -->
            <v-btn icon dark @click="$store.dispatch('AssignCoursesModalToggle')">
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title>Bachelor of Software Engineering</v-toolbar-title>
            <v-spacer></v-spacer>
         
          </v-toolbar>
          <v-card-text >
            <v-container>
              <v-card-title text-center ></v-card-title>
              <v-row>
                <v-col cols="12" xs="12" md="12">
                  <v-simple-table>
                    <template v-slot:default>
                      <thead>
                        <tr>
                          <th class="text-left">Course Code</th>
                          <th class="text-left">Course Title</th>
                          <th class="text-left">Credit Hours</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="item in AssignCourses.semester1" :key="item.id">
                          <td>{{item.course_code}}</td>
                           <td>{{item.course_title}}</td>
                            <td>{{item.credit_hours}}</td>
                             
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
  props:['AssignCourseData'],
  data() {
    return {
    
  };
  },
  computed: {
    // AssignCourses Function use to Get Data of Program and Course 
    AssignCourses:function(){
      return{
       semester1:this.AssignCourseData.filter(item=> '1' ==item.pivot.semester),
        semester2:this.AssignCourseData.filter(item=> '2'==item.pivot.semester),
        semester3:this.AssignCourseData.filter(item=> '3'==item.pivot.semester),
        semester4:this.AssignCourseData.filter(item=> '4'==item.pivot.semester),
        semester5:this.AssignCourseData.filter(item=> '5'==item.pivot.semester),
        semester6:this.AssignCourseData.filter(item=> '6'==item.pivot.semester),
        semester7:this.AssignCourseData.filter(item=> '7'==item.pivot.semester),
        semester8:this.AssignCourseData.filter(item=> '8'==item.pivot.semester),
      }
    },
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