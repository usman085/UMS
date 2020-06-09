<template>
  <v-simple-table class="mt-5 elevation-2">
    <template>
      <thead>
        <tr>
          <th></th>
          <th class="text-center headline">Monday</th>
          <th class="text-center headline">Tuesday</th>
          <th class="text-center headline">Wednesday</th>
          <th class="text-center headline">Thursday</th>
          <th class="text-center headline">Friday</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in items" :key="item.name">
          <td class="title">{{ item.time }}</td>
          <td class="text-center body-1">

            <span class="float-left">{{ item.teacher }}</span>
            <br />
            <span class="font-weight-black mt-1 title">{{ item.mon}}</span>
            <br />
            <span class="float-right">{{ item.room }}</span>

          </td>

          <td class="text-center body-1">
            <span class="float-left">{{ item.teacher }}</span>
            <br />
            <span class="font-weight-black mt-1 title">{{ item.tue }}</span>
            <br />
            <span class="float-right">{{ item.room }}</span>
          </td>

          <td class="text-center body-1">

            <span class="float-left">{{ item.teacher }}</span>
            <br />
            <span class="font-weight-black mt-1 title">{{ item.wed }}</span>
            <br />
            <span class="float-right">{{ item.room }}</span>

          </td>

          <td class="text-center body-1">
            <span class="float-left">{{ item.teacher }}</span>
            <br />
         <span class="font-weight-black mt-1 title">{{ item.thu }}</span>
            <br />
            <span class="float-right">{{ item.room }}</span>
          </td>

          <td class="text-center body-1">
            <span class="float-left">{{ item.teacher }}</span>
            <br />
             <span class="font-weight-black mt-1 title">{{ item.fri }}</span>
            <br />
            <span class="float-right">{{ item.room }}</span>
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
          time: "9:00 - 11:00",
          teacher: "Ijaz Hussain",
          mon: "Islamiyat",
          room: "Cr 2",
          tue: "PakStudies",
          wed: "",
          thu: "Computer",
          fri: "Isl"
        },
        {
          time: "11:00 - 1:00",
           teacher: "Ijaz Hussain",
          mon: "Urdu",
            room: "Cr 2",
          tue: "",
          wed: "Computer",
          thu: "PakStudies",
          fri: ""
        },
        {
          time: "1:00 - 3:00",
           teacher: "Ijaz Hussain",
             room: "Cr 2",
          mon: "English",
          tue: "Computer",
          wed: "",
          thu: "English",
          fri: "English"
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
