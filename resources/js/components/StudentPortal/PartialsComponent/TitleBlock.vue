<template>
  <div class="title-wrapper">
    <v-card max-width="100%" class="mx-auto">
      <v-card-title class="justify-center display-1">{{titleName}}</v-card-title>
    </v-card>
  </div>
  <!--title-wrapper-->
</template>

<script>
export default {
  name: "TitleBlock",
  props: ["titleName", "subTitle"]
};
</script>

<style scoped>
</style>
