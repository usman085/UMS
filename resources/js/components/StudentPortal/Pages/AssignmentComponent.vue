<template>
  <div class="assignment-wrapper">
    <TitleBlock  :titleName="titleName" :subtitle="subtitle"></TitleBlock>

    <AssignmentBlock></AssignmentBlock>
  </div>
  <!--assignment-wrapper-->
</template>

<script>
import TitleBlock from "../PartialsComponent/TitleBlock";
import AssignmentBlock from "../PartialsComponent/AssignmentsBlockComponent";
export default {
  name: "Assignment",
  components: { TitleBlock, AssignmentBlock },
  data: function() {
    return {
      titleName: "Assignments",
      subtitle : "assigned assignments detail",
    };
  }
};
</script>

<style scoped>
</style>
