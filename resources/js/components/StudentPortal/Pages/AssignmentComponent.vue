<template>
    <div class="assignment-wrapper">
         <TitleBlock :titleName="titleName" :subTitle="subTitle"></TitleBlock>

        <AssignmentBlock></AssignmentBlock>
    </div><!--assignment-wrapper-->
</template>

<script>
import TitleBlock from '../PartialsComponent/TitleBlock';
import AssignmentBlock from '../PartialsComponent/AssignmentsBlockComponent';
export default{
    name:'Assignment',
    components:{TitleBlock,AssignmentBlock},
    data:function(){
        return{
           titleName:'Assignment Tasks',
           subTitle:'All Assign Task Show Here'
        };
    }

}
</script>

<style scoped>

</style>