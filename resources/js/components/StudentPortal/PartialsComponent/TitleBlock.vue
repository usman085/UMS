<template>
  <div class="title-wrapper">
    <v-card max-width="100%" class="mx-auto">
      <v-card-title>{{ titleName }}</v-card-title>
      <v-card-subtitle>{{ subtitle }}</v-card-subtitle>
    </v-card>
  </div>
  <!--title-wrapper-->
</template>

<script>
export default {
  name: "TitleBlock",
  props: ["titleName", "subtitle"]
};
</script>

<style scoped>
.v-application .blue--text {
    color: #2e87ce !important;
    caret-color: #2196F3 !important;
}
</style>
