<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="490">
      <v-card>
        <v-card-title class="headline">Select Notification Type
        </v-card-title>
         <v-divider></v-divider>
        <v-card-text>
             <v-checkbox v-model="sendToAll" label="Send To All"></v-checkbox>
             <v-checkbox v-model="sendToIndivialStudent" label="Send To Indivial Student"></v-checkbox>
             <v-checkbox v-model="sendToAllStudent" label="Send To All Student"></v-checkbox>
             <v-checkbox v-model="sendToAllTeacher" label="Send To All Teacher"></v-checkbox>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" text @click="dialog = false">Disagree</v-btn>
          <v-btn color="green darken-1" text @click="dialog = false">Agree</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
  export default {
      name:'NotificationTypeModal',
    data () {
      return {
        dialog: true,
        sendToAll:false,
        sendToIndivialStudent:false,
        sendToAllStudent:false,
        sendToAllTeacher:false
      }
    },
  }
</script>
<style scoped>
.headline{
    word-wrap: break-word;
}
.v-messages{
    height: 0 !important;
}
</style>