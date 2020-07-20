<template>
<div class="create-time-table-wrapper">
    <v-card>
        <v-card-title class="text-center time-header">
            <b class="tmeTableHead">Daily Time Table</b>
        </v-card-title>
        <!-- Card Sub title On Inserted Object -->
        <v-card-subtitle>
            <span v-if="!scheduleHead.program == ''">Program : {{ scheduleHead.program | capitalize }}</span>
            <span v-if="!scheduleHead.semester == ''">
                <v-icon>mdi-chevron-double-right</v-icon>
                Semester : {{scheduleHead.semester | numberToNth}}
            </span>
            <span v-if="!scheduleHead.shift == ''">
                <v-icon>mdi-chevron-double-right</v-icon>
                Shift : {{scheduleHead.shift | capitalize}}
            </span>
            <!-- Edit Icon Base on condition -->
            <span v-if="!scheduleHead.program == '' && !$store.state.TimeTableDetailModal">
                <v-icon @click.stop="$store.dispatch('TimeTableDetailModal')">mdi-pencil</v-icon>
            </span>
        </v-card-subtitle>
    </v-card>
    <!-- Conditional Rendering  -->
    <div v-if="timeTableData.length > 0">
        <!-- Time Table Start -->
        <v-simple-table class="mt-5 elevation-2">
            <template>
                <thead>
                    <tr>
                        <th colspan="4">
                            <span>Lectures</span>
                            <v-btn @click="$store.dispatch('CreateTimeTableModal')" class="add-more-btn">Add More Lectures</v-btn>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Monday Rendering -->
                    <tr>
                        <td class="day">Monday</td>
                        <td v-for="(timeTable,index) in mondaySchedule" :key="index">
                            <span class="class-room">{{ timeTable.classRoom_name | capitalize }}</span>
                            <span class="class-time">{{ timeTable.startingtime+'-'+timeTable.endingTime | capitalize }}</span>
                            <br />
                            <span class="teacher-name text-center">
                                {{ timeTable.subject_name | capitalize }}
                                <br />
                            </span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            <span class="action-icons">
                                <v-icon @click="editEntry(timeTable.id)">mdi-pencil</v-icon>
                                <v-icon @click="delEntry(timeTable.id)">mdi-delete</v-icon>
                            </span>
                        </td>
                    </tr>
                    <!-- Monday Rendering -->

                    <!-- Tuesday Rendering -->
                    <tr>
                        <td class="day">Tuesday</td>
                        <td v-for="(timeTable,index) in tuesdaySchedule" :key="index">
                            <span class="class-room">{{ timeTable.classRoom_name | capitalize }}</span>
                            <span class="class-time">{{ timeTable.startingtime+'-'+timeTable.endingTime | capitalize }}</span>
                            <br />
                            <span class="teacher-name text-center">
                                {{ timeTable.subject_name | capitalize }}
                                <br />
                            </span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            <span class="action-icons">
                                <v-icon @click="editEntry(timeTable.id)">mdi-pencil</v-icon>
                                <v-icon @click="delEntry(timeTable.id)">mdi-delete</v-icon>
                            </span>
                        </td>
                    </tr>
                    <!-- Tuesday Rendering -->

                    <!-- Wednesday Rendering -->
                    <tr>
                        <td class="day">Wednesday</td>
                        <td v-for="(timeTable,index) in wednesdaySchedule" :key="index">
                            <span class="class-room">{{ timeTable.classRoom_name | capitalize }}</span>
                            <span class="class-time">{{ timeTable.startingtime+'-'+timeTable.endingTime | capitalize }}</span>
                            <br />
                            <span class="teacher-name text-center">
                                {{ timeTable.subject_name | capitalize }}
                                <br />
                            </span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            <span class="action-icons">
                                <v-icon @click="editEntry(timeTable.id)">mdi-pencil</v-icon>
                                <v-icon @click="delEntry(timeTable.id)">mdi-delete</v-icon>
                            </span>
                        </td>
                    </tr>
                    <!-- Wednesday rendering -->

                    <!-- Thursday Rendering -->
                    <tr>
                        <td class="day">Thursday</td>
                        <td v-for="(timeTable,index) in thursdaySchedule" :key="index">
                            <span class="class-room">{{ timeTable.classRoom_name | capitalize }}</span>
                            <span class="class-time">{{ timeTable.startingtime+'-'+timeTable.endingTime | capitalize }}</span>
                            <br />
                            <span class="teacher-name text-center">
                                {{ timeTable.subject_name | capitalize }}
                                <br />
                            </span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            <span class="action-icons">
                                <v-icon @click="editEntry(timeTable.id)">mdi-pencil</v-icon>
                                <v-icon @click="delEntry(timeTable.id)">mdi-delete</v-icon>
                            </span>
                        </td>
                    </tr>
                    <!-- Thursday  Rendering-->

                    <!-- Friday Rendering -->
                    <tr>
                        <td class="day">Friday</td>
                        <td v-for="(timeTable,index) in fridaySchedule" :key="index">
                            <span class="class-room">{{ timeTable.classRoom_name | capitalize }}</span>
                            <span class="class-time">{{ timeTable.startingtime+'-'+timeTable.endingTime | capitalize }}</span>
                            <br />
                            <span class="teacher-name text-center">
                                {{ timeTable.subject_name | capitalize }}
                                <br />
                            </span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            <span class="action-icons">
                                <v-icon @click="editEntry(timeTable.id)">mdi-pencil</v-icon>
                                <v-icon @click="delEntry(timeTable.id)">mdi-delete</v-icon>
                            </span>
                        </td>
                    </tr>

                    <!-- Friday Rendering -->

                    <!-- Saturday Rendering -->
                    <tr>
                        <td class="day">Saturday</td>
                        <td v-for="(timeTable,index) in saturdaySchedule" :key="index">
                            <span class="class-room">{{ timeTable.classRoom_name | capitalize }}</span>
                            <span class="class-time">{{ timeTable.startingtime+'-'+timeTable.endingTime }}</span>
                            <br />
                            <span class="teacher-name text-center">
                                {{ timeTable.subject_name | capitalize }}
                                <br />
                            </span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            <span class="action-icons">
                                <v-icon @click="editEntry(timeTable.id)">mdi-pencil</v-icon>
                                <v-icon @click="delEntry(timeTable.id)">mdi-delete</v-icon>
                            </span>
                        </td>
                    </tr>

                    <!-- Satrday Rendering -->
                </tbody>
            </template>
        </v-simple-table>
        <!-- Time Table -->
        <div>
            <v-btn @click="insertFinalTimeTable()" class="text-center save-btn" color="primary">Save Time Table</v-btn>
        </div>
    </div>

    <!-- Icon table Add -->
    <div class="addition-card text-center" v-else>
        <v-icon class="add-table" @click="$store.dispatch('TimeTableDetailModal')">mdi-table-edit</v-icon>
    </div>

    <!-- Time Table Steps Modal -->
    <timeTableDetail />

    <!-- Time Table detail Modal & 2 props-->
    <TimeTableModal :editData="EditTimeTableData" :scheduleHead="scheduleHead" :updateBtn="updateBtn" />
