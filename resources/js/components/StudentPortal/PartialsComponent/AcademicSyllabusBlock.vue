<template>
<div>

    <v-card-text>
        <div class="text-center">
            <v-container>

                <v-row>
                    <v-col cols="12" xs="12" md="12">
                        <h3 class="semester-no">Semester 1st</h3>
                        <v-simple-table class="mt-5 elevation-2">

                            <template>
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr #</th>
                                        <th class="text-center ">Course Code</th>
                                        <th class="text-center ">Course Title</th>
                                        <th class="text-center ">Credit Hours</th>
                                        <th class="text-center ">Course Outline</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                        <tr v-for="(item ,index ) in course" :key="index">
  <template v-if="item.pivot.semester == 1">
                                            <td>{{ index+1 }}</td>
                                            <td class="text-center body-1">{{ item.course_code }}</td>
                                            <td class="text-center body-1">
                                                {{ item.course_title }}
                                            </td>
                                            <td class="text-center body-1">
                                                {{ item.credit_hours }}
                                            </td>
                                            <td class="text-center body-1 hover" @click="CourseOutlineModal(item)">
                                                <v-icon class="list-acnhor">mdi-eye</v-icon>
                                            </td>

                                    </template>
                                        </tr>
                                   
                                </tbody>

                            </template>

                        </v-simple-table>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" xs="12" md="12">
                        <h3 class="semester-no">Semester 2nd</h3>
                        <v-simple-table class="mt-5 elevation-2">

                            <template>
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr #</th>
                                        <th class="text-center ">Course Code</th>
                                        <th class="text-center ">Course Title</th>
                                        <th class="text-center ">Credit Hours</th>
                                        <th class="text-center ">Course Outline</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="(item ,index ) in course" :key="index">
                                        <template v-if="item.pivot.semester == 2">
                                            <td>{{ index+1 }}</td>
                                            <td class="text-center body-1">{{ item.course_code }}</td>
                                            <td class="text-center body-1">
                                                {{ item.course_title }}
                                            </td>
                                            <td class="text-center body-1">
                                                {{ item.credit_hours }}
                                            </td>
                                            <td class="text-center body-1 hover" @click="CourseOutlineModal(item)">
                                                <v-icon class="list-acnhor">mdi-eye</v-icon>
                                            </td>
                                        </template>
                                       
                                    </tr>

                                </tbody>
                            </template>

                        </v-simple-table>
                    </v-col>
                </v-row>

                <v-row>
                    <v-col cols="12" xs="12" md="12">
                        <h3 class="semester-no">Semester 3rd</h3>
                        <v-simple-table class="mt-5 elevation-2">

                            <template>
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr #</th>
                                        <th class="text-center ">Course Code</th>
                                        <th class="text-center ">Course Title</th>
                                        <th class="text-center ">Credit Hours</th>
                                        <th class="text-center ">Course Outline</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="(item ,index ) in course" :key="index">
                                        <template v-if="item.pivot.semester == 3">
                                            <td>{{ index+1 }}</td>
                                            <td class="text-center body-1">{{ item.course_code }}</td>
                                            <td class="text-center body-1">
                                                {{ item.course_title }}
                                            </td>
                                            <td class="text-center body-1">
                                                {{ item.credit_hours }}
                                            </td>
                                            <td class="text-center body-1 hover" @click="CourseOutlineModal(item)">
                                                <v-icon class="list-acnhor">mdi-eye</v-icon>
                                            </td>
                                        </template>
                                      
                                    </tr>

                                </tbody>
                            </template>

                        </v-simple-table>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" xs="12" md="12">
                        <h3 class="semester-no">Semester 4th</h3>
                        <v-simple-table class="mt-5 elevation-2">

                            <template>
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr #</th>
                                        <th class="text-center ">Course Code</th>
                                        <th class="text-center ">Course Title</th>
                                        <th class="text-center ">Credit Hours</th>
                                        <th class="text-center ">Course Outline</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="(item ,index ) in course" :key="index">
                                        <template v-if="item.pivot.semester == 4">
                                            <td>{{ index+1 }}</td>
                                            <td class="text-center body-1">{{ item.course_code }}</td>
                                            <td class="text-center body-1">
                                                {{ item.course_title }}
                                            </td>
                                            <td class="text-center body-1">
                                                {{ item.credit_hours }}
                                            </td>
                                            <td class="text-center body-1 hover" @click="CourseOutlineModal(item)">
                                                <v-icon class="list-acnhor">mdi-eye</v-icon>
                                            </td>
                                        </template>
                                      
                                    </tr>

                                </tbody>
                            </template>

                        </v-simple-table>
                    </v-col>
                </v-row>

                <v-row>
                    <v-col cols="12" xs="12" md="12">
                        <h3 class="semester-no">Semester 5th</h3>
                        <v-simple-table class="mt-5 elevation-2">

                            <template>
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr #</th>
                                        <th class="text-center ">Course Code</th>
                                        <th class="text-center ">Course Title</th>
                                        <th class="text-center ">Credit Hours</th>
                                        <th class="text-center ">Course Outline</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="(item ,index ) in course" :key="index">
                                        <template v-if="item.pivot.semester == 5">
                                            <td>{{ index+1 }}</td>
                                            <td class="text-center body-1">{{ item.course_code }}</td>
                                            <td class="text-center body-1">
                                                {{ item.course_title }}
                                            </td>
                                            <td class="text-center body-1">
                                                {{ item.credit_hours }}
                                            </td>
                                            <td class="text-center body-1 hover" @click="CourseOutlineModal(item)">
                                                <v-icon class="list-acnhor">mdi-eye</v-icon>
                                            </td>
                                        </template>
                                       
                                    </tr>

                                </tbody>
                            </template>

                        </v-simple-table>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" xs="12" md="12">
                        <h3 class="semester-no">Semester 6th</h3>
                        <v-simple-table class="mt-5 elevation-2">

                            <template>
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr #</th>
                                        <th class="text-center ">Course Code</th>
                                        <th class="text-center ">Course Title</th>
                                        <th class="text-center ">Credit Hours</th>
                                        <th class="text-center ">Course Outline</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="(item ,index ) in course" :key="index">
                                        <template v-if="item.pivot.semester == 6">
                                            <td>{{ index+1 }}</td>
                                            <td class="text-center body-1">{{ item.course_code }}</td>
                                            <td class="text-center body-1">
                                                {{ item.course_title }}
                                            </td>
                                            <td class="text-center body-1">
                                                {{ item.credit_hours }}
                                            </td>
                                            <td class="text-center body-1 hover" @click="CourseOutlineModal(item)">
                                                <v-icon class="list-acnhor">mdi-eye</v-icon>
                                            </td>
                                        </template>
                                      
                                    </tr>

                                </tbody>
                            </template>

                        </v-simple-table>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" xs="12" md="12">
                        <h3 class="semester-no">Semester 7th</h3>
                        <v-simple-table class="mt-5 elevation-2">

                            <template>
                                <thead>
                                    <tr>
                                        <th class="text-left">Sr #</th>
                                        <th class="text-center ">Course Code</th>
                                        <th class="text-center ">Course Title</th>
                                        <th class="text-center ">Credit Hours</th>
                                        <th class="text-center ">Course Outline</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="(item ,index ) in course" :key="index">
                                        <template v-if="item.pivot.semester == 7">
                                            <td>{{ index+1 }}</td>
                                            <td class="text-center body-1">{{ item.course_code }}</td>
                                            <td class="text-center body-1">
                                                {{ item.course_title }}
                                            </td>
                                            <td class="text-center body-1">
                                                {{ item.credit_hours }}
                                            </td>
                                            <td class="text-center body-1 hover" @click="CourseOutlineModal(item)">
                                                <v-icon class="list-acnhor">mdi-eye</v-icon>
                                            </td>
                                        </template>
                                        
                                    </tr>

                                </tbody>
                            </template>

                        </v-simple-table>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" xs="12" md="12">
                        <h3 class="semester-no">Semester 8th</h3>
                        <v-simple-table class="mt-5 elevation-2">

                            <template>
                                <thead>
                                    <tr>
                                        <th class="text-left">Sr #</th>
                                        <th class="text-center ">Course Code</th>
                                        <th class="text-center ">Course Title</th>
                                        <th class="text-center ">Credit Hours</th>
                                        <th class="text-center ">Course Outline</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="(item ,index ) in course" :key="index">
                                        <template v-if="item == 8">
                                            <td>{{ index+1 }}</td>
                                            <td class="text-center body-1">{{ item.course_code }}</td>
                                            <td class="text-center body-1">
                                                {{ item.course_title }}
                                            </td>
                                            <td class="text-center body-1">
                                                {{ item.credit_hours }}
                                            </td>
                                            <td class="text-center body-1 hover" @click="CourseOutlineModal(item)">
                                                <v-icon class="list-acnhor">mdi-eye</v-icon>
                                            </td>
                                        </template>
                                      
                                    </tr>

                                </tbody>
                            </template>

                        </v-simple-table>
                    </v-col>
                </v-row>
            </v-container>
        </div>
    </v-card-text>
    <v-card-text>

    </v-card-text>
    <pacer :message="'Loading.....'"></pacer>
    <!-- AssignmentDetailPage -->

    <CourseOutlinePage :outlineData="outlineData" :courseDetail="courseDetail"></CourseOutlinePage>

    <!-- AssignmentDetailPage -->
