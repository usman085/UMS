<template>
<div class="assigned-assignment">
    <v-card-text>
        <h4>Assigned Assignments</h4>
        <v-divider></v-divider>
        <v-simple-table>
            <template v-slot:default>
                <thead>
                    <tr>
                        <th class="text-left">Assignment Title</th>
                        <th class="text-left">Program</th>
                        <th class="text-left">Semester | Shift</th>
                        <th class="text-left">Assigned Date</th>
                        <th class="text-left">Due Date</th>
                        <th class="text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lab Task</td>
                        <td>BSSE</td>
                        <td>1st | Morning</td>
                        <td>Monday 20,2020</td>
                        <td>Monday 24,2020</td>
                        <td><v-icon>mdi-dots-vertical</v-icon></td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
    </v-card-text>
</div><!-- manage-assignment -->
</template>

<script>
export default {
    name: 'AssignAssignments',

}
</script>
