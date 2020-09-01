<template>
    <div class="manage-assignment">
    <v-card>
        <v-card-title>Manage Assignments</v-card-title>
        <v-card-subtitle>All Assigned Assignmts here</v-card-subtitle>
        <v-card-subtitle class="text-center">
             <v-btn text color="primary" @click="$router.push({name:'AssignedAssignments'})">Assigned Assignments</v-btn>
              <v-btn text color="primary"  @click="$router.push({name:'AssignNewAssignments'})">Assign New Assignment</v-btn>
               <v-btn text color="primary">Assignment Collector</v-btn>
        </v-card-subtitle>

        <router-view></router-view>
    </v-card>
    
    </div><!-- manage-assignment -->
</template>

<script>
export default {
    name:'ManageAssigment',

}
</script>