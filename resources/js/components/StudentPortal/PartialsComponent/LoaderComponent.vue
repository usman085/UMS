<template>
  <div class="text-center">
    <v-dialog
      v-model="dialog"
      hide-overlay
      persistent
      width="300"
    >
      <v-card
        color="#ffffff"
        dark
    
      >
        <v-card-text>
          <span style="color:black;">Please Wait...</span>
          <v-progress-linear
            indeterminate
            color="primary"
            class="mb-0"
          ></v-progress-linear>
        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
  export default {
      name:'Loader',
      props:['dialog'],
  }
</script>