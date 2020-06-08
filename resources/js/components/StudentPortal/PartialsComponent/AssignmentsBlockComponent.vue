<template>
  <div class="assignments-content-wrapper">
    <v-simple-table class="mx-auto mt-6">
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left title font-weight-bold th">Subject</th>
            <th class="text-left title font-weight-bold">Assignment Title</th>
            <th class="text-left title font-weight-bold">Assign By</th>
            <th class="text-left title font-weight-bold">Assign Date</th>
            <th class="text-left title font-weight-bold">Submission Date</th>
            <th class="text-left title font-weight-bold">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in desserts" :key="item.name">
            <td class="subtitle-2 body-1 font-weight-medium">{{ item.subject }}</td>
            <td class="subtitle-2 body-1 font-weight-medium">{{ item.title }}</td>
            <td class="subtitle-2 body-1 font-weight-medium">{{ item.assignBy }}</td>
            <td class="subtitle-2 body-1 font-weight-medium">{{ item.assignDate }}</td>
            <td class="subtitle-2 body-1 font-weight-medium">{{ item.submissionDate }}</td>
            <td>
              <span class="dots-vertical">
                <v-menu offset-y>
                  <template v-slot:activator="{ on }">
                    <v-btn v-on="on" color="primary">
                      <v-icon>mdi-dots-vertical</v-icon>
                    </v-btn>
                  </template>
                  <v-list >
                    <v-list-item>
                      <v-list-item-title @click="AssignmentDetailModal()">
                        <v-icon>mdi-eye</v-icon>

                        <span> View Detail</span>
                      </v-list-item-title>

                    </v-list-item>

                    <v-list-item>
                    <v-list-item-title @click="SubmitAssignmentModal()">
                        <v-icon>mdi-comment-text</v-icon>

                        <span> Submit Assignment </span>
                    </v-list-item-title>
                    </v-list-item>

                    <v-list-item @click="RequestTimeApplicationModal()">
                       <v-icon class="request">  mdi-av-timer </v-icon>
                      <v-list-item-title class="request ml-1">Request For Time</v-list-item-title>
                    </v-list-item>
                  </v-list>
                </v-menu>
              </span>
            </td>
          </tr>
          <tr>
             <td colspan="6" class="time-lap">
            <VueCountdown class="CountDown" :time="3 * 24 * 60 * 60 * 1000">
              <template
                slot-scope="props"
                class="CountDown" v-if="props.days == 1"
              >Time Remaining：{{ props.days }} days, {{ props.hours }} hours, {{ props.minutes }} minutes, {{ props.seconds }} seconds.</template>
            </VueCountdown>
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
    <!-- SubmitAssignment -->
    <SubmitAssignment></SubmitAssignment>
    <!-- SubmitAssignment -->
  
    <!--assignments-content-wrapper-->

   <!-- AssignmentDetailPage -->

   <AssignmentDetailPage></AssignmentDetailPage>

   <!-- AssignmentDetailPage -->



    <!-- RequestTimeApplication -->
        <RequestTimeApplication></RequestTimeApplication>
    <!-- RequestTimeApplication -->
  </div>
  
</template>

<script>
import VueCountdown from "@chenfengyuan/vue-countdown";
import SubmitAssignment from './SubmitAssignmentComponnent';
import RequestTimeApplication from './RequestTimeApplication';
import AssignmentDetailPage from './AssignmentDetailPage';
export default {
  name: "AssignmentBlock",
  components: { VueCountdown,SubmitAssignment,RequestTimeApplication,AssignmentDetailPage },
  data() {
    return {
      desserts: [
        {
          subject: "Software Engineering ",
          title: "Derivation",
          assignBy: "Danish Javed",
          assignDate: "02-May-2020",
          submissionDate: "10-May-2020"
        }
      ]
    };
  },
  methods:{
    SubmitAssignmentModal:function(){
      this.$store.dispatch('SubmitAssignmentModalToggle');
    },
    RequestTimeApplicationModal:function(){
      this.$store.dispatch('ApplicationRequestTimeModalToggle');
    },
    AssignmentDetailModal:function(){
      this.$store.dispatch('AssignmentDetailPageModalToggle');
    }
  }
};
</script>

<style scoped>
.assignment-title {
  padding-top: 0;
}
.v-list-item:hover{
cursor: pointer;
background: #e0e0e0;
}
.CountDown {
  font-size: 12px;
  display: table;
  margin: 0 auto;
  color: red;
  border: 1px solid #e0e0e0;
  border-top: none;
}
.assignments-dates {
  font-size: 13px;
}
.wrapper-back {
  padding: 20px;
  border-radius: 0 !important;
  background: #eeeeee24;
}
.dots-vertical {
  float: right;
}
.theme--light.v-data-table thead tr th {
  color: black !important;
}
.time-lap{
  height: 0;
}
.request {
  color: green;
}
</style>
