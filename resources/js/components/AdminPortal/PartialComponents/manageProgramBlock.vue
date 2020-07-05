<template>
  <div class="time-table-wrapper">
    <v-card max-width="96%">
      <v-card-title>
        Manage Programs
        <v-btn class="create-btn" @click="$store.dispatch('AddProgramModalToggle')">
          <v-icon>mdi-plus-circle</v-icon>Add New Program
        </v-btn>
      </v-card-title>
      <v-card-subtitle>All Programs are manage here.</v-card-subtitle>
      <v-card-text>
        <v-simple-table>
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">Program Title</th>
                <th class="text-left">Short Name</th>
                <th class="text-left">Duration</th>
                <th class="text-left">No of Semesters</th>
                <th class="text-left">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Bachelor of Software Engineering</td>
                <td>BSSE</td>
                <td>4 year</td>
                <td>8</td>

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
                        <v-list-item-title>Assign Courses</v-list-item-title>
                      </v-list-item>
                      <v-list-item>
                        <v-btn
                          small
                          color="primary"
                          class="create-btn pa-1"
                          @click="$store.dispatch('AssignCoursesModalToggle')"
                        >Assigned Course</v-btn>
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
    <AssignCoursesModal></AssignCoursesModal>
    <AddProgramModal></AddProgramModal>
  </div>
</template>

<script>
import AssignCoursesModal from "./AssignCoursesModal";
import AddProgramModal from "./AddProgramModal";
export default {
  name: "manageProgramblock",
  components: {
    AddProgramModal,
    AssignCoursesModal
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
