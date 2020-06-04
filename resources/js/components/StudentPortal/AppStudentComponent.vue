<template>
<div class="wrapper">
    <v-app id="inspire">
    <!-- Side Bar Component Render -->
       <SideBar></SideBar>
    <!-- Side Bar Component Render -->
        <v-content>
       <v-container>
            <!-- Dynamic Router Render -->

               <router-view></router-view>

            <!-- Dynamic Router Render -->
       </v-container>
    </v-content>
    </v-app>
</div>
</template>

<script>
import SideBar from './CommonComponent/Sidebar';

export default {

    name:"AppStudent",

    components:{SideBar}

}
</script>

<style scoped>

</style>