</div>
</template>

<script>
// *** Import Modal
import TimeTableModal from "./createTimeTableModal";
import timeTableDetail from "./TimeTableDetail";
// *** Event Bus
import EventBus from "../../../EventBus/eventBus";

export default {
    name: "createTimeTable",
    components: {
        TimeTableModal,
        timeTableDetail
    }, //Register Components
    // Mounted Hook
    mounted() {
        // *** Update Array
        EventBus.$on("updateTimeTableData", data => {
            this.timeTableData.filter(item => {
                this.updateBtn = false;
                if (item.id == data.id) {
                    item.day = data.day;
                    item.teacher = data.teacher;
                    item.classRoom = data.classRoom;
                    item.startingtime = data.startingtime;
                    item.endingTime = data.endingTime;
                    item.subject = data.subject;
                }
            });
        });

        // *** Add Time Table Detail in array
        EventBus.$on("timeTableDetail", data => {
            this.scheduleHead.program = data.program;
            this.scheduleHead.semester = data.semester;
            this.scheduleHead.shift = data.shift;
        });
        // *** Add time table Schedule in array
        EventBus.$on("timeTableData", data => {

            let id = this.randStr(6); //Genrate Random String
            // *** Push in array
            this.timeTableData.push({
                id: id,
                day: data.day,
                teacher: data.teacher,
                subject_id: data.subject_id,
                subject_name: data.subject_name,
                startingtime: data.startingtime,
                endingTime: data.endingTime,
                classRoom_name: data.classRoom_name,
                classRoom_id: data.classRoom_id,
            });
        });
    },
    // *** Data Object
    data: function () {
        return {
            updateBtn: false, //props for modal buttons
            // ***Edit Time Array use as a props
            EditTimeTableData: [{
                id: "",
                day: "",
                teacher: "",
                subject: "",
                startingtime: "",
                endingTime: "",
                classRoom: ""
            }],
            // *** Root Time Table Array
            timeTableData: [],
            //*** Time Table Detail
            scheduleHead: {
                program: "",
                semester: "",
                shift: ""
            }
        };
    },
    // Methods Object
    methods: {
        insertFinalTimeTable: function () {
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            axios.post(process.env.MIX_APP_URL+'/insert-time-table',this.timeTableData,{
                headers:headers
            })
            .then(res=>console.log(res.data))
            .catch(err =>{})
        },
        // *** Delete Entry In array
        delEntry: function (id) {
            this.timeTableData = this.timeTableData.filter(data => data.id != id);
        },
        // *** Edit Array
        editEntry: function (id) {
            this.EditTimeTableData = this.timeTableData.filter(data => data.id == id);
            this.updateBtn = true;
            this.$store.dispatch("CreateTimeTableModal");
        },
        //  Genrate Randam string Fun
        randStr(len) {
            let text = "";
            let chars = "abcdefghijklmnopqrstuvwxyz";
            for (let i = 0; i < len; i++) {
                text += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            return text + new Date().getTime();
        }
    },
    // Reactive Property
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("adminLogin")),
                "ums"
            );
        },
        // *** Filter Monday Data in Root Array
        mondaySchedule: function () {
            return this.timeTableData.filter(data => data.day == "Monday");
        },
        // *** Filter Tuesday Data in Root Array
        tuesdaySchedule: function () {
            return this.timeTableData.filter(data => data.day == "Tuesday");
        },
        // *** Filter Wednesday Data in Root Array
        wednesdaySchedule: function () {
            return this.timeTableData.filter(data => data.day == "Wednesday");
        },
        // *** Filter Thursday Data in Root Array
        thursdaySchedule: function () {
            return this.timeTableData.filter(data => data.day == "Thursday");
        },
        // *** Filter Friday Data in Root Array
        fridaySchedule: function () {
            return this.timeTableData.filter(data => data.day == "Friday");
        },
        // *** Filter Saturday Data in Root Array
        saturdaySchedule: function () {
            return this.timeTableData.filter(data => data.day == "Saturday");
        },
        // *** Filter Sunday Data in Root Array
        sundaySchedule: function () {
            return this.timeTableData.filter(data => data.day == "Sunday");
        }
    }
};
</script>

<style scoped>
.add-table {
    font-size: 215px;
    transform: translateY(50%);
}

.theme--light.v-data-table tbody tr td {
    border: thin solid rgba(0, 0, 0, 0.12);
}

.theme--light.v-data-table thead tr:last-child th {
    border: thin solid rgba(0, 0, 0, 0.12);
}

.v-data-table td {
    height: 50px;
}

.class-name {
    float: left !important;
}

.class-time {
    float: right !important;
    font-size: 15px;
}

.day {
    font-size: 18px;
    font-weight: bold;
}

.teacher-name {
    font-size: 18px;
    display: table;
    margin: 0 auto;
}

.subject-name {
    text-align: left;
}

.time-header {
    display: table;
    margin: 0 auto;
}

.add-more-btn {
    float: right;
}

.tmeTableHead {
    padding: 15px 0;
}

.action-icons {
    float: right;
}
</style>
