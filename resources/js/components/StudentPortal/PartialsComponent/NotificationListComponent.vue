<template>

    <div class="notification-wrapper">
       <v-card class="mx-auto box" append-icon="mdi-search" max-width="100%">
          <h3 class="box-title">Notifications</h3>
          <v-row>
              <v-col cols="8">
                <v-text-field label="Search" ></v-text-field>
              </v-col>
              <v-col cols="4">
        <v-menu offset-y>
      <template v-slot:activator="{on}">
          <v-icon  v-on="on" class="filter-icon">mdi-filter</v-icon>
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
              <v-row v-for="item in 5" :key="item" class="notification-lines">


                        <v-list-item three-line>
                            <v-list-item-avatar>
                                <span class="tag-badge">T</span>
                            </v-list-item-avatar>

                            <v-list-item-content>
                                <v-list-item-title >Your Application Is Approved</v-list-item-title>
                                <v-list-item-subtitle>Hi, Dear Friend Your Application is Approved Now By HOD, Kindly Contact ti office</v-list-item-subtitle>
                                <router-link :to="{name:'notificationDetail',params:{id:'12'}}" class="read-now">Read Now</router-link>
                                <span class="notification-time">1 day ago</span>
                            </v-list-item-content>
                            </v-list-item>
                            <v-divider></v-divider>

               </v-row>
          </div><!--notifications-content-->
          <!-- Notifications -->
       </v-card>
    </div><!--notification-wrapper--->
</template>

<script>
export default {
    name:'NotificationList'
}
</script>

<style scoped>
.tag-badge{
    padding: 8px 12px;
    color: white;
    background: #d6cfcf;
    border-radius: 50%;
}
*{
    font-family:"Allerta";
}
.filter-icon{
    margin: 27px 0;
}
.read-now{
    text-decoration: none;
}
.box{
padding: 10px;
}
.icon-bage{
    border-radius: 50%;
    width: 100%;
}
.box-title{
     font-family:"Allerta";
}
.notification-wrapper{
    padding: 10px;
}
.bagde-tag{
    border-radius:50%;
     background:red;
     padding:8px 12px;
}
.notification-lines{
    border-bottom: 1px solid;
        border-color: rgba(0, 0, 0, 0.12);
}
.notification-time{
    text-align: right;
    color: rgba(0, 0, 0, 0.6);
    font-size: 13px;
}
.v-list-item--three-line {
    width: -webkit-fill-available;
}
.v-list-item__title, .v-list-item__subtitle {
   
    white-space: unset;
}
</style>
