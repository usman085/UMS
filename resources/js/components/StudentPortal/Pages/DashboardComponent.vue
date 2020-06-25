<template>
    <div>
        <!-- Component Render-->
        <v-row>
            <DashBoardHead
                blockHeading="Assignment"
                icon="mdi-tooltip-edit"
                link="Assignment"
                url="/student-portal/Assignments"
            ></DashBoardHead>
            <DashBoardHead
                blockHeading="Class Routine"
                icon="mdi-calendar-text"
                link="Schedual"
                url="/student-portal/Class-Routine"
            ></DashBoardHead>
            <DashBoardHead
                blockHeading="Attendance"
                icon="mdi-account-check"
                link="Attendance Sheet"
                url="/student-portal/Attendance-Sheet"
            ></DashBoardHead>

            <line-chart 
                class="mt-4"
                :data="{
                    '2017-05-13': 0,
                    '2017-05-10': 1,
                    '2017-05-9': 2,
                    '2017-05-8': 2,
                    '2017-05-1': 1,
                    '2017-05-4': 4,
                    '2017-05-5': 1,
                    '2017-05-2': 1
                }"
            ></line-chart>

            <!-- Component Render-->
        </v-row>
    </div>
</template>

<script>
import DashBoardHead from "../PartialsComponent/DashBoardHead";
export default {
    name: "StudentDashboard",
    components: { DashBoardHead }
};
</script>

<style scoped></style>
