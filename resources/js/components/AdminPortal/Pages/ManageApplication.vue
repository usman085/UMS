<template>
  <div class="Application-form">
    <v-divider></v-divider>
    <!-- All Application Routes are Render Here -->
    <router-view></router-view>
    <!-- All Application Routes are Render Here -->
  </div>
</template>

<script>
export default {
  name: "ManageApplication",
  components: {},
  data: function() {
    return {};
  }
};
</script>

<style scoped>
.v-application a,
.v-application a:hover,
.v-chip {
  text-decoration: none;
  cursor: pointer;
}

@media screen and (max-width: 341px) {
  .v-application .ma-2 {
    font-size: 12px;
    margin-right: 0 !important;
  }
}
</style>

<style scoped>
</style>
