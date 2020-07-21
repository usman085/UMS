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

export default {

    name: "AdminPortal",

    components: {
        SideBar
    }

}
</script>

<style scoped>

</style>
