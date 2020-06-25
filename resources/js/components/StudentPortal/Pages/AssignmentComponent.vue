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
      subtitle : "Assigned Assignments Detail",
    };
  }
};
</script>

<style scoped>
</style>
