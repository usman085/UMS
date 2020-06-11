<template>
<div>
<ExamRoutineTitle></ExamRoutineTitle>
<ExamRoutineBlock></ExamRoutineBlock>
</div>
</template>

<script>
import ExamRoutineBlock from "../PartialsComponent/ExamRoutineBlock";
import ExamRoutineTitle from "../PartialsComponent/ExamRoutineTitle";
export default {
    components:{
        ExamRoutineBlock,
        ExamRoutineTitle
    }
}
</script>
