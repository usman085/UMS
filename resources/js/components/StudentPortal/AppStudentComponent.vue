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
export default {

    name: "AppStudent",

    components: {
        SideBar,
        sendFeedbackAlert
    },
    created(){
        this.listenForChanges();
    },
    methods:{
        listenForChanges() {
        Echo.channel('posts')
          .listen('PostPublished', e => {
             alert('gfd');
          });
        }
    }

}
</script>

<style scoped>

</style>
