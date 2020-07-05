<template>
  <div>
    <v-row justify="center">
      <v-dialog v-model="dialog" persistent max-width="600px">
        <v-card>
          <v-card-title>
            <span class="headline">Add a New Course</span>
          </v-card-title>
          <v-card-text>
            <v-container>
              <v-row>
                <v-col cols="12">
                  <v-text-field label="Course Title*" hint="WebEngineerind" required></v-text-field>
                </v-col>
                <v-col cols="12">
                  <v-text-field label="Course Code" hint="SWE-403"></v-text-field>
                </v-col>

                <v-col cols="12">
                  <v-text-field label="Credit Hours" hint="4(3-1)"></v-text-field>
                </v-col>
              </v-row>
            </v-container>
            <small>*indicates required field</small>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn small color="error" @click="$store.dispatch('AddCourseModalToggle')">Close</v-btn>
            <v-btn
              small
              color="primary"
              @click="$store.dispatch('AddCourseModalToggle'),snackbar = true"
            >Add</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-row>
    <v-snackbar top right v-model="snackbar" color="success">
      Course is Added successfully!
      <template v-slot:action="{ attrs }">
        <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">Close</v-btn>
      </template>
    </v-snackbar>
  </div>
</template>

<script>
export default {
  name: "AddCourseModel",
  data() {
    return {
      snackbar: false
    };
  },
  computed: {
    dialog: function() {
      return this.$store.state.AddCourseModal;
    }
  }
};
</script>

<style scoped>
</style>
