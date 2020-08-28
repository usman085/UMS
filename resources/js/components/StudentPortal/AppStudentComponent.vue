<template>
<div class="wrapper">
    <v-app id="inspire">
        <!-- Side Bar Component Render -->
        <SideBar></SideBar>
        <!-- Side Bar Component Render -->
        <v-main>
            <v-container>
                <!-- Dynamic Router Render -->

                <router-view></router-view>

                <!-- Dynamic Router Render -->
            </v-container>
        </v-main>
    </v-app>

    <sendFeedbackAlert />
</div>
</template>

<script>
import SideBar from './CommonComponent/Sidebar';
import sendFeedbackAlert from './PartialsComponent/SendFeedAlert';
import Echo from 'laravel-echo';

import CxltToastr from 'cxlt-vue2-toastr'
import Vue from 'vue';
var toastrConfigs = {
    position: 'bottom right',
    showDuration: 1
}
Vue.use(CxltToastr, toastrConfigs)
export default {
    name: "AppStudent",
    data() {
        return {
            Echo: '',
        }
    },
    components: {
        SideBar,
        sendFeedbackAlert
    },
    computed: {
        //User Auth function authorizing Admin & use in Header
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("studentLogin")),
                "ums"
            );
        },
    },
    created() {
        this.Echo = new Echo({
            broadcaster: 'pusher',
            key: process.env.MIX_PUSHER_APP_KEY,
            cluster: process.env.MIX_PUSHER_APP_CLUSTER,
            encrypted: true,
            auth: {
                headers: {
                    Authorization: 'Bearer ' + this.userAuth.token,
                },
            },
        });
        this.pusherListner();

    },
    methods: {
        // getNotification: function () {
        //     // Headers are defined for authentication
        //     let headers = {
        //         "Content-Type": "application/json",
        //         Authorization: "Bearer  " + this.userAuth.token,
        //     };
        //     axios.post(process.env.MIX_APP_URL + '/all-notification', '', {
        //             headers: headers
        //         })
        //         .then(res => {
        //             this.$store.dispatch('Notifications',res.data.notification);
        //         })
        //         .catch(err => {})
        // },
        pusherListner: function () {

            this.Echo.private('App.Models.User.' + this.userAuth.id)
                .notification(notification => {
                    this.$store.dispatch('NotificationCount', notification.TotalNotification);
                    this.$toast.success({
                        title: notification.notification.title,
                        message: notification.notification.body,
                        timeOut: 8000
                    })

                    this.$store.dispatch('NotificationBox', {
                        title: notification.notification.title,
                        body: notification.notification.body,
                    });

                });
        }
    }

}
</script>

<style scoped>

</style>
