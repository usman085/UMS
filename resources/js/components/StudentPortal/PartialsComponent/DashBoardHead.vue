<template>

  <v-card class="mx-auto mt-5" min-width="344" outlined>
    <v-list-item three-line>
      <v-list-item-avatar tile size="80" color="blue" class="mt-n5">
        <v-icon class="white--text" size="50px">{{ icon }}</v-icon>
      </v-list-item-avatar>
      <v-list-item-content>
        <v-list-item-title class="headline mb-1">{{ blockHeading }}</v-list-item-title>
      </v-list-item-content>
    </v-list-item>
    <v-divider></v-divider>

    <v-card-actions>
      <router-link :to="url">
        {{ link }}
        <span class="ml-2 float-right">
          <v-icon>mdi-arrow-right-bold</v-icon>
        </span>
      </router-link>
    </v-card-actions>
  </v-card>


</template>
<script>
export default {
  name: "DashBoardHead",
  props: ["blockHeading", "icon", "link" ,"url"]
};
</script>

<style  scoped>
.v-application a {
  text-decoration: none;
}
</style>
