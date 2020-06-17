<template>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left">Subject</th>
          <th class="text-center" v-for="day in days" :key="day.name">{{ day.day }}</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center" v-for="attendance in attendances" :key="attendance.name">
          <td>{{ attendance.subject }}</td>
          <td>{{ attendance.present1 }}</td>
          <td>{{ attendance.present2 }}</td>
          <td>{{ attendance.present3 }}</td>
          <td>{{ attendance.present4 }}</td>
          <td>{{ attendance.present5 }}</td>
          <td>{{ attendance.present6 }}</td>
          <td>{{ attendance.present7 }}</td>
          <td>{{ attendance.present8 }}</td>
          <td>{{ attendance.present9 }}</td>
          <td>{{ attendance.present10 }}</td>
          <td>{{ attendance.present11 }}</td>
          <td>{{ attendance.present12 }}</td>
          <td>{{ attendance.present13 }}</td>
          <td>{{ attendance.present14 }}</td>
          <td>{{ attendance.present15 }}</td>
          <td>{{ attendance.present16 }}</td>
          <td>{{ attendance.present17 }}</td>
          <td>{{ attendance.present18 }}</td>
          <td>{{ attendance.present19 }}</td>
          <td>{{ attendance.present20 }}</td>
          <td>{{ attendance.present21 }}</td>
          <td>{{ attendance.present22 }}</td>
          <td>{{ attendance.present23 }}</td>
          <td>{{ attendance.present24 }}</td>
          <td>{{ attendance.present25 }}</td>
          <td>{{ attendance.present26 }}</td>
          <td>{{ attendance.present27 }}</td>
          <td>{{ attendance.present28 }}</td>
          <td>{{ attendance.present29 }}</td>
          <td>{{ attendance.present30 }}</td>
          <td>{{ attendance.present31 }}</td>

        </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>

<script>
export default {
  name: "AttendanceSheet",
  data() {
    return {
      attendances: [
        { subject: "urdu", present1:"p",present2:"p", },
        { subject: "english" },
        { subject: "Ismal" },
        { subject: "english" }
      ],
      days: [
        { day: "1" },
        { day: "2" },
        { day: "3" },
        { day: "4" },
        { day: "5" },
        { day: "6" },
        { day: "7" },
        { day: "8" },
        { day: "9" },
        { day: "10" },
        { day: "11" },
        { day: "12" },
        { day: "13" },
        { day: "14" },
        { day: "15" },
        { day: "16" },
        { day: "17" },
        { day: "18" },
        { day: "19" },
        { day: "20" },
        { day: "21" },
        { day: "22" },
        { day: "23" },
        { day: "24" },
        { day: "25" },
        { day: "26" },
        { day: "27" },
        { day: "28" },
        { day: "29" },
        { day: "30" },
        { day: "31" }
      ]
    };
  }
};
</script>
<style  scoped>
.theme--light.v-data-table tbody tr td {
  border: thin solid rgba(0, 0, 0, 0.12);
}
.theme--light.v-data-table thead tr:last-child th {
  border: thin solid rgba(0, 0, 0, 0.12);
}
.v-data-table td, .v-data-table th {
    padding: 0 5px;
}
</style>
