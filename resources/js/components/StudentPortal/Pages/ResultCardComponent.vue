<template>
<div>
    <TitleBlock :titleName="titleName"></TitleBlock>
    <ResultCardBlock></ResultCardBlock>
</div>
</template>
<script>
import TitleBlock from "../PartialsComponent/TitleBlock";
import ResultCardBlock from "../PartialsComponent/ResultCardBlock";
export default {
    name:"ResultCardComponent",
    components:{
      ResultCardBlock ,TitleBlock
    },
       data: function() {
    return {
      titleName: "Result Card",

    };
  }
}
</script>
