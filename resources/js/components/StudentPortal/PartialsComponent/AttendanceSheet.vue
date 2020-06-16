<template>
  <v-expansion-panels>
    <v-expansion-panel v-for="item in items " :key="item.name">
      <v-expansion-panel-header>{{ item.week }}</v-expansion-panel-header>
      <v-expansion-panel-content>
            <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left">Subject</th>
          <th class="text-left">Lecture #</th>
          <th class="text-left">Date</th>
           <th class="text-left">Time</th>
          <th class="text-left">Attendance</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="detail in details" :key="detail.name">
          <td>{{ detail.subject }}</td>
            <td>{{ detail.lecture }}</td>
            <td>{{ detail.date }}</td>
            <td>{{ detail.time }}</td>
            <td>{{ detail.attendance }}</td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>

      </v-expansion-panel-content>
    </v-expansion-panel>
  </v-expansion-panels>
</template>

<script>
export default {
  name: "AttendanceSheet",
  data() {
    return {
      items: [{ week: "week 1," }],
      details: [
        {
        subject:"Urdu",
        lecture:"Lecture 1",
        date:"01-02-2020",
        time:"10:00 to 11:00",
        Attendance:"Present"
        },

      ]
    };
  }
};
</script>
