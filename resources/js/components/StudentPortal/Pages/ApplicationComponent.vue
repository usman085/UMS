<template>
    <div class="Application-form">
        <v-divider></v-divider>
         <router-link to="/application/compose">
         <v-chip class="ma-2" color="primary" outlined>
              <v-icon left>mdi-comment-plus-outline</v-icon>
                Compose
          </v-chip>
         </router-link>

        <router-link to="/application/inbox">
         <v-chip class="ma-2" color="primary" outlined>
              <v-icon left>mdi-inbox</v-icon>
                Inbox
          </v-chip>
        </router-link>

         <router-link to="/application/sentBox">
         <v-chip class="ma-2" color="primary" outlined>
              <v-icon left>mdi-file-send</v-icon>
                Sent
          </v-chip>
        </router-link>
   

       


         

        <v-divider></v-divider>
       <router-view></router-view>
    </div>
</template>
<script>

export default {
    name:"Application",
    components:{}
}
</script>

<style scoped>
.v-application a,.v-application a:hover,.v-chip {
    text-decoration: none;
    cursor: pointer;

} 
</style>


<style scoped>


</style>