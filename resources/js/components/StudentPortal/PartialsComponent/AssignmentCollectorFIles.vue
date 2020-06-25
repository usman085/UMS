<template>
  <div>
    <div class="pt-5 pl-5">
      <p>
        <router-link :to="{name:'AssignmentCourses'}">Course</router-link>
        <span class="ml-2 mr-2">>></span>
        <span class="blue--text">OOP</span>
      </p>
    </div>

    <v-list-item-content>
      <v-list-item-title class="ml-5">Subject name</v-list-item-title>
    </v-list-item-content>
    <v-list-item v-for="item in items2" :key="item.title">
      <v-list-item-avatar>
        <v-icon :class="[item.iconClass]" v-text="item.icon"></v-icon>
      </v-list-item-avatar>

      <v-list-item-content>
        <v-list-item-title v-text="item.title"></v-list-item-title>
        <v-list-item-subtitle v-text="item.subtitle"></v-list-item-subtitle>
      </v-list-item-content>

      <v-list-item-action>
        <v-btn icon>
          <v-icon color="grey lighten-1">
            mdi-eye
            
          </v-icon>
        </v-btn>
        <v-btn icon>
          <v-icon color="grey lighten-1">
            mdi-arrow-down-bold-circle
            <span class="ml-2">Preview</span>
          </v-icon>
        </v-btn>
      </v-list-item-action>
    </v-list-item>
  </div>
</template>
<script>
export default {
  name: "AssignmentFiles",
  data: () => ({
    items2: [
      {
        icon: "mdi-file",
        iconClass: "blue white--text",
        title: "Vacation itinerary",
        subtitle: "Jan 20, 2014"
      },
      {
        icon: "mdi-file",
        iconClass: "amber white--text",
        title: "Kitchen remodel",
        subtitle: "Jan 10, 2014"
      }
    ],
    items: [
      {
        text: "Courses",
        disabled: false,
        href: "Assignment-collector"
      },
      {
        text: "Object Oriented Programming",
        disabled: false,
        href: "Files"
      }
    ]
  })
};
</script>
<style scoped>
.v-application a {
  text-decoration: none;
}
</style>
