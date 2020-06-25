<template>
<div>
  <TitleBlock  :titleName="titleName" :subtitle="subtitle"></TitleBlock>
<ClassRoutineBlock></ClassRoutineBlock>
</div>
</template>

<script>
import ClassRoutineBlock from "../PartialsComponent/ClassRoutineBlock";
import TitleBlock from "../PartialsComponent/TitleBlock";
export default {
    components:{
        ClassRoutineBlock,
        TitleBlock

    },
    data: function() {
    return {
      titleName: "Class Routine",
      subtitle: "clasess schedual"
    };
  }
}
</script>

