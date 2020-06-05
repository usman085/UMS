<template>
    <div class="assignments-content-wrapper">
        <v-card class="wrapper-back">
               <v-card>
                   <v-container>
                       <v-row>
                           <v-col cols="6">
                              <v-card-title class="assignment-title">
                                 Web Development Apis WebHooks
                              </v-card-title>

                              <v-card-subtitle>
                                  by Sir Zeeshan
                              </v-card-subtitle>
                           </v-col>
                           <v-col cols="2">
                               <p>Asign Date</p>
                               <p class="assignments-dates">Monday 20,2020</p>
                           </v-col>
                           <v-col cols="2">
                               <p>Submission Date</p>
                               <p class="assignments-dates">Monday 26,2020</p>
                           </v-col>
                           <v-col cols="2">
                               <p>
                                  <span class="dots-vertical">
                                       <v-menu offset-y>
                                           <template v-slot:activator="{ on }">
                                             <v-btn  v-on="on">
                                                 <v-icon>mdi-dots-vertical</v-icon>
                                             </v-btn>
                                           </template>
                                           <v-list>
                                               <v-list-item>
                                                   <v-list-item-title>
                                                       <v-icon>mdi-eye</v-icon> View
                                                    </v-list-item-title>
                                                </v-list-item>
                                                <v-list-item>
                                                    <v-list-item-title>
                                                        Request For Time
                                                    </v-list-item-title>
                                                </v-list-item>
                                             </v-list>
                                         </v-menu>
                                     </span>
                                    </p>
                           </v-col>
                           <v-row>
                               <v-col cols="12">
                                   <VueCountdown   class="CountDown" :time="2 * 24 * 60 * 60 * 1000">
                                        <template slot-scope="props" class="CountDown">Time Remaining：{{ props.days }} days, {{ props.hours }} hours, {{ props.minutes }} minutes, {{ props.seconds }} seconds.</template>
                                   </VueCountdown>
                               </v-col>
                           </v-row>
                       </v-row>
                   </v-container>
               </v-card>
        </v-card>
    </div><!--"assignments-content-wrapper-->
</template>

<script>
import VueCountdown from '@chenfengyuan/vue-countdown';
export default {
    name:'AssignmentBlock',
    components:{VueCountdown}
}
</script>

<style scoped>
.assignment-title{
    padding-top: 0;
}
.CountDown{
    font-size:12px ;
     display: table;
    margin: 0 auto;
    color: red;
}
.assignments-dates{
    font-size: 13px;
   
}
.wrapper-back{
    padding:20px;
    border-radius: 0 !important;
    background:#eeeeee24;
}
.dots-vertical{
    float: right;
}
</style>