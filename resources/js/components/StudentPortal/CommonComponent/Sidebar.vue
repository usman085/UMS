<template>
<div>
    <v-navigation-drawer width="271" v-model="drawer" :clipped="$vuetify.breakpoint.lgAndUp" app>
        <v-list shaped="">
            <v-list-item :to="{name:'studentDashboard'}">
                <v-list-item-icon>
                    <v-icon>mdi-view-dashboard</v-icon>
                </v-list-item-icon>

                <v-list-item-title>Dashboard</v-list-item-title>
            </v-list-item>

            <v-list-group prepend-icon="mdi-tooltip-edit">
                <template v-slot:activator>
                    <v-list-item-title>Assignments</v-list-item-title>
                </template>

                <v-list-item :to="{name:'Assignments'}">
                    <v-list-item-icon>
                        <v-icon>mdi-tooltip-edit</v-icon>
                    </v-list-item-icon>

                    <v-list-item-title>Asign Assignments</v-list-item-title>
                </v-list-item>

                <v-list-item :to="{name:'AssignmentCourses'}">
                    <v-list-item-icon>
                        <v-icon>mdi-clipboard-text</v-icon>
                    </v-list-item-icon>

                    <v-list-item-title>Assignment Collector</v-list-item-title>
                </v-list-item>

            </v-list-group>

            <v-list-item :to="{name:'ShowAllNotification'}">
                <v-list-item-icon>
                    <v-badge :content="NotificationCount" color="red" overlap>
                        <v-icon>mdi-bell</v-icon>
                    </v-badge>

                </v-list-item-icon>

                <v-list-item-title>Notifications</v-list-item-title>
            </v-list-item>

            <v-list-item :to="{name:'ApplicationInbox'}">
                <v-list-item-icon>
                    <v-icon>mdi-email</v-icon>
                </v-list-item-icon>
                <v-list-item-title>Application</v-list-item-title>
            </v-list-item>

            <v-list-item :to="{name:'classRoutine'}">
                <v-list-item-icon>
                    <v-icon>mdi-calendar-text</v-icon>
                </v-list-item-icon>
                <v-list-item-title>Class Routine</v-list-item-title>
            </v-list-item>

            <v-list-item :to="{name:'AcademicSyllabus'}">
                <v-list-item-icon>
                    <v-icon>mdi-book-open-page-variant</v-icon>
                </v-list-item-icon>
                <v-list-item-title>Academic Syllabus</v-list-item-title>
            </v-list-item>

            <v-list-group prepend-icon="mdi-tooltip-edit">
                <template v-slot:activator>
                    <v-list-item-title>Result Cards</v-list-item-title>
                </template>

                <v-list-item :to="{name:'ResultCardFinal'}">
                    <v-list-item-icon>
                        <v-icon>mdi-tooltip-edit</v-icon>
                    </v-list-item-icon>

                    <v-list-item-title>Final Exam</v-list-item-title>
                </v-list-item>

                <v-list-item :to="{name:'SectionalCard'}">
                    <v-list-item-icon>
                        <v-icon>mdi-clipboard-text</v-icon>
                    </v-list-item-icon>

                    <v-list-item-title>Mid Term Exam</v-list-item-title>
                </v-list-item>

            </v-list-group>

            <v-list-item :to="{name:'AttendanceSheet'}">
                <v-list-item-icon>
                    <v-icon>mdi-account-check</v-icon>
                </v-list-item-icon>
                <v-list-item-title>Attendance Sheet</v-list-item-title>
            </v-list-item>

            <v-list-item :to="{name:'ExamRoutine'}">
                <v-list-item-icon>
                    <v-icon>mdi-calendar-text</v-icon>
                </v-list-item-icon>
                <v-list-item-title>Exam Routine</v-list-item-title>
            </v-list-item>

            <v-list-item :to="{name:'studentFeedBack'}">
                <v-list-item-icon>
                    <v-icon>mdi-comment-text-outline</v-icon>
                </v-list-item-icon>
                <v-list-item-title>Send Feedback</v-list-item-title>
            </v-list-item>

            <v-list-item :to="{name:'StudentCustomerSupport'}">
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

        <v-menu v-model="menu" :close-on-content-click="false" :nudge-width="200" max-width="40%">
            <template v-slot:activator="{ on, attrs }">
                <v-badge color="red" dot overlap>
                    <v-icon v-bind="attrs" v-on="on">mdi-bell</v-icon>
                </v-badge>
            </template>

            <v-card>
                <v-list subheader>
                    <v-subheader>Lastest Update</v-subheader>

                    <v-list-item two-line v-for="(item,index) in $store.state.NotificationBox" :key="index">
                     
                        <v-list-item-avatar>
                            <div class="notification-icon"><v-icon>mdi-bell</v-icon></div>
                        </v-list-item-avatar>
                        <v-list-item-content>
                            <v-list-item-title>{{ item.title }}</v-list-item-title>
                            <v-list-item-subtitle>{{ item.body }}</v-list-item-subtitle>

                        </v-list-item-content>
                    </v-list-item>
                    <v-divider></v-divider>

                </v-list>

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
    methods: {
        logout: function () {
            localStorage.removeItem("studentLogin");
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
                   
                    this.$store.dispatch('NotificationCount', res.data.notificationCount)
                })
                .catch(err => {})
        }

    },
    created() {
        this.getNotificationCount();
    },
    computed: {
        NotificationCount: function () {
            return this.$store.state.NotificationCount;
        },
        //User Auth function authorizing Admin & use in Header
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("studentLogin")),
                "ums"
            );
        },
    },
    data: () => ({
        dialog: false,
        drawer: null,
        menu: false,

    })
};
</script>

<style scoped>
.notification-icon {
    background:#1565c02e;
    width: 100%;
    display: block;
    height: 100%;
    line-height: 2.2;
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
