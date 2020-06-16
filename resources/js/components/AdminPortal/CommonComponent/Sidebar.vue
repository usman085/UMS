<template>
  <div>
    <v-navigation-drawer width="271" v-model="drawer" :clipped="$vuetify.breakpoint.lgAndUp" app>
      <v-list shaped>
        <template v-for="item in items">
          <v-row v-if="item.heading" :key="item.heading" align="center">
            <v-col cols="6">
              <v-subheader v-if="item.heading">{{ item.heading }}</v-subheader>
            </v-col>
            <v-col cols="6" class="text-center">
              <a href="#!" class="body-2 black--text">EDIT</a>
            </v-col>
          </v-row>
          <v-list-group
            v-else-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            append-icon
            class="list-acnhor"
          >
            <template v-slot:activator>
              <v-list-item-content class="list-acnhor">
                <v-list-item-title>{{ item.text }}</v-list-item-title>
              </v-list-item-content>
            </template>
            <v-list-item class="list-acnhor" v-for="(child, i) in item.children" :key="i" link>
              <v-list-item-action v-if="child.icon">
                <v-icon>{{ child.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>
                  <router-link :to="child.url">{{ child.text }}</router-link>
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>
          <div v-else :key="item.text">
            <router-link :to="item.url">
              <v-list-item link>
                <v-list-item-action class="list-acnhor">
                  <v-icon class="list-acnhor">{{ item.icon }}</v-icon>
                </v-list-item-action>

                <v-list-item-content class="list-acnhor">
                  <v-list-item-title>{{ item.text }}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>
          </div>
        </template>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar :clipped-left="$vuetify.breakpoint.lgAndUp" app color="blue darken-3" dark>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title style="width: 300px" class="ml-0 pl-4">
        <span class="hidden-sm-and-down font-weight-bold display-1">Admin Portal</span>
      </v-toolbar-title>

      <v-spacer></v-spacer>

      <v-menu left bottom min-width="95">
        <template v-slot:activator="{ on }">
          <v-btn icon v-on="on">
            <v-icon>mdi-apps</v-icon>
          </v-btn>
        </template>

        <v-list>
          <v-list-item>
            <v-list-item-title>
              <router-link to="/">Setting</router-link>
            </v-list-item-title>
          </v-list-item>
          <v-list-item>
            <v-list-item-title>
              <router-link to="/">Help!</router-link>
            </v-list-item-title>
          </v-list-item>
          <v-list-item>
            <v-list-item-title>
              <v-btn @click="logout()">Logout</v-btn>
            </v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
      <v-btn icon>
        <v-icon>mdi-bell</v-icon>
      </v-btn>
      <v-btn icon large>
        <v-avatar size="32px" item>
          <router-link :to="{name:'ProfileComponent'}">
            <v-img src="https://cdn.vuetifyjs.com/images/logos/logo.svg" alt="Vuetify"></v-img>
          </router-link>
        </v-avatar>
      </v-btn>
    </v-app-bar>
  </div>
</template>

<script>
export default {
  name: "SideBar",
  components: {},
  props: {
    source: String
  },
  methods:{
    logout:function(){
         localStorage.removeItem('adminLogin');
         this.$router.push({name:'login'})

    }
  },
  data: () => ({
    dialog: false,
    drawer: null,
    items: [

    { icon: "mdi-view-dashboard", text: "Dash Board" ,url:'/student-portal/dash-board' },
    {  icon: "mdi-chevron-up","icon-alt": "mdi-chevron-down",text: "Academic Assignments",
        model: false,
        children: [
    { text: "Asign Assignments",icon:" mdi-arrow-right",url:'/student-portal/Assignments'},
        ]},
     {icon:'mdi-calendar-text',text:'Academic Syllabus',url:'/student-portal/Academic-syllabus'},   
    { icon: "mdi-calendar-text", text: "Class Routine" ,url:'/student-portal/Class-Routine' },
    { icon: "mdi-calendar-text", text: "Exam Routine" ,url:'/student-portal/Exam-Routine' },
    { icon: " mdi-email", text: "Application" ,url:'/student-portal/application' },
     { icon: "mdi-application", text: "Attendance Sheet" ,url:'/student-portal/Attendance-Sheet' },
         
         {icon:'mdi-bell',text:'Notifications', url:'/student-portal/notification'},
       {icon:'mdi-account',text:'My Profile', url:'/student-portal/Profile-Component'},
         {icon:'mdi-comment-text-outline',text:'Send Feedback',url:'/student-portal/feedback'},
         {icon:'mdi-account',text:'Contact Support',url:'/student-portal/customer-support'}




    ]
  })
};
</script>

<style  scoped>
.v-application a {
  text-decoration: none;
}
</style>
