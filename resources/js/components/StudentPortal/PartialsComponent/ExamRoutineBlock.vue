<template>
  <v-simple-table class="mt-5 elevation-2">
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-center headline font-weight-black">Day & Date</th>
          <th class="text-center headline font-weight-black">Time</th>
          <th class="text-center headline font-weight-black">Subject</th>
          <th class="text-center headline font-weight-black">Room</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in items" :key="item.name">
          <td class="text-center title font-weight-bold">
            <span>{{ item.day }}</span>
            <span class="ml-2 mr-2">&</span>
            <span>{{ item.date }}</span>
          </td>
          <td class="text-center title font-weight-bold">{{ item.time }}</td>
          <td class="text-center title font-weight-bold">{{ item.subject }}</td>
          <td class="text-center title font-weight-bold">{{ item.room }}</td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>

<script>
export default {
  data() {
    return {
      items: [
        {
          day: "Monday",
          date: "01-02-2020",
          time: "9:00 am to 1:00 pm",
          subject: "English",
          room: "Cr 1"
        },
        {
          day: "Tuesday",
          date: "02-02-2020",
          time: "9:00 am to 1:00 pm",
          subject: "Urdu",
          room: "Cr 2"
        },
        {
          day: "Wednesday",
          date: "03-02-2020",
          time: "9:00 am to 1:00 pm",
          subject: "Islamiyat",
          room: "Cr 3"
        },
        {
          day: "Thursday",
          date: "04-02-2020",
          time: "9:00 am to 1:00 pm",
          subject: "Pak-Studies",
          room: "Cr 4"
        },
        {
          day: "Friday",
          date: "05-02-2020",
          time: "9:00 am to 1:00 pm",
          subject: "Physics",
          room: "Cr 6"
        }
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
.v-data-table td {
  height: 100px;
}
</style>
