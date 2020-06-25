<template>
<div>
    <TitleBlock  :titleName="titleName" :subtitle="subtitle"></TitleBlock>

<AcademicSyllabusBlock></AcademicSyllabusBlock>

</div>
</template>
<script>
import TitleBlock from "../PartialsComponent/TitleBlock";
import AcademicSyllabusBlock from '../PartialsComponent/AcademicSyllabusBlock';

export default {
components:{
    TitleBlock,
    AcademicSyllabusBlock,

},

  data: function() {
    return {
      titleName: "Semester 6 th",
      subtitle: "scheme of studies"
    };
  }
}
</script>
