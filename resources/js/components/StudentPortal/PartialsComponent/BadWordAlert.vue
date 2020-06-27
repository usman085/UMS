<template>
  <div class="text-center">
    <v-dialog v-model="dialog" width="500">
      <v-card>
        <v-card-title class="headline grey lighten-2" color="primary">Policy Violation</v-card-title>

        <v-card-text>

          <br/>You are using inappropriate Or Abusing words in text field.We found that words "<span style="color:red;">{{ badWords }}</span>," in text field which is violating our policy. kindly remove these word to further proceed.
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="#0091ea" text @click="$store.dispatch('BadWordModalToggle')">Ok!</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  props: ["badWords"],
  name: "badWord",
  computed: {
    dialog: function() {
      return this.$store.state.BadWordModal;
    }
  }
};
</script>
