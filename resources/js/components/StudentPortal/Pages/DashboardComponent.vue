<template>
  <div>
    <!-- Component Render-->
    <v-row>
      <DashBoardHead blockHeading="Assignment" icon="mdi-tooltip-edit" link="assignment" url="/student-portal/Assignments"></DashBoardHead>
      <DashBoardHead  blockHeading="Class Routine" icon="mdi-calendar-text" link="schedual" url="/student-portal/Class-Routine"></DashBoardHead>
      <DashBoardHead  blockHeading="Attendance" icon="mdi-account-check" link="attendance sheet" url="/student-portal/Attendance-Sheet" ></DashBoardHead>

          <line-chart class="mt-4" :data="{'2017-05-13': 2, '2017-05-10': 6, '2017-05-9': 1, '2017-05-8': 0}"></line-chart>


      <!-- Component Render-->
    </v-row>
  </div>
</template>

<script>
import DashBoardHead from "../PartialsComponent/DashBoardHead";
export default {
  name: "StudentDashboard",
  components: { DashBoardHead }
};
</script>

<style scoped>
</style>
