<template>
    <div class="notification-detail-content">
       <v-card
    class="mx-auto"
    max-width="95%"
  >
           <router-link :to="{name:'ShowAllNotification'}" class="back-button-wrapper">
                <v-btn icon class="back-button">
                            <v-icon>mdi-arrow-left</v-icon>
                            </v-btn>
           </router-link>
          
  <v-card-title>Today Meeting opened</v-card-title>
  <v-card-subtitle> Monday 12,2020</v-card-subtitle>
    <v-card-text>
      <div>
          <span>
              From:
              <v-chip class="sending-dept">
                Support
              </v-chip>
          </span>
    
           </div>
      <p class="notification-detail-content-title">
        Notification Detail
      </p>
      
      <div class="text--primary">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
         standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
          make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,

           remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
         desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
      </div>
    </v-card-text>
  </v-card>
    </div><!--application-detail-content-->
</template>
<script>
export default {
    name:'notificationDetail',
    methods:{
        test(){
            return 0;
        }
    }

}
</script>

<style scoped>
.status-chip{
    font-weight: bold;
   float:right;
}
.notification-detail-content{
    padding:10px 0;
}
.back-button
{
    margin: 0px 12px;
    margin-top:12px;
   
}
.back-button-wrapper{
    text-decoration: none;
}
.notification-detail-content-title{
    font-size: 22px;
    padding: 5px 0;
}
.sending-dept{
    font-weight: bold;
}
</style>