<template>
  <v-simple-table class="mt-5 elevation-2">
    <template>
      <thead>
        <tr>
          <th></th>
          <th class="text-center headline">9:00 - 1:00</th>
          <th class="text-center headline">1:00 - 2:00</th>
          <th class="text-center headline">2:00 - 3:00</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in items" :key="item.name">
          <td class="title">{{ item.day }}</td>
          <td class="text-center body-1">
            <span class="float-left">{{ item.teacher1 }}</span>
            <br />
            <span class="font-weight-black mt-1 title">{{ item.sub1}}</span>
            <br />
            <span class="float-right">{{ item.room1 }}</span>
          </td>

          <td class="text-center body-1">
            <span class="float-left">{{ item.teacher2 }}</span>
            <br />
            <span class="font-weight-black mt-1 title">{{ item.sub2 }}</span>
            <br />
            <span class="float-right">{{ item.room2 }}</span>
          </td>

          <td class="text-center body-1">
            <span class="float-left">{{ item.teacher3 }}</span>
            <br />
            <span class="font-weight-black mt-1 title">{{ item.sub3 }}</span>
            <br />
            <span class="float-right">{{ item.room3 }}</span>
          </td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>
<script>
export default {
  name: "ClassRoutineBlock",
  data() {
    return {
      items: [
        {
          day: "Monday",

          teacher1: "Ijaz Hussain",
          teacher2: "Sabir",
          teacher3: "Usman",

          sub1: "Islamiyat",
          sub2: "Urdu",
          sub3: "English",

          room1: "Cr 2",
          room2: "Cr 4",
          room3: "Cr 3"
        },
        {
          day: "Tuesday",

          teacher1: "Ijaz",
          teacher2: "Asslam",
          teacher3: "Uzair",

          sub1: "Computer",
          sub2: "Physics",
          sub3: "Urdu",

          room1: "Cr 6",
          room2: "Cr 2",
          room3: "Cr 5"
        },
        {
          day: "Wednesday",
          teacher1: "Hussain",
          teacher2: "Usman",
          teacher3: "Sabir",

          sub1: "English",
          sub2: "Urdu",
          sub3: "Islamiyat",

          room1: "Cr 1",
          room2: "Cr 3",
          room3: "Cr 2"
        },
        {
          day: "Thursday",
          teacher1: "Ijaz Hussain",
          teacher2: "Sabir",
          teacher3: "Usman",

          sub1: "Islamiyat",
          sub2: "Urdu",
          sub3: "English",

          room1: "Cr 5",
          room2: "Cr 3",
          room3: "Cr 1"
        },
        {
          day: "Friday",
          teacher1: "Ijaz Hussain",
          teacher2: "Sabir",
          teacher3: "Usman",

          sub1: "Islamiyat",
          sub2: "Urdu",
          sub3: "English",

          room1: "Cr 1",
          room2: "Cr 4",
          room3: "Cr 3"
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
  height: 50px;
}
</style>
