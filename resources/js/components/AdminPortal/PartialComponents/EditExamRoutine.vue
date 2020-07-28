<template>
<div>
    <v-card>
        <v-card-title>
            <span class="back-btn">
                <v-icon @click="$router.push({name:'ExamRoutineBlock'})">mdi-arrow-left</v-icon>
            </span>
            Exam Schedule
        </v-card-title>
        <v-card-subtitle>

            <span v-if="program == null">
                <v-progress-linear indeterminate color="cyan"></v-progress-linear>
            </span>
            <span v-else>
                {{program.program.program_title}} - Semester {{ program.semester | numberToNth }}</span>
        </v-card-subtitle>
        <v-btn style="float:right;" @click="$store.dispatch('AddExamRoutineModalToggle')">Add More Class Routine</v-btn>
        <v-divider></v-divider>
        <v-card-text>
            <div v-if="loading" class="text-center">
                <v-progress-circular indeterminate :size="50" color="primary"></v-progress-circular>
            </div>
            <div v-else>
                <v-simple-table class="mt-5 elevation-2">
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th class="text-center headline">Day</th>
                                <th class="text-center headline">Date</th>
                                <th class="text-center headline">Start Time</th>
                                <th class="text-center headline">End Time</th>
                                <th class="text-center headline">Subject</th>
                                <th class="text-center headline">Room</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in examSchedule" :key="item.id">
                                <td class="text-center title">{{ item.day }}</td>
                                <td class="text-center title">{{ item.date }}</td>
                                <td class="text-center title">{{ item.startingTime }}</td>
                                <td class="text-center title">{{ item.endingTime }}</td>
                                <td class="text-center title">{{ item.course.course_title }}</td>
                                <td class="text-center title">
                                    {{ item.class_room.class_room }}
                                    <span class="action-icons">
                                        <v-icon @click="editData(item)">mdi-pencil</v-icon>
                                        <v-icon @click="deleteItem(item)">mdi-delete</v-icon>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>

                <div class="text-center save-btn">
                    <v-btn class="text-center save-btn" @click="updateExamDB()" color="primary">Update Exam Routine</v-btn>
                </div>
            </div>
        </v-card-text>
    </v-card>
    <!-- <AddExamModal></AddExamModal -->
    <pacer :message="tableMessage" />
    <AddExamRoutineModal :updateBtn="updateBtn" :editData="EditExamData"></AddExamRoutineModal>
</div>
</template>

<script>
import AddExamModal from "../PartialComponents/AddExamModal";

// *** Event Bus Use to Communicate Data Between Two Components
import EventBus from "../../../EventBus/eventBus";

// *** Import Model From Partial Components
import AddExamRoutineModal from "../PartialComponents/AddExamRoutineModal";

import pacer from '../../CommonGobalComponent/Pacer';

