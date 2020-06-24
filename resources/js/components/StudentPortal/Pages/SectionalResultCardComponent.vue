<template>
<div>
    <TitleBlock :titleName="titleName"></TitleBlock>
    <SectionalResultCardBlock/>
</div>
</template>
<script>
import TitleBlock from "../PartialsComponent/TitleBlock";
import SectionalResultCardBlock from "../PartialsComponent/SectionalResultCard";
export default {
    name:"finalResultCardComponent",
    components:{
      SectionalResultCardBlock ,TitleBlock
    },
       data: function() {
    return {
      titleName: "Mid Exam Result",

    };
  }
}
</script>
