<template>
<div class="create-time-table-wrapper">
    <v-card>
        <span text-align="left" class="back-btn">
            <v-icon @click="$router.push('all-time-table')">mdi-arrow-left</v-icon>
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
                    <!-- Monday Rendering -->
                    <tr>
                        <td class="day">Monday</td>
                        <td v-for="(timeTable,index) in mondaySchedule" :key="index">
                            <span class="class-room">{{ timeTable.classRoom | capitalize  }}</span>
                            <span class="class-time">{{ timeTable.startingtime+'-'+timeTable.endingTime | capitalize  }}</span>
                            <br>
                            <span class="teacher-name text-center">{{ timeTable.subject | capitalize  }}<br></span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize  }})</span>
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
                            <span class="class-room">{{ timeTable.classRoom | capitalize  }}</span>
                            <span class="class-time">{{ timeTable.startingtime+'-'+timeTable.endingTime | capitalize  }}</span>
                            <br>
                            <span class="teacher-name text-center">{{ timeTable.subject | capitalize  }}<br></span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize  }})</span>
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
                            <span class="class-room">{{ timeTable.classRoom | capitalize  }}</span>
                            <span class="class-time">{{ timeTable.startingtime+'-'+timeTable.endingTime | capitalize  }}</span>
                            <br>
                            <span class="teacher-name text-center">{{ timeTable.subject | capitalize  }}<br></span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize  }})</span>
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
                            <span class="class-room">{{ timeTable.classRoom | capitalize  }}</span>
                            <span class="class-time">{{ timeTable.startingtime+'-'+timeTable.endingTime | capitalize  }}</span>
                            <br>
                            <span class="teacher-name text-center">{{ timeTable.subject | capitalize  }}<br></span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize  }})</span>
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
                            <span class="class-room">{{ timeTable.classRoom | capitalize  }}</span>
                            <span class="class-time">{{ timeTable.startingtime+'-'+timeTable.endingTime | capitalize  }}</span>
                            <br>
                            <span class="teacher-name text-center">{{ timeTable.subject | capitalize  }}<br></span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize  }})</span>
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
                            <span class="class-room">{{ timeTable.classRoom | capitalize  }}</span>
                            <span class="class-time">{{ timeTable.startingtime+'-'+timeTable.endingTime   }}</span>
                            <br>
                            <span class="teacher-name text-center">{{ timeTable.subject | capitalize  }}<br></span>
                            <span class="subject-name">({{ timeTable.teacher | capitalize  }})</span>
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
            <v-btn class="text-center save-btn" color="primary">Update Time Table</v-btn>
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
        // *** Update Array
        EventBus.$on('updateTimeTableData', (data) => {
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
                subject: data.subject,
                startingtime: data.startingtime,
                endingTime: data.endingTime,
                classRoom: data.classRoom
            });

        });
    },
    // *** Data Object
    data: function () {
        return {
            timeTableData: [{
                    id: 1,
                    day: "Monday",
                    teacher: "usman",
                    subject: "Eng",
                    startingtime: "10:00",
                    endingTime: "11:00",
                    classRoom: "cr3"
                },
                {
                    id: 2,
                    day: "Monday",
                    teacher: "mehreen",
                    subject: "Math",
                    startingtime: "10:00",
                    endingTime: "11:00",
                    classRoom: "cr3"
                },
                {
                    id: 3,
                    day: "Monday",
                    teacher: "Ijaz",
                    subject: "OOP",
                    startingtime: "10:00",
                    endingTime: "11:00",
                    classRoom: "cr4"
                },
                {
                    id: 4,
                    day: "Tuesday",
                    teacher: "usman",
                    subject: "English",
                    startingtime: "10:00",
                    endingTime: "11:00",
                    classRoom: "cr3"
                },
                {
                    id: 5,
                    day: "Tuesday",
                    teacher: "test",
                    subject: "English",
                    startingtime: "10:00",
                    endingTime: "11:00",
                    classRoom: "cr3"
                },
                {
                    id: 6,
                    day: "Tuesday",
                    teacher: "usman",
                    subject: "urdu",
                    startingtime: "10:00",
                    endingTime: "11:00",
                    classRoom: "cr3"
                },
                {
                    id: 7,
                    day: "Saturday",
                    teacher: "test",
                    subject: "English",
                    startingtime: "10:00",
                    endingTime: "11:00",
                    classRoom: "cr3"
                },
                {
                    id: 8,
                    day: "Saturday",
                    teacher: "test",
                    subject: "Letrature",
                    startingtime: "10:00",
                    endingTime: "11:00",
                    classRoom: "cr8"
                },
                {
                    id: 8,
                    day: "Saturday",
                    teacher: "Aslam",
                    subject: "English",
                    startingtime: "10:00",
                    endingTime: "11:00",
                    classRoom: "cr3"
                },
                {
                    id: 10,
                    day: "Wednesday",
                    teacher: "usman",
                    subject: "English",
                    startingtime: "10:00",
                    endingTime: "11:00",
                    classRoom: "cr3"
                },
                {
                    id: 11,
                    day: "Wednesday",
                    teacher: "Amjad",
                    subject: "Islamiyat",
                    startingtime: "10:00",
                    endingTime: "11:00",
                    classRoom: "cr2"
                },
                {
                    id: 12,
                    day: "Wednesday",
                    teacher: "Amjad",
                    subject: "Islamiyat",
                    startingtime: "10:00",
                    endingTime: "11:00",
                    classRoom: "cr2"
                },
                {
                    id: 13,
                    day: "Thrusday",
                    teacher: "usman",
                    subject: "English",
                    startingtime: "10:00",
                    endingTime: "11:00",
                    classRoom: "cr3"
                },
                {
                    id: 14,
                    day: "Friday",
                    teacher: "usman",
                    subject: "English",
                    startingtime: "10:00",
                    endingTime: "11:00",
                    classRoom: "cr3"
                },

                {
                    id: 15,
                    day: "Sunday",
                    teacher: "usman",
                    subject: "English",
                    startingtime: "10:00",
                    endingTime: "11:00",
                    classRoom: "cr3"
                },

            ],
            updateBtn: false, //props for modal buttons
            // ***Edit Time Array use as a props
            EditTimeTableData: [{
                id: '',
                day: '',
                teacher: '',
                subject: '',
                startingtime: '',
                endingTime: '',
                classRoom: '',
            }],
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
        // *** Delete Entry In array
        delEntry: function (id) {
            this.timeTableData = this.timeTableData.filter(data => data.id != id);

        },
        // *** Edit Array
        editEntry: function (id) {
            this.EditTimeTableData = this.timeTableData.filter(data => data.id == id);
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