export default {
    name: "EditExamRoutine",
    components: {
        AddExamModal,
        AddExamRoutineModal,
        pacer
    },
    data() {
        return {
            tableMessage: '',
            loading: true,
            insertExamData: [],
            examSchedule: [],
            exam_routine_id: "",
            program: null,
            updateBtn: false,
            EditExamData: {
                id: "",
                day: "",
                date: "",
                subject_id: "",
                subject_name: "",
                startingTime: "",
                endingTime: "",
                classRoom_name: "",
                class_room_id: "",
                exam_routine_id: "",
            },
        };
    },
    mounted() {
        // Listen The data Recieve From  insertExamData To insert Data
        EventBus.$on("insertExamData", (data) => {

            let id = this.randStr(6); //Genrate Random String
            // *** Push in array
            this.examSchedule.push({
                id: id,
                day: data.day,
                date: data.date,
                course_id: data.subject_id,
                course: {
                    course_title: data.subject_name
                },
                startingTime: data.startingTime,
                endingTime: data.endingTime,
                class_room: {
                    class_room: data.classRoom_name
                },
                class_room_id: data.class_room_id,
                exam_routine_id: this.exam_routine_id
            });
        });

        // Listen The data Recieve From  updateExamData To update Data
        EventBus.$on("updateExamData", (data) => {
            this.examSchedule.filter((item) => {
                this.updateBtn = false;
                if (item.id == data.id) {
                    item.day = data.day;
                    item.date = data.date;
                    (item.course_id = data.subject_id),
                    (item.course.course_title = data.subject_name),
                    (item.startingTime = data.startingTime),
                    (item.endingTime = data.endingTime),
                    (item.class_room.class_room = data.classRoom_name),
                    (item.class_room_id = data.class_room_id)
                }
            });
        });

        // *** Add Time Table Detail in array
        EventBus.$on("ExamRoutineDetail", (data) => {
            this.scheduleHead.program = data.program;
            this.scheduleHead.semester = data.semester;
            this.scheduleHead.shift = data.shift;
        });
    },
    computed: {
        //User Auth function authorizing Admin & use in Header
        userAuth: function () {
            return cryptoJSON.decrypt(JSON.parse(localStorage.getItem("adminLogin")), "ums");
        },
    },

    methods: {
        getExamSchedule(id) {
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token,
            };
            // send request to Api Route
            axios.post(process.env.MIX_APP_URL + "/get-exam-schedule", {
                    id: id,
                }, {
                    headers: headers,
                })
                .then((response) => {
                    this.examSchedule = response.data.examSchedule[0].exam_routine_detail;
                    this.program = response.data.examSchedule[0];
                    this.loading = false;
                })
                .catch((error) => {});
        },
        updateExamDB: function () {
            this.tableMessage = "Updating Exam Routine......";
            this.$store.dispatch('overlay');
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token,
            };
            axios.post(process.env.MIX_APP_URL + "/update-exam-routine", {
                    'exam_routine': this.$route.params.id,
                    'exam_routine_data': this.examSchedule
                }, {
                    headers: headers,
                })
                .then(res => {
                    this.tableMessage = "";
                    this.$store.dispatch('overlay');

                    this.$router.push({
                        name: 'ExamRoutinePreview',
                        params: {
                            id: this.$route.params.id,
                            slug: 'Newly Added Exam Routine'
                        }
                    })

                })
                .catch((error) => {});
        },
        // Edit Data Function Is use to Edit Row Data
        // Edit Data Function Is use to Edit Row Data
        editData(item) {
            (this.EditExamData.id = item.id),
            (this.EditExamData.day = item.day),
            (this.EditExamData.date = item.date),
            (this.EditExamData.subject_id = item.course_id),
            (this.EditExamData.subject_name = item.course.course_title),
            (this.EditExamData.startingTime = item.startingTime),
            (this.EditExamData.endingTime = item.endingTime),
            (this.EditExamData.classRoom_name = item.class_room.class_room),
            (this.EditExamData.class_room_id = item.class_room_id),
            (this.EditExamData.exam_routine_id = item.id);
            this.updateBtn = true;
            this.$store.dispatch("AddExamRoutineModalToggle");
        },
        // Delete item Function Delete The Desired Row
        deleteItem(item) {
            console.log(item);
            this.insertExamData.splice(item, 1);
            //  this.insertExamData = this.insertExamData.filter(data => data.id != id);
        },
        //  Genrate Randam string Fun
        randStr(len) {
            let text = "";
            let chars = "abcdefghijklmnopqrstuvwxyz";
            for (let i = 0; i < len; i++) {
                text += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            return text + new Date().getTime();
        },
    },
    created() {
        this.getExamSchedule(this.$route.params.id);
    },
};
</script>

<style scoped>
.theme--light.v-data-table tbody tr td {
    border: thin solid rgba(0, 0, 0, 0.12);
}

.theme--light.v-data-table thead tr:last-child th {
    border: thin solid rgba(0, 0, 0, 0.12);
}

.save-btn {
    margin-top: 10px;
}

.v-data-table td {
    height: 50px;
}

@media only screen and (max-width: 700px) {
    .v-data-table td {
        min-width: 225px !important;
    }
}
</style>
