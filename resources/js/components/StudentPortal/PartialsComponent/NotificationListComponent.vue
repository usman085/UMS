<template>
<div class="notification-wrapper">
    <v-card class="mx-auto box" append-icon="mdi-search" max-width="100%">
        <h3 class="box-title">Notifications</h3>
        <v-row>
            <v-col cols="8">
                <v-text-field label="Search" v-model="search" @input="searchNotification()"></v-text-field>
            </v-col>
            <v-col cols="4">
                <v-menu offset-y>
                    <template v-slot:activator="{on}">
                        <v-icon v-on="on" class="filter-icon">mdi-filter</v-icon>
                    </template>
                    <v-list>
                        <v-list-item>
                            <v-list-item-title>Newest</v-list-item-title>
                        </v-list-item>
                        <v-list-item>
                            <v-list-item-title>Oldest</v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>

            </v-col>
        </v-row>
        <!-- Notifications -->
        <div class="notifications-content">
            <v-divider></v-divider>
            <template v-if="notification.length > 0">
                <v-row v-for="item in notification" :key="item.id" class="notification-lines">
                    <v-list-item three-line :class="{ unread: item.read_at == null}">
                        <v-list-item-avatar>
                            <span class="tag-badge">
                                <v-icon>mdi-bell</v-icon>
                            </span>
                        </v-list-item-avatar>
                        <v-list-item-content>
                            <!-- #1565c02e; -->
                            <v-list-item-title>{{ item.data.message.title }}
                                <span class="notification-options">
                                    <v-menu offset-y>
                                        <template v-slot:activator="{on}">
                                            <v-icon v-on="on">mdi-dots-vertical</v-icon>
                                        </template>
                                        <v-list>
                                            <v-list-item v-if="item.read_at == null" @click="markAsRead(item.id)">
                                                <v-list-item-title>
                                                    <v-icon>mdi-read</v-icon>
                                                    Mark as Read
                                                </v-list-item-title>
                                            </v-list-item>
                                            <v-list-item @click="deleteNotification(item.id)">
                                                <v-list-item-title>
                                                    <v-icon>mdi-delete</v-icon>
                                                    Delete
                                                </v-list-item-title>
                                            </v-list-item>
                                        </v-list>
                                    </v-menu>

                                </span>
                            </v-list-item-title>
                            <v-list-item-subtitle>{{ item.data.message.body }}</v-list-item-subtitle>
                            <router-link :to="{name:'notificationDetail',params:{id:item.id}}" class="read-now">Read Now</router-link>
                            <span class="notification-time">{{ item.send_at }}</span>
                        </v-list-item-content>
                    </v-list-item>
                    <v-divider></v-divider>
                </v-row>
                <div class="text-center">
                    <v-pagination circle v-model="page" :length="last_page" @input="getNotification"></v-pagination>
                </div>
            </template>
            <template v-else>
                <div v-if="!loading" class="text-center loading">
                    No Notifications Found 😟 !
                </div>
                <div v-else class="text-center loading">
                    <v-progress-circular indeterminate color="primary" size="50"></v-progress-circular>
                    <p>Loading....</p>
                </div>
            </template>
        </div>
        <!--notifications-content-->
        <!-- Notifications -->
    </v-card>
</div>
<!--notification-wrapper--->
</template>

<script>
import notificationMix from '../../../Mixins/notificationMixin';
export default {

    name: 'NotificationList',
     mixins:[notificationMix],
    data: function () {
        return {
            loading: true,
            search: '',
            last_page: 0,
            page: 1
        };
    },
    methods: {
        searchNotification: function () {
            if (this.search.length > 3) {
                // Headers are defined for authentication
                let headers = {
                    "Content-Type": "application/json",
                    Authorization: "Bearer  " + this.userAuth.token,
                };
                axios.post(process.env.MIX_APP_URL + '/search-notification', {
                        'query': this.search
                    }, {
                        headers: headers
                    })
                    .then(res => {
                        this.$store.dispatch('Notifications', res.data.notification);
                        this.loading = false;
                    })
                    .catch(err => {})
            } else {
                this.getNotification();
            }
        },
        markAsRead: function (id) {
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token,
            };
            axios.post(process.env.MIX_APP_URL + '/mark-as-read-notification', {
                    'id': id
                }, {
                    headers: headers
                })
                .then(res => {
                    this.getNotification();
                    this.getNotificationCount();
                })
                .catch(err => {})
        },
        deleteNotification: function (id) {
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token,
            };
            axios.post(process.env.MIX_APP_URL + '/delete-notification', {
                    'id': id
                }, {
                    headers: headers
                })
                .then(res => {
                    this.getNotification();
                    this.getNotificationCount();
                })
                .catch(err => {})
        },
        getNotification: function (page = 1) {
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token,
            };
            axios.post(process.env.MIX_APP_URL + '/all-notification?page=' + page, '', {
                    headers: headers
                })
                .then(res => {
                    this.last_page = res.data.notification.last_page;
                    this.$store.dispatch('Notifications', res.data.notification.data);
                    this.loading = false;
                })
                .catch(err => {})
        }
    },
    mounted() {
        this.getNotification();
    },
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("studentLogin")),
                "ums"
            );
        },
        notification: function () {
            return this.$store.state.Notifications;
        }
    },
}
</script>

<style scoped>
.loading {
    margin: 20px 0;
}

.unread {
    background: #1565c02e;
}

.notification-options {
    float: right;
}

.tag-badge {
    padding: 8px 12px;
    color: white;
    background: #d6cfcf;
    border-radius: 50%;
}

* {
    font-family: "Allerta";
}

.filter-icon {
    margin: 27px 0;
}

.read-now {
    text-decoration: none;
}

.box {
    padding: 10px;
}

.icon-bage {
    border-radius: 50%;
    width: 100%;
}

.box-title {
    font-family: "Allerta";
}

.notification-wrapper {
    padding: 10px;
}

.bagde-tag {
    border-radius: 50%;
    background: red;
    padding: 8px 12px;
}

.notification-lines {
    border-bottom: 1px solid;
    border-color: rgba(0, 0, 0, 0.12);
}

.notification-time {
    text-align: right;
    color: rgba(0, 0, 0, 0.6);
    font-size: 13px;
}

.v-list-item--three-line {
    width: -webkit-fill-available;
}

.v-list-item__title,
.v-list-item__subtitle {

    white-space: unset;
}
</style>
