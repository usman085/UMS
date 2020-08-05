<template>
<div class="notification-detail-content">
    <v-card class="mx-auto" max-width="95%">
        <router-link :to="{name:'ShowAllNotification'}" class="back-button-wrapper">
            <v-btn icon class="back-button">
                <v-icon>mdi-arrow-left</v-icon>
            </v-btn>
        </router-link>
        <template v-if="notification != null">
        <v-card-title>  {{notification.notification.title}}</v-card-title>
        <v-card-subtitle>{{ notification.send_at }}</v-card-subtitle>
        <v-card-text>
            <p class="notification-detail-content-title">
                Notification Detail
            </p>

            <div class="text--primary">
                {{notification.notification.body}}
            </div>
        </v-card-text>
        </template>
    </v-card>
</div>
<!--application-detail-content-->
</template>

<script>
export default {
    name: 'notificationDetail',
    data:function(){
        return{
            notification:null
        }
    },
    created() {
        this.getNotificationDetail(this.$route.params.id);
    },
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("studentLogin")),
                "ums"
            );
        }
    },
    methods: {
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
        },
        getNotificationDetail: function (id) {
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token,
            };

            axios.post(process.env.MIX_APP_URL + '/get-notification-detail', {'id': id}, {
                    headers: headers
                })
                .then(res => {
                    this.notification=res.data.notification;
                    this.getNotificationCount();
                })
                .catch(err => {})
        }
    }

}
</script>

<style scoped>
.status-chip {
    font-weight: bold;
    float: right;
}

.notification-detail-content {
    padding: 10px 0;
}

.back-button {
    margin: 0px 12px;
    margin-top: 12px;

}

.back-button-wrapper {
    text-decoration: none;
}

.notification-detail-content-title {
    font-size: 22px;
    padding: 5px 0;
}

.sending-dept {
    font-weight: bold;
}
</style>
