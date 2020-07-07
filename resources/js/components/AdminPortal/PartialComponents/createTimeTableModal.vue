<template>
<div>
    <!-- modal create time table -->
    <v-row justify="center">
        <v-dialog v-model="scheduleModalToggle" max-width="50%" persistent>
            <v-card>
                <!-- Condional Rendering -->
                <v-card-title>{{ updateBtn ? 'Update' : 'Enter' }} Lecture Detail</v-card-title>
                <v-card-subtitle>Select and Enter Lecture Details</v-card-subtitle>
                <v-card-text>
                    <v-container>
                        <!-- Form Start -->
                        <v-form ref="form">
                            <!--Form Ref variable-->
                            <v-row>
                                <!-- hidden field for updating -->
                                <input type="hidden" v-model="detailSchedule.id" />
                                <v-col cols="12">
                                    <v-select :items="$store.state.days" v-model="detailSchedule.day" label="Select Day"></v-select>
                                </v-col>
                                <v-col cols="12">
                                    <v-select :items="$store.state.subjects" v-model="detailSchedule.subject" label="Select Subject"></v-select>
                                </v-col>

                                <v-col cols="6">
                                    <v-select :items="$store.state.teachers" v-model="detailSchedule.teacher" label="Select Teacher"></v-select>
                                </v-col>

                                <v-col cols="6">
                                    <v-select :items="$store.state.classRooms" v-model="detailSchedule.classRoom" label="Select Class"></v-select>
                                </v-col>
                                <v-col cols="6">
                                    <!-- time picker -->
                                    <v-menu ref="menu" v-model="startingTimeModal" :close-on-content-click="false" :nudge-right="40" :return-value.sync="detailSchedule.startingtime" transition="scale-transition" offset-y max-width="290px" min-width="290px">
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-text-field v-model="detailSchedule.startingtime" label="Pick Starting Time" prepend-icon readonly v-bind="attrs" v-on="on"></v-text-field>
                                        </template>
                                        <v-time-picker v-if="startingTimeModal" v-model="detailSchedule.startingtime" full-width @click:minute="$refs.menu.save(detailSchedule.startingtime)"></v-time-picker>
                                    </v-menu>
                                </v-col>

                                <v-col cols="6">
                                    <v-menu ref="menu2" v-model="endingTimeModal" :close-on-content-click="false" :nudge-right="40" :return-value.sync="detailSchedule.endingTime" transition="scale-transition" offset-y max-width="290px" min-width="290px">
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-text-field v-model="detailSchedule.endingTime" label="Pick Ending Time" prepend-icon readonly v-bind="attrs" v-on="on"></v-text-field>
                                        </template>
                                        <v-time-picker v-if="endingTimeModal" v-model="detailSchedule.endingTime" full-width @click:minute="$refs.menu2.save(detailSchedule.endingTime)"></v-time-picker>
                                    </v-menu>
                                </v-col>

                                <v-col cols="12">
                                    <div class="text-center">
                                        <v-btn color="primary" v-if="!updateBtn" @click.stop="insertTimeTable()">Add To Schedule</v-btn>
                                        <v-btn color="primary" v-if="updateBtn" @click.stop="updateTableData()">Update the Schedule</v-btn>
                                        <v-btn color="red" class="cancel-btn" @click.stop="cancel()">Cancel</v-btn>
                                    </div>
                                </v-col>
                            </v-row>
                        </v-form>
                    </v-container>
                </v-card-text>
            </v-card>
        </v-dialog>
    </v-row>

    <!-- modal time table -->
</div>
</template>

<script>
// *** Import Event Bus
import EventBus from "../../../EventBus/eventBus";

export default {
    name: "TimeTableModal",
    props: ["editData", "updateBtn"], //props 'editData' for Updating & 'updateBtn' for Btn & title
    data: function () {
        return {
            startingTimeModal: false, //Time picker modal For Starting time
            endingTimeModal: false // Time Picker modl for Ending Time
        };
    },
    // *** Data Object
    methods: {
        //*** Fun for Close Modal
        cancel: function () {
            this.$store.dispatch("CreateTimeTableModal");
            this.$refs.form.reset();
        },
        //*** fun for get updated data and send to array
        updateTableData: function () {
            EventBus.$emit("updateTimeTableData", this.detailSchedule);
            this.$store.dispatch("CreateTimeTableModal");
            this.$refs.form.reset();
        },
        //*** Insert Data In Table
        insertTimeTable: function () {
            EventBus.$emit("timeTableData", this.detailSchedule);
            this.$store.dispatch("CreateTimeTableModal");
            this.$refs.form.reset();
        }
    },
    // *** Reactive Property
    computed: {
        // *** Time Table Modal Object if update data get then put in object
        detailSchedule: function () {
            return {
                id: this.editData[0].id,
                day: this.editData[0].day,
                teacher: this.editData[0].teacher,
                subject: this.editData[0].subject,
                startingtime: this.editData[0].startingtime,
                endingTime: this.editData[0].endingTime,
                classRoom: this.editData[0].classRoom
            };
        },
        // *** Toggle Schedule Modal
        scheduleModalToggle: function () {
            return this.$store.state.CreateTimeTableModal;
        }
    }
};
</script>

<style scoped>
.cancel-btn {
    color: white;
}
</style>
