<template>
<div>
    <ManageCoursesBlock></ManageCoursesBlock>
</div>
</template>

<script>
// import manage Course Block From Partial Component
import ManageCoursesBlock from '../PartialComponents/ManageCoursesBlock';
export default {
    name: 'ManageCourse',
    components: {
        ManageCoursesBlock
    }
}
</script>
