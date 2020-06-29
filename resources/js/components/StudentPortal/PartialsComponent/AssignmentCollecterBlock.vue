<template>
<div>
  <AssignmentCollectorTitle/>

  <v-card max-width="100%" class="mx-auto mt-5">
    <v-list two-line subheader>
      <v-subheader inset>Courses</v-subheader>

      <v-list-item v-for="item in items" :key="item.title" :to="{name:'AssignmentFiles',params:{id :'1',slug:'vcdd'} }">
        <v-list-item-avatar>
          <v-icon :class="[item.iconClass]" v-text="item.icon"></v-icon>
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title v-text="item.title"></v-list-item-title>
          <v-list-item-subtitle v-text="item.subtitle"></v-list-item-subtitle>
        </v-list-item-content>

        <v-list-item-action>
          <v-btn icon>
            <v-icon color="grey lighten-1">mdi-information</v-icon>
          </v-btn>
        </v-list-item-action>
      </v-list-item>

      <v-divider inset></v-divider>
    </v-list>

  </v-card>
  </div>
</template>

<script>
import AssignmentCollectorTitle from "./AssignmentCollectorTitle";
export default {
  name: "AssignmentCollecterBlock",
  components:{AssignmentCollectorTitle},
  data: () => ({
    items: [
      {
        icon: "mdi-folder",
        iconClass: "grey lighten-1 white--text",
        title: "Object Oriented Programming",
        subtitle: "Jan 9, 2020"
      },
      {
        icon: "mdi-folder",
        iconClass: "grey lighten-1 white--text",
        title: "Professional Practices",
        subtitle: "Jan 17, 2020"
      },
      {
        icon: "mdi-folder",
        iconClass: "grey lighten-1 white--text",
        title: "English Grammer",
        subtitle: "Jan 28, 2020"
      }
    ],
    items2: [
      {
        icon: "mdi-file",
        iconClass: "blue white--text",
        title: "Vacation itinerary",
        subtitle: "Jan 20, 2020"
      },
      {
        icon: "mdi-file",
        iconClass: "amber white--text",
        title: "Kitchen remodel",
        subtitle: "Jan 10, 2020"
      }
    ]
  })
};
</script>

<style  scoped>
.v-application .grey.lighten-1 {
    background-color: #1565c0 !important;
    border-color: #1565c0 !important;
}
</style>
