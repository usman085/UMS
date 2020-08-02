<template>
<div>
    <v-navigation-drawer width="271" v-model="drawer" :clipped="$vuetify.breakpoint.lgAndUp" app>
        <v-list shaped>
            <v-list-item :to="{name:'AdminDashboard'}">
                <v-list-item-icon>
                    <v-icon>mdi-view-dashboard</v-icon>
                </v-list-item-icon>

                <v-list-item-title>Dashboard</v-list-item-title>
            </v-list-item>

            <v-list-group prepend-icon="mdi-tooltip-edit">
                <template v-slot:activator>
                    <v-list-item-title>Academics</v-list-item-title>
                </template>

                <v-list-item :to="{name:'ManageProgram'}">
                    <v-list-item-icon>
                        <v-icon>mdi-book-open</v-icon>
                    </v-list-item-icon>

                    <v-list-item-title>Manage Programs</v-list-item-title>
                </v-list-item>

                <v-list-item :to="{name:'ManageCourse'}">
                    <v-list-item-icon>
                        <v-icon>mdi-clipboard-text</v-icon>
                    </v-list-item-icon>

                    <v-list-item-title>Manage Courses</v-list-item-title>
                </v-list-item>

            </v-list-group>

            <v-list-item :to="{name:'ExamRoutineBlock'}">
                <v-list-item-icon>
                    <v-icon>mdi-calendar-text</v-icon>
                </v-list-item-icon>

                <v-list-item-title>Exam Routine</v-list-item-title>
            </v-list-item>

            <v-list-item :to="{name:'AdminNotification'}">
                <v-list-item-icon>
                    <v-badge :content="NotificationCount" color="red" overlap>
                        <v-icon>mdi-bell</v-icon>
                    </v-badge>
                </v-list-item-icon>
                <v-list-item-title>Notifications</v-list-item-title>
            </v-list-item>

            <v-list-item :to="{name:'AdminApplicationInbox'}">
                <v-list-item-icon>
                    <v-icon>mdi-email</v-icon>
                </v-list-item-icon>

                <v-list-item-title>Application</v-list-item-title>
            </v-list-item>

            <v-list-group prepend-icon="mdi-tooltip-edit">
                <template v-slot:activator>
                    <v-list-item-title>Manage Student</v-list-item-title>
                </template>

                <v-list-item :to="{name:'RegisterStudent'}">
                    <v-list-item-icon>
                        <v-icon>mdi-account-check</v-icon>
                    </v-list-item-icon>

                    <v-list-item-title>Register Student</v-list-item-title>
                </v-list-item>

                <v-list-item :to="{name:'AllTimeTable'}">
                    <v-list-item-icon>
                        <v-icon>mdi-table-edit</v-icon>
                    </v-list-item-icon>

                    <v-list-item-title>Manage Time Table</v-list-item-title>
                </v-list-item>

            </v-list-group>

            <v-list-item :to="{name:'Adminfeedback'}">
                <v-list-item-icon>
                    <v-icon>mdi-comment-text-outline</v-icon>
                </v-list-item-icon>
                <v-list-item-title>Send Feedback</v-list-item-title>
            </v-list-item>

            <v-list-item :to="{name:'AdmincustomerSupport'}">
                <v-list-item-icon>
                    <v-icon>mdi-account</v-icon>
                </v-list-item-icon>
                <v-list-item-title>Contact Us</v-list-item-title>
            </v-list-item>

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
                        <router-link :to="{ name: 'ProfileComponent' }">
                            <v-icon color="blue">mdi-account</v-icon>
                            <span class="ml-1 mt-1">My Profile</span>
                        </router-link>
                    </v-list-item-title>
                </v-list-item>

                <v-list-item>
                    <v-list-item-title>
                        <v-btn @click="logout()" small color="primary" class="ml-1">
                            <v-icon class="mr-2">mdi-logout</v-icon>Logout
                        </v-btn>
                    </v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
       <v-menu v-model="menu" :close-on-content-click="false" :nudge-width="200">
            <template v-slot:activator="{ on, attrs }">
                    <v-badge color="red" dot overlap>
                        <v-icon v-bind="attrs" v-on="on">mdi-bell</v-icon>
                    </v-badge>
            </template>

            <v-card>
                <v-list>
                    <v-list-item>
                        <v-list-item-title>Application Approved</v-list-item-title>
                    </v-list-item>
                </v-list>
 
                <v-divider></v-divider>

            </v-card>
        </v-menu>
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
    data: () => ({
        dialog: false,
        drawer: null,
         menu: false,
    
    }),
      computed: {
        NotificationCount: function () {
            return this.$store.state.NotificationCount;
        },
        //User Auth function authorizing Admin & use in Header
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("adminLogin")),
                "ums"
            );
        },
    },
    methods:{
        logout: function () {

            localStorage.removeItem("adminLogin");
             localStorage.removeItem('token');
            this.$router.push({
                name: "login"
            });
        },
         getNotificationCount: function () {
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };

            axios.post(process.env.MIX_APP_URL + '/get-notification-count', "", {
                    headers: headers
                })
                .then(res => {
                    console.log(res);
                    this.$store.dispatch('NotificationCount', res.data.notificationCount)
                })
                .catch(err => {})
        }
    },
    created() {
        this.getNotificationCount();
    },
};
</script>

<style scoped>
.v-application a,
.v-application a:focus {
    text-decoration: none;
    /* color: inherit; */
}

.childP {
    margin-bottom: 0px;
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
