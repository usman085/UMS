<template>
<v-dialog scrollable v-model="dialog" max-width="800">
    <v-card>
        <v-card-title>
            Bachelor Of Software Enginnnerinh
            <v-spacer></v-spacer>
            <v-icon>mdi-close</v-icon>
        </v-card-title>
        <v-card-subtitle>
            BSSE | No of Semester 8 | Durtion 4 Year
            <v-divider></v-divider>
        </v-card-subtitle>
        <v-card-text>
            <div class="course-block">
                <v-container fluid="">
                    <v-row>
                        <v-col cols="6">
                    <div>
                        <span><v-checkbox  label="Computer Network" value="John"></v-checkbox></span>
                    </div>
                </v-col>
                <v-col cols="6">
                    
                </v-col>
                    </v-row>
                </v-container>
                
            </div>
        </v-card-text>
    </v-card>
</v-dialog>
</template>

<script>
export default {
    name: 'CourseAssignModal',
    data: function () {
        return {
            dialog: false
        }
    }
}
</script>
<style scoped>
.course-block{
    
    border: 1px solid #eee;
}
</style>
