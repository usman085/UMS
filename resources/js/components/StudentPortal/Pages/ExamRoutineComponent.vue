<template>
  <div>
      <TitleBlock :titleName="titleName" :subtitle="subtitle"></TitleBlock>
    <ExamRoutineBlock></ExamRoutineBlock>
  </div>
</template>

<script>
import TitleBlock from "../PartialsComponent/TitleBlock";
import ExamRoutineBlock from "../PartialsComponent/ExamRoutineBlock";

export default {
  components: {
    ExamRoutineBlock,
    TitleBlock
  },
  data: function() {
    return {
      titleName: "Exam Routine",
      subtitle : "exam schedual"
    };
  }
};
</script>

