<template>
<div class="create-time-table-wrapper">
    <v-card>
        <span text-align="left" class="back-btn">
            <v-icon @click="$router.push({name:'allTimeTable'})">mdi-arrow-left</v-icon>
        </span>
        <v-card-title class=" time-header">
            <b class="tmeTableHead text-center">Daily Time Table</b></v-card-title>
        <!-- Card Sub title On Inserted Object -->
        <v-card-subtitle>test</v-card-subtitle>
    </v-card>
    <!-- Conditional Rendering  -->
    <div>
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
                    <tr>
                        <td class="day">Monday</td>

                        <td v-for="(timeTable, index) in mondaySchedule" :key="index">
                            <span class="class-room">{{
                            timeTable.class_room.class_room | capitalize
                        }}</span>
                            <span class="class-time">{{
                            timeTable.startingTime +'-' +timeTable.endingTime | capitalize
                        }}</span>
                            <br />
                            <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            <span class="action-icons">
                                <v-icon @click="editEntry(timeTable.id)">mdi-pencil</v-icon>
                                <v-icon @click="delEntry(timeTable.id)">mdi-delete</v-icon>
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td class="day">Tuesday</td>

                        <td v-for="(timeTable, index) in tuesdaySchedule" :key="index">
                            <span class="class-room">{{
                            timeTable.class_room.class_room | capitalize
                        }}</span>
                            <span class="class-time">{{
                            timeTable.startingTime +'-' +timeTable.endingTime | capitalize
                        }}</span>
                            <br />
                            <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            <span class="action-icons">
                                <v-icon @click="editEntry(timeTable.id)">mdi-pencil</v-icon>
                                <v-icon @click="delEntry(timeTable.id)">mdi-delete</v-icon>
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td class="day">Wednesday</td>

                        <td v-for="(timeTable, index) in wednesdaySchedule" :key="index">
                            <span class="class-room">{{
                            timeTable.class_room.class_room | capitalize
                        }}</span>
                            <span class="class-time">{{
                            timeTable.startingTime +'-' +timeTable.endingTime | capitalize
                        }}</span>
                            <br />
                            <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            <span class="action-icons">
                                <v-icon @click="editEntry(timeTable.id)">mdi-pencil</v-icon>
                                <v-icon @click="delEntry(timeTable.id)">mdi-delete</v-icon>
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td class="day">Thrusday</td>

                        <td v-for="(timeTable, index) in thursdaySchedule" :key="index">
                            <span class="class-room">{{
                            timeTable.class_room.class_room | capitalize
                        }}</span>
                            <span class="class-time">{{
                            timeTable.startingTime +'-' +timeTable.endingTime | capitalize
                        }}</span>
                            <br />
                            <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            <span class="action-icons">
                                <v-icon @click="editEntry(timeTable.id)">mdi-pencil</v-icon>
                                <v-icon @click="delEntry(timeTable.id)">mdi-delete</v-icon>
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td class="day">Friday</td>

                        <td v-for="(timeTable, index) in fridaySchedule" :key="index">
                            <span class="class-room">{{
                            timeTable.class_room.class_room | capitalize
                        }}</span>
                            <span class="class-time">{{
                            timeTable.startingTime +'-' +timeTable.endingTime | capitalize
                        }}</span>
                            <br />
                            <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            <span class="action-icons">
                                <v-icon @click="editEntry(timeTable.id)">mdi-pencil</v-icon>
                                <v-icon @click="delEntry(timeTable.id)">mdi-delete</v-icon>
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td class="day">Saturday</td>

                        <td v-for="(timeTable, index) in saturdaySchedule" :key="index">
                            <span class="class-room">{{
                            timeTable.class_room.class_room | capitalize
                        }}</span>
                            <span class="class-time">{{
                            timeTable.startingTime +'-' +timeTable.endingTime | capitalize
                        }}</span>
                            <br />
                            <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            <span class="action-icons">
                                <v-icon @click="editEntry(timeTable.id)">mdi-pencil</v-icon>
                                <v-icon @click="delEntry(timeTable.id)">mdi-delete</v-icon>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
        <!-- Time Table -->
        <div>
            <v-btn class="text-center save-btn" color="primary" @click="updateTimeTable()">Update Time Table</v-btn>
        </div>
    </div>

    <!-- Time Table Steps Modal -->
    <timeTableDetail />

    <!-- Time Table detail Modal & 2 props-->
    <TimeTableModal :editData="EditTimeTableData" :updateBtn="updateBtn" />

</div>
</template>

<script>
// *** Import Modal
import TimeTableModal from './createTimeTableModal';
import timeTableDetail from './TimeTableDetail';
// *** Event Bus
import EventBus from '../../../EventBus/eventBus';

