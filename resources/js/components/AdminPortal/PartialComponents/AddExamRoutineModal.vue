<template>
<div>
    <!-- modal create time table -->
    <v-row justify="center">
        <v-dialog v-model="AddExamRoutineModal" scrollable max-width="50%" persistent>
            <v-card>
                <!-- Condional Rendering -->
                <v-card-title>{{ updateBtn ? 'Update' : 'Enter' }} Add Exam Schedual</v-card-title>
                <v-card-subtitle>Select and Enter Exam Schedual</v-card-subtitle>
                <v-card-text>
                    <v-container>
                        <!-- Form Start -->
                        <v-form ref="form">
                            <!--Form Ref variable-->
                            <v-row>
                                <!-- hidden field for updating -->
                                <input type="hidden" v-model="ExamRoutineData.id" />
                                <v-col cols="12" xs="6" md="6">
                                    <v-select :items="$store.state.days" v-model="ExamRoutineData.day" label="Select Day"></v-select>
                                </v-col>
                                <v-col cols="12" xs="6" md="6">
                                   <v-menu ref="menu1" v-model="menu1" :close-on-content-click="false" transition="scale-transition" offset-y max-width="290px" min-width="290px">
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-text-field  v-model="date" label="Date of Birth*" hint="MM/DD/YYYY" persistent-hint v-bind="attrs" @blur="date = parseDate(dateFormatted)" v-on="on" required></v-text-field>
                                    </template>
                                    <v-date-picker required v-model="date" no-title @input="menu1 = false"></v-date-picker>
                                </v-menu>
                                </v-col>

                                <v-col cols="6" xs="6" md="6">
                                    <v-select :items="$store.state.allCourses" v-model="ExamRoutineData.subject_id" item-text="course_title" item-value="id" label="Select Course"></v-select>
                                </v-col>

                                <v-col cols="6">
                                    <v-select :items="classRooms" item-value="id" item-text="class_room" v-model="ExamRoutineData.classRoom_id" label="Select Class Room"></v-select>
                                </v-col>
                                <v-col cols="6">
                                    <!-- time picker -->
                                    <v-menu ref="menu" v-model="startingTimeModal" :close-on-content-click="false" :nudge-right="40" :return-value.sync="ExamRoutineData.startingTime" transition="scale-transition" offset-y max-width="290px" min-width="290px">
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-text-field v-model="ExamRoutineData.startingTime" label="Exam Start Time" prepend-icon readonly v-bind="attrs" v-on="on"></v-text-field>
                                        </template>
                                        <v-time-picker v-if="startingTimeModal" v-model="ExamRoutineData.startingTime" full-width @click:minute="$refs.menu.save(ExamRoutineData.startingTime)"></v-time-picker>
                                    </v-menu>
                                </v-col>

                                <v-col cols="6">
                                    <v-menu ref="menu2" v-model="endingTimeModal" :close-on-content-click="false" :nudge-right="40" :return-value.sync="ExamRoutineData.endingTime" transition="scale-transition" offset-y max-width="290px" min-width="290px">
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-text-field v-model="ExamRoutineData.endingTime" label="Pick Ending Time" prepend-icon readonly v-bind="attrs" v-on="on"></v-text-field>
                                        </template>
                                        <v-time-picker v-if="ExamRoutineData" v-model="ExamRoutineData.endingTime" full-width @click:minute="$refs.menu2.save(ExamRoutineData.endingTime)"></v-time-picker>
                                    </v-menu>
                                </v-col>

                                <v-col cols="12">
                                    <div class="text-center">
                                        <v-btn color="primary" v-if="!updateBtn" @click.stop="insertExamData()">Add To Schedule</v-btn>
                                        <v-btn color="primary" v-if="updateBtn" @click.stop="updateExamData()">Update the Schedule</v-btn>
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
    name: "AddExamRoutineModal",
    props: ["editData", "updateBtn"],

    data: vm => ({
        date: new Date().toISOString().substr(0, 10),
        dateFormatted: vm.formatDate(new Date().toISOString().substr(0, 10)),
        menu1: false,
        startingTimeModal: false, //Time picker modal For Starting time
        endingTimeModal: false, // Time Picker modl for Ending Time
        classRooms: [],
        courses: []
    }),

    watch: {
        date(val) {
            this.ExamRoutineData.date = this.formatDate(this.date);
        }
    },
    methods: {
        getClassRoom() {
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            axios
                .post(process.env.MIX_APP_URL + "/get-class-room-detail", "", {
                    headers: headers
                })
                .then(res => {
                    this.classRooms = res.data.rooms;
                })
                .catch(err => {});
        },
        getCourse: function () {
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            // send request to Api Route
            axios
                .post(process.env.MIX_APP_URL + "/get-all-course", "", {
                    headers: headers
                })
                .then(res => {
                    this.$store.dispatch("allCourses", res.data.courses);
                })
                .catch(error => {});
        },
        //*** Fun for Close Modal
        cancel: function () {
            this.$store.dispatch("AddExamRoutineModalToggle");
            this.$refs.form.reset();
        },
        //*** fun for get updated data and send to array
        updateExamData: function () {
            EventBus.$emit("updateExamData", this.ExamRoutineData);
            this.$store.dispatch("AddExamRoutineModalToggle");
        },
        //*** Insert Data In Table

        insertExamData: function () {
            let subject = this.$store.state.allCourses.filter(
                item => item.id == this.ExamRoutineData.subject_id
            );
            let ClassRoom = this.classRooms.filter(
                item => item.id == this.ExamRoutineData.classRoom_id
            );
            this.ExamRoutineData.subject_name = subject[0].course_title;
            this.ExamRoutineData.classRoom_name = ClassRoom[0].class_room;
            EventBus.$emit("insertExamData", this.ExamRoutineData);
            this.$store.dispatch("AddExamRoutineModalToggle");
            this.$refs.form.reset();
        },
        formatDate(date) {
            if (!date) return null;

            const [year, month, day] = date.split("-");
            return `${month}/${day}/${year}`;
        },
        parseDate(date) {
            if (!date) return null;

            const [month, day, year] = date.split("/");
            return `${year}-${month.padStart(2, "0")}-${day.padStart(2, "0")}`;
        }
    },
    // *** Reactive Property
    computed: {
        //User Auth function authorizing Admin & use in Header
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("adminLogin")),
                "ums"
            );
        },
        // *** Time Table Modal Object if update data get then put in object
        ExamRoutineData: function () {
            return {
                id: this.editData.id,
                subject_id: this.editData.subject_id,
                subject_name: this.editData.subject_name,
                day: this.editData.day,
                date: this.editData.date,
                endingTime: this.editData.endingTime,
                startingtime: this.editData.startingtime,
                classRoom_id: this.editData.classRoom_id,
                classRoom_name: this.editData.classRoom_name
            };
        },
        // set the formate of date
        computedDateFormatted() {
            return this.formatDate(this.date);
        },
        // *** Toggle Schedule Modal
        AddExamRoutineModal: function () {
            return this.$store.state.AddExamRoutineModal;
        }
    },
    created() {
        this.getCourse();
        this.getClassRoom();
    }
};
</script>

<style scoped>
.cancel-btn {
    color: white;
}
</style>
