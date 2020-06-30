<template>
  <div class="time-table-wrapper">
    <v-card max-width="96%">
      <v-card-title>
        Manage Courses
        <v-btn class="create-btn" @click="$store.dispatch('AddCourseModalToggle')">
          <v-icon>mdi-plus-circle</v-icon>Add New Course
        </v-btn>
      </v-card-title>
      <v-card-subtitle>All Courses are manage here.</v-card-subtitle>
      <v-card-text>
        <v-simple-table>
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">Course Title</th>
                <th class="text-left">Course Code</th>
                <th class="text-left">CreditHours</th>
                <th class="text-left">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Web Engineering</td>
                <td>SEW-402</td>
                <td>4(3-1)</td>

                <td>
                  <v-menu offset-y>
                    <template v-slot:activator="{ on, attrs }">
                      <v-icon color="primary" v-bind="attrs" v-on="on">mdi-dots-vertical</v-icon>
                    </template>
                    <v-list>
                      <v-list-item>
                        <v-list-item-title>Modify</v-list-item-title>
                      </v-list-item>
                      <v-list-item>
                        <v-list-item-title>Delete</v-list-item-title>
                      </v-list-item>
                      <v-list-item>
                        <v-list-item-title>Assign Outline</v-list-item-title>
                      </v-list-item>
                    </v-list>
                  </v-menu>
                </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
      </v-card-text>
    </v-card>
    <AddCoursesModal></AddCoursesModal>
  </div>
</template>



<script>
import AddCoursesModal from './AddCourseModal';
export default {
  name: "ManageCoursesBlock",
  components:{
      AddCoursesModal
  }
};
</script>

<style scoped>
.create-btn {
  position: absolute;
  float: right;
  right: 10px;
}
.status-chip {
  color: white;
}
</style>