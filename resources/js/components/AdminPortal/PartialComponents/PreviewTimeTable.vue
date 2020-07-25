<template>
<div>
    <v-card>
        <v-card-title>
            <span class="back-btn">
                <v-icon @click="$router.push({name:'AllTimeTable'})">mdi-arrow-left</v-icon>
            </span>
            Time Table</v-card-title>
        <v-card-subtitle>
            <span v-if="program == null">
                <v-progress-linear indeterminate color="cyan"></v-progress-linear>
            </span>
            <span v-else> {{program.program.program_title}} - Semester {{ program.semester | numberToNth }} </span>
        </v-card-subtitle>
        <v-divider></v-divider>
        <v-card-text>
            <div v-if="loading" class="text-center">
                <v-progress-circular indeterminate :size="50" color="primary"></v-progress-circular>
            </div>
            <div v-else>
               
                <div v-if="items.length > 0">
                <v-simple-table  class="mt-5 elevation-2">
                <template>
                    <thead>
                        <tr>
                            <th colspan="4">Class Routine Day By Day</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="day">Monday</td>

                            <td v-for="(timeTable, index) in mondaySchdule" :key="index">
                                <span class="class-room">{{
                            timeTable.class_room.class_room | capitalize
                        }}</span>
                                <span class="class-time">{{
                            timeTable.startingTime +'-' +timeTable.endingTime | capitalize
                        }}</span>
                                <br />
                                <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                                <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="day">Tuesday</td>

                            <td v-for="(timeTable, index) in tuesdaySchdule" :key="index">
                                <span class="class-room">{{
                            timeTable.class_room.class_room | capitalize
                        }}</span>
                                <span class="class-time">{{
                            timeTable.startingTime +'-' +timeTable.endingTime | capitalize
                        }}</span>
                                <br />
                                <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                                <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="day">Wednesday</td>

                            <td v-for="(timeTable, index) in wednesdaySchdule" :key="index">
                                <span class="class-room">{{
                            timeTable.class_room.class_room | capitalize
                        }}</span>
                                <span class="class-time">{{
                            timeTable.startingTime +'-' +timeTable.endingTime | capitalize
                        }}</span>
                                <br />
                                <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                                <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="day">Thrusday</td>

                            <td v-for="(timeTable, index) in thrusdaySchdule" :key="index">
                                <span class="class-room">{{
                            timeTable.class_room.class_room | capitalize
                        }}</span>
                                <span class="class-time">{{
                            timeTable.startingTime +'-' +timeTable.endingTime | capitalize
                        }}</span>
                                <br />
                                <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                                <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="day">Friday</td>

                            <td v-for="(timeTable, index) in thrusdaySchdule" :key="index">
                                <span class="class-room">{{
                            timeTable.class_room.class_room | capitalize
                        }}</span>
                                <span class="class-time">{{
                            timeTable.startingTime +'-' +timeTable.endingTime | capitalize
                        }}</span>
                                <br />
                                <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                                <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="day">Saturday</td>

                            <td v-for="(timeTable, index) in saturdaySchdule" :key="index">
                                <span class="class-room">{{
                            timeTable.class_room.class_room | capitalize
                        }}</span>
                                <span class="class-time">{{
                            timeTable.startingTime +'-' +timeTable.endingTime | capitalize
                        }}</span>
                                <br />
                                <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                                <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                            </td>
                        </tr>
                    </tbody>
                </template>
               </v-simple-table>
               </div>
                <div v-else>
                    <p>Noting to Show</p>
                </div>
            </div>
          
        </v-card-text>
    </v-card>
</div>
</template>

<script>
export default {
    name: "PreviewTimeTable",
    created() {
        this.getTImeTableData(this.$route.params.id);
    },
    data() {
        return {
            loading: true,
            items: [],
            program: null
        };
    },
    methods: {
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
                    console.log(res);
                    this.items = res.data.timeTable[0].time_table_detail;
                    this.program = res.data.timeTable[0];
                    this.loading = false;
                })
                .catch(err => err)
        }
    },
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(JSON.parse(localStorage.getItem("adminLogin")), "ums");
        },
        mondaySchdule: function () {
            return this.items.filter(
                data => data.day == "Monday"
            );
        },
        tuesdaySchdule: function () {
            return this.items.filter(
                data => data.day == "Tuesday"
            );
        },
        wednesdaySchdule: function () {
            return this.items.filter(
                data => data.day == "Wednesday"
            );
        },
        thrusdaySchdule: function () {
            return this.items.filter(
                data => data.day == "Thrusday"
            );
        },
        fridaySchdule: function () {
            return this.items.filter(
                data => data.day == "Friday"
            );
        },
        saturdaySchdule: function () {
            return this.items.filter(
                data => data.day == "Saturday"
            );
        },
        sundaySchdule: function () {
            return this.items.filter(
                data => data.day == "Sunday"
            );
        }
    }
};
</script>

<style scoped>
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
}

.teacher-name {
    font-size: 18px;
    display: table;
    margin: 0 auto;
}

.subject-name {
    text-align: left;
}

.back-btn {
    padding: 0 5px;
}

@media only screen and (max-width:700px) {
    .v-data-table td {
        min-width: 200px !important;
    }
}
</style>
