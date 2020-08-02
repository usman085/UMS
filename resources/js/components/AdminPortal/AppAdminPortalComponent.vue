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
</div>
</template>

<script>
import SideBar from './CommonComponent/Sidebar';
import Echo from 'laravel-echo';

import CxltToastr from 'cxlt-vue2-toastr'
import Vue from 'vue';
var toastrConfigs = {
    position: 'top right',
    showDuration: 1
}
Vue.use(CxltToastr, toastrConfigs)
export default {
    name: "AdminPortal",
    components: {
        SideBar
    },
    data() {
        return {
            Echo: '',
        }
    },
    computed: {
        //User Auth function authorizing Admin & use in Header
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("adminLogin")),
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
        pusherListner: function () {

            this.Echo.private('App.Models.User.' + this.userAuth.id)
                .notification(notification => {
                    this.$store.dispatch('NotificationCount', notification.TotalNotification);

                    this.$toast.success({
                        title: notification.notification.title,
                        message: notification.notification.body,
                        timeOut: 8000
                    })
                });
        }
    }

}
</script>

<style scoped>

</style>