export default {
    name: 'EditTimeTable',
    components: {
        TimeTableModal,
        timeTableDetail
    }, //Register Components
    // Mounted Hook
    mounted() {

        this.getTImeTableData(this.$route.params.id);
        // *** Update Array
        EventBus.$on('updateTimeTableData', (data) => {
            this.timeTableData.filter(item => {
                this.updateBtn = false;
                if (item.id == data.id) {
                    item.day = data.day;
                    item.teacher = data.teacher,
                    item.course_id= data.subject_id,
                    item.course.course_title = data.subject_name,
                    item.startingTime = data.startingTime,
                    item.endingTime = data.endingTime,
                    item.class_room.class_room = data.classRoom_name,
                    item.classRoom_id = data.classRoom_id,
                    item.time_table_id=this.time_table_id
                }
            });
        });
        // *** Add Time Table Detail in array
        EventBus.$on('timeTableDetail', (data) => {
            this.scheduleHead.program = data.program;
            this.scheduleHead.semester = data.semester;
            this.scheduleHead.shift = data.shift;

        });
        // *** Add time table Schedule in array
        EventBus.$on('timeTableData', (data) => {
            let id = this.randStr(6); //Genrate Random String
            // *** Push in array
            
            this.timeTableData.push({
                id: id,
                day: data.day,
                teacher: data.teacher,
                course_id: data.subject_id,
                course:{course_title: data.subject_name},
                startingTime: data.startingTime,
                endingTime: data.endingTime,
                class_room:{class_room: data.classRoom_name},
                classRoom_id: data.classRoom_id,
                time_table_id:this.time_table_id
            });

        });
    },
    // *** Data Object
    data: function () {
        return {
            loading: true,
            program: null,
            timeTableData: [],
            time_table_id:'',
            updateBtn: false, //props for modal buttons
            // ***Edit Time Array use as a props
            EditTimeTableData: {
                id: '',
                day: '',
                teacher: '',
                subject_id: '',
                subject_name: '',
                startingTime: '',
                endingTime: '',
                classRoom_name: '',
                classRoom_id: '',
                time_table_id:''
            },
            // *** Root Time Table Array

            //*** Time Table Detail
            scheduleHead: {
                program: '',
                semester: '',
                shift: '',

            }

        }
    },
    // Methods Object
    methods: {
        updateTimeTable:function(){
             // Headers are required for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
             axios.post(process.env.MIX_APP_URL + '/update-time-table-data',this.timeTableData,{headers: headers})
            .then(res=>console.log(res))
            .catch(err=>{})
        },
        getTImeTableData: function (id) {
            // Headers are required for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            // sending request to Api Route
            axios.post(process.env.MIX_APP_URL + '/time-table-data', {
                    'id': id
                }, {
                    headers: headers
                })
                .then((res) => {
                    this.timeTableData = res.data.timeTable[0].time_table_detail;
                    this.time_table_id=this.$route.params.id;
                    console.log(this.timeTableData);
                    this.program = res.data.timeTable[0];
                    this.loading = false;
                })
                .catch(err => err)
        },
        // *** Delete Entry In array
        delEntry: function (id) {
            this.timeTableData = this.timeTableData.filter(data => data.id != id);

        },
        // *** Edit Array
        editEntry: function (id) {
            let filterRow = this.timeTableData.filter(data => data.id == id);

            this.EditTimeTableData.id = filterRow[0].id,
                this.EditTimeTableData.day = filterRow[0].day,
                this.EditTimeTableData.teacher = filterRow[0].teacher,
                this.EditTimeTableData.subject_id = filterRow[0].course_id,
                this.EditTimeTableData.subject_name = filterRow[0].course.course_title,
                this.EditTimeTableData.startingTime = filterRow[0].startingTime,
                this.EditTimeTableData.endingTime = filterRow[0].endingTime,
                this.EditTimeTableData.classRoom_name = filterRow[0].class_room.class_room,
                this.EditTimeTableData.classRoom_id = filterRow[0].class_room_id,
                this.EditTimeTableData.time_table_id=this.time_table_id
                this.updateBtn = true;
            this.$store.dispatch('CreateTimeTableModal')
        },
        //  Genrate Randam string Fun
        randStr(len) {
            let text = ""
            let chars = "abcdefghijklmnopqrstuvwxyz"
            for (let i = 0; i < len; i++) {
                text += chars.charAt(Math.floor(Math.random() * chars.length))
            }
            return text + new Date().getTime();
        }
    },
    // Reactive Property
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(JSON.parse(localStorage.getItem("adminLogin")), "ums");
        },
        // *** Filter Monday Data in Root Array
        mondaySchedule: function () {
            return this.timeTableData.filter(data => data.day == "Monday");
        },
        // *** Filter Tuesday Data in Root Array
        tuesdaySchedule: function () {
            return this.timeTableData.filter(data => data.day == 'Tuesday');
        },
        // *** Filter Wednesday Data in Root Array
        wednesdaySchedule: function () {
            return this.timeTableData.filter(data => data.day == 'Wednesday');
        },
        // *** Filter Thursday Data in Root Array
        thursdaySchedule: function () {
            return this.timeTableData.filter(data => data.day == 'Thursday');
        },
        // *** Filter Friday Data in Root Array
        fridaySchedule: function () {
            return this.timeTableData.filter(data => data.day == 'Friday');
        },
        // *** Filter Saturday Data in Root Array
        saturdaySchedule: function () {
            return this.timeTableData.filter(data => data.day == 'Saturday');
        },
        // *** Filter Sunday Data in Root Array
        sundaySchedule: function () {
            return this.timeTableData.filter(data => data.day == 'Sunday');
        }
    },
}
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

.back-btn {
    margin: 15px 15px;
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

.save-btn {
    margin: 15px auto;
    display: table;
}
</style>