</div>
</template>

<script>
import pacer from '../../CommonGobalComponent/Pacer';
import TitleBlock from "../PartialsComponent/TitleBlock";
import CourseOutlinePage from "./CourseOutlinePage";
export default {
    name: "ClassRoutineBlock",
    components: {
        CourseOutlinePage,
        TitleBlock,
        pacer
    },
    data() {
        return {
            titleName: "Semester 1",
            subtitle: "Scheme of Studies",
            course: [],

            outlineData: "",
            courseDetail: "",
        };
    },
    methods: {
        CourseOutlineModal: function (item) {

            this.outlineData = item.courses_outline;
            this.courseDetail = item;

            this.$store.dispatch("CourseOutlinePageModalToggle");
        },

        getExamRoutine() {
            this.$store.dispatch('overlay');
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token,
            };
            // send request to Api Route
            axios.post(process.env.MIX_APP_URL + "/get-course-for-student", "", {
                    headers: headers,
                })
                .then(response => {
                    this.loading = false;
                    this.course = response.data.course.assigned_courses;
                    this.$store.dispatch('overlay');

                        console.log(this.course[0].pivot);
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

.hover {
    cursor: pointer;
}

@media screen and (max-width:770px) {
    .v-application .headline {
        font-size: 20px !important;
    }
}

tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, .05);
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

.theme--light.v-data-table tbody tr :hover>.delete-row-icon {
    display: block;
}

.hover {
    cursor: pointer;
}

.delete-row-icon {
    float: right;
    display: none;
}

.semester-no {
    margin-bottom: 10px;
}
</style>
