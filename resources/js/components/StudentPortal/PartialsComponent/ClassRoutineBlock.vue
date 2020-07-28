<template>
<v-simple-table class="mt-5 elevation-2">
    <template>
        <thead>
            <tr>
                <th colspan="4">Class Routine Day By Day</th>
            </tr>
        </thead>
        <tbody v-if="items.length>0">
            <tr>
                <td class="day">Monday</td>

                <td v-for="(timeTable, index) in mondaySchdule" :key="index">
                    <span class="class-room">{{timeTable.class_room.class_room | capitalize}}</span>
                    <span class="class-time">{{ timeTable.startingTime+ '-'+timeTable.endingTime | capitalize}}</span>
                    <br />
                    <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                    <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                </td>
            </tr>

            <tr>
                <td class="day">Tuesday</td>

                <td v-for="(timeTable, index) in tuesdaySchdule" :key="index">
                    <span class="class-room">{{timeTable.class_room.class_room | capitalize}}</span>
                    <span class="class-time">{{ timeTable.startingTime+ '-'+timeTable.endingTime | capitalize}}</span>
                    <br />
                    <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                    <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                </td>
            </tr>

            <tr>
                <td class="day">Wednesday</td>

                <td v-for="(timeTable, index) in wednesdaySchdule" :key="index">
                     <span class="class-room">{{timeTable.class_room.class_room | capitalize}}</span>
                    <span class="class-time">{{ timeTable.startingTime+ '-'+timeTable.endingTime | capitalize}}</span>
                    <br />
                    <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                    <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                </td>
            </tr>

            <tr>
                <td class="day">Thrusday</td>

                <td v-for="(timeTable, index) in thrusdaySchdule" :key="index">
                     <span class="class-room">{{timeTable.class_room.class_room | capitalize}}</span>
                    <span class="class-time">{{ timeTable.startingTime+ '-'+timeTable.endingTime | capitalize}}</span>
                    <br />
                    <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                    <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                </td>
            </tr>

            <tr>
                <td class="day">Friday</td>

                <td v-for="(timeTable, index) in fridaySchdule" :key="index">
                     <span class="class-room">{{timeTable.class_room.class_room | capitalize}}</span>
                    <span class="class-time">{{ timeTable.startingTime+ '-'+timeTable.endingTime | capitalize}}</span>
                    <br />
                    <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                    <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                </td>
            </tr>

            <tr>
                <td class="day">Saturday</td>

                <td v-for="(timeTable, index) in saturdaySchdule" :key="index">
                    <span class="class-room">{{timeTable.class_room.class_room | capitalize}}</span>
                    <span class="class-time">{{ timeTable.startingTime+ '-'+timeTable.endingTime | capitalize}}</span>
                    <br />
                    <span class="teacher-name text-center">{{ timeTable.course.course_title | capitalize }}<br /></span>
                    <span class="subject-name">({{ timeTable.teacher | capitalize }})</span>
                </td>
            </tr>
        </tbody>
        <div v-else>
            <div v-if="!loading" class="text-center loading">
                    No Class Routine Found 😟 !
            </div>
            <div v-else class="text-center loading">
                <v-progress-circular indeterminate color="primary" size="50"></v-progress-circular>
                <p>Loading....</p>
            </div>
        </div>
    </template>
</v-simple-table>
</template>

<script>
export default {
    name: "ClassRoutineBlock",
    data() {
        return {
           items:[],
           loading:true
        };
    },
    mounted(){
        this.getClassRouitne();
    },
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("studentLogin")),
                "ums"
            );
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
                data => data.day == "Thursday"
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
    },
    methods:{
        getClassRouitne:function(){
             // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            
            axios.post(process.env.MIX_APP_URL+"/get-student-class-routine",'',{headers:headers})
                .then(res=>{
                   this.loading=false;
                    this.items = res.data.timeTable.time_table_detail;
                     
                }).catch(err=>{})
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
.loading{
    margin: 20px 0;
}

@media only screen and (max-width:700px) {
    .v-data-table td {
        min-width: 200px !important;
    }
}
</style>
