<template>
  <div>
    <v-navigation-drawer width="271" v-model="drawer" :clipped="$vuetify.breakpoint.lgAndUp" app>
      <v-list shaped>
        <template v-for="item in items">
          <v-row v-if="item.heading" :key="item.heading" align="center">
            <v-col cols="6">
              <v-subheader v-if="item.heading">
                {{
                item.heading
                }}
              </v-subheader>
            </v-col>
          </v-row>
          <v-list-group
            v-else-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon=" item.model ? item.icon : item['icon-alt']"
            append-icon
            class="list-acnhor"
          >
            <template v-slot:activator>
              <v-list-item-content class="list-acnhor">
                <v-list-item-title>
                  {{
                  item.text
                  }}
                </v-list-item-title>
              </v-list-item-content>
            </template>
            <div>
              <v-list-item
                class="list-acnhor body-2"
                v-for="(child, i) in item.children"
                :key="i"
                :to="child.url"
              >
                <v-list-item-action v-if="child.icon">
                  <v-icon>{{ child.icon }}</v-icon>
                </v-list-item-action>
                <v-list-item-content>
                  <v-list-item-title class="text">
                    <v-item>{{ child.text }}</v-item>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </div>
          </v-list-group>

          <v-list-item v-else :key="item.text" :to="item.url">
            <v-list-item-action class="list-acnhor">
              <v-icon class="list-acnhor">
                {{
                item.icon
                }}
              </v-icon>
            </v-list-item-action>

            <v-list-item-content class="list-acnhor">
              <v-list-item-title>
                {{
                item.text
                }}
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar :clipped-left="$vuetify.breakpoint.lgAndUp" app color="blue darken-3" dark>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title style="width: 300px" class="ml-0 pl-4">
        <span class="hidden-sm-and-down font-weight-bold display-1">UMS</span>
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
              <v-btn @click="logout()" small color="primary" class="ml-1">
                <v-icon class="mr-2">mdi-logout</v-icon>Logout
              </v-btn>
            </v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
      <v-btn icon to="/student-portal/notification">
        <v-icon>mdi-bell</v-icon>
      </v-btn>
      <v-btn icon large>
        <v-avatar size="32px" item>
          <router-link :to="{ name: 'ProfileComponent' }">
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
  methods: {
    logout: function() {
      localStorage.removeItem("adminLogin");
      this.$router.push({ name: "login" });
    }
  },
  data: () => ({
    dialog: false,
    drawer: null,
    items: [
      {
        icon: "mdi-view-dashboard",
        text: "Dash Board",
        url: "/admin-portal/dash-board"
      },
       {
        icon: "mdi-chevron-up",
        "icon-alt": "mdi-chevron-down",
        text: "Academics",
        model: false,
        children: [
          {
            text: "Manage Programs",
            icon: "mdi-book-open",
            url: "/admin-portal/manage-program"
          },
          {
            text: "Manage Courses",
            icon: "mdi-clipboard-text",
            url: "/admin-portal/manage-course"
          }
        ]
      },
      {
        icon: "mdi-view-dashboard",
        text: "Manage Exam Routine",
        url: "/admin-portal/exam-routine"
      },
      {
        icon: "mdi-chevron-up",
        "icon-alt": "mdi-chevron-down",
        text: "Manage Student",
        model: false,
        children: [
          // ***** Student Sub List
          {
            text: "Register Student",
            icon: "mdi-account-check",
            url: "/admin-portal/register-new-student"
          },
          {
            text: "Mange Time Table",
            icon: "mdi-table-edit",
            url: "/admin-portal/Mange-Time-Table"
          }

          // **** Student Sub List
        ]
      },
     
    ]
  })
};
</script>

<style  scoped>
.v-application a,
.v-application a:focus {
  text-decoration: none;
  /* color: inherit; */
}
.child-list-text {
  font-size: 15px;
  /* text-align: right; */
}
.child-list-icon {
  font-size: 22px;
}
.v-navigation-drawer__content {
  height: 100%;
  overflow-y: auto;
  overflow-x: hidden !important;
}
::-webkit-scrollbar {
  width: 1px;
}
::-webkit-scrollbar-thumb {
  background: black;
  border-radius: 20px;
}
.v-application a {
  text-decoration: none;
}
.v-list-item__title {
  color: rgba(0, 0, 0, 0.87) !important;
}

.v-application .primary--text {
  color: rgba(0, 0, 0, 0.54) !important;
  caret-color: rgba(0, 0, 0, 0.54) !important;
}
.v-menu__content {
  top: 44px !important;
}
.text {
  font-size: 14px !important;
}
.v-list .v-list-item--active {
  color: inherit;
  background-color: #1565c02e;
}
</style>

