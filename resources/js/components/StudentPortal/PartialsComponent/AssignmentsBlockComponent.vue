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
                      <v-list-item-title>
                        <v-icon>mdi-eye</v-icon>

                        <span>View Detail</span>
                      </v-list-item-title>

                    </v-list-item>

                    <v-list-item>
                    <v-list-item-title>
                        <v-icon>mdi-comment-text</v-icon>

                        <span>Assignment Collecter</span>
                    </v-list-item-title>
                    </v-list-item>

                    <v-list-item>
                       <v-icon>  mdi-av-timer </v-icon>
                      <v-list-item-title class="request ml-1">Request For Time</v-list-item-title>
                    </v-list-item>
                  </v-list>
                </v-menu>
              </span>
            </td>
          </tr>
          <tr>

            <VueCountdown class="CountDown" :time="2 * 24 * 60 * 60 * 1000">
              <template
                slot-scope="props"
                class="CountDown"
              >Time Remaining：{{ props.days }} days, {{ props.hours }} hours, {{ props.minutes }} minutes, {{ props.seconds }} seconds.</template>
            </VueCountdown>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </div>
  <!--"assignments-content-wrapper-->
</template>

<script>
import VueCountdown from "@chenfengyuan/vue-countdown";
export default {
  name: "AssignmentBlock",
  components: { VueCountdown },
  data() {
    return {
      desserts: [
        {
          subject: "Math",
          title: "Derivation",
          assignBy: "Danish Javed",
          assignDate: "02-May-2020",
          submissionDate: "10-May-2020"
        }
      ]
    };
  }
};
</script>

<style scoped>
.assignment-title {
  padding-top: 0;
}
.CountDown {
  font-size: 12px;
  display: table;
  margin: 0 auto;
  color: red;
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
.request {
  color: green;
}
</style>
