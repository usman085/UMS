<template>
    <div>
        <AssignmentCollecterTiltle></AssignmentCollecterTiltle>
        <AssignmentCollecterBlock></AssignmentCollecterBlock>
    </div>
</template>
<script>
import AssignmentCollecterBlock from "../PartialsComponent/AssignmentCollecterBlock";
import AssignmentCollecterTiltle from "../PartialsComponent/AssignmentCollecterTiltle";
export default {
    name: "AssignmentCollector",
    components: {
        AssignmentCollecterTiltle,
        AssignmentCollecterBlock
    }
};
</script>
