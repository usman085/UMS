<template>
<div>
    <v-card>
        <v-card-title>
            <span class="back-btn">
                <v-icon @click="$router.push({name:'ExamRoutineBlock'})">mdi-arrow-left</v-icon>
            </span>
            Exam Schedule</v-card-title>
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

                <!-- <div v-if="examSchedule.length > 0"> -->
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
                                <tr v-for="schedule in examSchedule" :key="schedule.id">
                                    <td class="text-center title">
                                        <span>{{ schedule.day }}</span>
                                    </td>
                                    <td class="text-center title">
                                        <span>{{ schedule.date }}</span>
                                    </td>
                                    <td class="text-center title">
                                        <span>{{ schedule.startingTime }}</span>
                                    </td>
                                    <td class="text-center title">
                                        <span>{{ schedule.endingTime }}</span>
                                    </td>
                                    <td class="text-center title">
                                        <span>{{ schedule.course.course_title }}</span>
                                    </td>
                                    <td class="text-center title">
                                        <span>{{ schedule.class_room.class_room }}</span>
                                    </td>

                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                </div>
                <!-- <div v-else>
                
                    <p>No Data!</p>
                </div> -->
            <!-- </div> -->

        </v-card-text>
    </v-card>
</div>
</template>

<script>
export default {
    name: "examRoutinePreview",
    data() {
        return {
            loading: true,
            examSchedule: [],
            program: null,
        };
    },
    computed: {
        //User Auth function authorizing Admin & use in Header
        userAuth: function () {
            return cryptoJSON.decrypt(JSON.parse(localStorage.getItem("adminLogin")),"ums");
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
            axios.post(process.env.MIX_APP_URL + "/get-exam-schedule", {'id': id,}, {headers: headers,})
                .then((response) => {
                    this.examSchedule = response.data.examSchedule[0].exam_routine_detail;
                    
                    this.program = response.data.examSchedule[0];
                    this.loading = false;
                })
                .catch((error) => {});
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

.v-data-table td {
    height: 50px;
}

@media only screen and (max-width: 700px) {
    .v-data-table td {
        min-width: 225px !important;
    }
}
</style>
