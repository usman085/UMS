<template>
<div>
  <v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="600px">
      <v-card>
        <v-card-title>
          <span class="headline">Add a New Program</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12">
                <v-text-field label="Program Title*" hint="Becholar of Computer Science" required></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field label="Short Title" hint="BSCS"></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-select
                  v-model="select"
                  :items="items"
                  item-text="state"
                  label="Select Duration*"
                  persistent-hint
                  return-object
                  single-line
                ></v-select>
              </v-col>
              <v-col cols="12">
                <v-text-field label="No Of Semesters*" type="text" required></v-text-field>
              </v-col>
            </v-row>
          </v-container>
          <small>*indicates required field</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn small color="error" @click="$store.dispatch('AddProgramModalToggle')">Close</v-btn>
          <v-btn small color="primary"  @click="$store.dispatch('AddProgramModalToggle'),snackbar = true">Add</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>

    </div>
</template>

<script>
export default {
  name: "AddProgramModel",
  data() {
    return {
     
      items: [
        { state: "1 years" },
        { state: "2 years" },
        { state: "3 years" },
        { state: "4 years" },
        { state: "5 years" }
      ]
    };
  },
  computed: {
    dialog: function() {
      return this.$store.state.AddProgramModal;
    }
  }
};
</script>

<style scoped>
</style>
