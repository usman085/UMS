<template>
<div>
    <TitleBlock :titleName="titleName"></TitleBlock>
    <FinalResultCardBlock/>
</div>
</template>
<script>
import TitleBlock from "../PartialsComponent/TitleBlock";
import FinalResultCardBlock from "../PartialsComponent/FinalResultCardBlock";
export default {
    name:"finalResultCardComponent",
    components:{
      FinalResultCardBlock ,TitleBlock
    },
       data: function() {
    return {
      titleName: "Final Exam Result Card",

    };
  }
}
</script>
