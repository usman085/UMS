<template>
  <div class="assignment-wrapper">
    <TitleBlock :titleName="titleName"></TitleBlock>

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
      titleName: "Your's Assignments",
    
    };
  }
};
</script>

<style scoped>
</style>
