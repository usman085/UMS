<template>
  <div>
    <!-- Component Render-->
    <v-row>
      <DashBoardHead blockHeading="Assignment"></DashBoardHead>
      <DashBoardHead></DashBoardHead>
      <DashBoardHead></DashBoardHead>
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
