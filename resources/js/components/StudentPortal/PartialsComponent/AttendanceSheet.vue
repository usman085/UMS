<template>
  <div>
    <v-card class="attendance-card">
      <v-card-title>Monthly Attendance</v-card-title>
      <v-card-subtitle>Use Filter to Get Previous Attendance Records</v-card-subtitle>
      <v-divider></v-divider>

      <div class="pa-4 ">
        <div class="text-center">
          <v-chip class="ma-2" @click="dialog =true">
            <span>{{ monthName +' '+ currentYear }}</span>
          </v-chip>
        </div>
        <v-simple-table>
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">Subject Names</th>
                <th v-for="day in daysInMonth" :key="day">{{ day }}</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item,index) in item" :key="index">
                <td>{{item.subject}}</td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>

        <!-- Modal Box -->

        <v-dialog v-model="dialog" max-width="400">
          <v-card>
            <v-card-title class="headline">Select Month & Year?</v-card-title>
            <v-card-text>
              <v-select :items="allMonths" label="Select Month" v-model="selectedMonth"></v-select>
              <v-select
                :items="years"

                label="Select Years"
                v-model="selectedYear"
              ></v-select>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="green darken-1" text @click="selectedDropFilter()">Filter</v-btn>
              <v-btn color="green darken-1" text @click="dialog = false">Cancel</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </div>
    </v-card>
  </div>
</template>

<script>
import * as moment from "moment";
export default {
  name: "AttendanceSheet",
  computed: {
    allMonths: function() {
      return moment.months();
    },
    monthName: function() {
      return moment.months(this.currentMonth);
    },
    daysInMonth: function() {
      return moment(this.currentMonth + 1, "MM").daysInMonth();
    },
   
  },
  data() {
    return {
      selectedMonth: "",
      selectedYear:new Date().getFullYear(),
      dialog: false,
      currentMonth: moment().month(),
      currentYear: new Date().getFullYear(),
      years: ["2020", "2019", "2018"],
      item: [
        { subject: "Computer Network" },
        { subject: "Object Oriented" },
        { subject: "Software Engineering" },
        { subject: "English" },
        { subject: "Web Engineering" },
        { subject: "Computer Science" }
      ]
    };
  },
  methods: {
    selectedDropFilter: function() {
      this.currentMonth =
        moment()
          .month(this.selectedMonth)
          .format("M") - 1;
      this.currentYear = this.selectedYear;
      this.dialog = false;
    }
  }
};
</script>
<style  scoped>
.form-field-sets {
  padding: 10px;
  border-radius: 6px;
  border-color: rgba(0, 0, 0, 0.12);
  margin: 10px;
}
.form-field-set-name {
  font-weight: bold;
  color: rgba(0, 0, 0, 0.45);
  padding: 0 5px;
}
.attendance-card {
  padding-bottom: 6px;
}
.theme--light.v-data-table tbody tr td {
  border: thin solid rgba(0, 0, 0, 0.12);
}
.theme--light.v-data-table thead tr:last-child th {
  border: thin solid rgba(0, 0, 0, 0.12);
}
.v-data-table td,
.v-data-table th {
  padding: 0 5px;
}
</style>
