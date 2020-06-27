<template>
  <v-dialog v-model="dialog" max-width="590" persistent>
    <v-card>
      <v-card-title class="headline">Thank You For Visiting Our Student Portal</v-card-title>

      <v-card-text>Kindly Give Us Your Valuable Feedback . It Will Helps Us To Improve Your Experience Thank You!!</v-card-text>

      <v-card-actions>
        <v-spacer></v-spacer>

        <v-btn color="green darken-1" text @click="dialog = false">OK!</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>
<script>
export default {
  name: "sendFeedbackAlert",
  data: function() {
    return {
      dialog: false
    };
  },
  mounted() {
    setTimeout(() => {
      this.dialog = true;
    }, 120000);
  }
};
</script>