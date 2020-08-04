<template>
<v-simple-table class="mt-5 elevation-2" >
    <template  v-slot:default>
        <div v-if="examSchedule.length > 0">
        <thead>
            <tr>
                <th class="text-center headline">Date</th>
                <th class="text-center headline">Starting Time</th>
                <th class="text-center headline">Ending Time</th>
                <th class="text-center headline">Subject</th>
                <th class="text-center headline">Room</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in examSchedule" :key="item.name">
                <td class="text-center title">
                    <span>{{ item.day }} {{ item.date }}</span>
                </td>
                <td class="text-center title">{{ item.startingTime }}</td>
                <td class="text-center title">{{ item.endingTime }}</td>
                <td class="text-center title">{{ item.course.course_title }}</td>
                <td class="text-center title">{{ item.class_room.class_room }}</td>
            </tr>
        </tbody>
        </div>
    
    <div v-else class="mt-5 ">
        <div v-if="!loading" class="text-center loading">
            No Exam Routine Found 😟 !
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
    data() {
        return {
            examSchedule: [],
            loading: true
        };
    },
    methods: {

    getExamRoutine() {
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token,
            };
            // send request to Api Route
            axios.post(process.env.MIX_APP_URL + "/get-student-exam-routine", "", {
                    headers: headers,
                })
                .then(response => {
                    this.loading = false;
                    this.examSchedule = response.data.examSchedule.exam_routine_detail;
                   
                })
                .catch((error) => {});
        },
    },
    mounted() {
        this.getExamRoutine();
    },
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("studentLogin")),
                "ums"
            );
        },
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
