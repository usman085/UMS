<template>
    <div>
        <AssignmentCollectorTitle></AssignmentCollectorTitle>
        <AssignmentCollecterBlock></AssignmentCollecterBlock>
    </div>
</template>
<script>
import AssignmentCollecterBlock from "../PartialsComponent/AssignmentCollecterBlock";
import AssignmentCollectorTitle from "../PartialsComponent/AssignmentCollectorTitle";
export default {
    name: "AssignmentCollector",
    components: {
        AssignmentCollectorTitle,
        AssignmentCollecterBlock
    }
};
</script>
