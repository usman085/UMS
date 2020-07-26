<template>
<div>
    <v-row justify="center">
        <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
            <v-card>
                <v-toolbar dark color="primary">
                    <!-- Close Model of Assign Course -->
                    <v-btn icon dark @click="$store.dispatch('AssignCoursesModalToggle')">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                    <v-toolbar-title>{{program.program_title}}</v-toolbar-title>
                    <v-spacer></v-spacer>

                </v-toolbar>
                <v-card-text>
                    <div class="text-center">
                        <v-container>
                            <v-card-title text-center></v-card-title>
                            <v-row>
                                <v-col cols="12" xs="12" md="12">
                                    <h3 class="semester-no">Semester 1st</h3>
                                    <v-simple-table>
                                        <template v-slot:default>
                                            <thead>
                                                <tr>
                                                    <th class="text-left">Sr #</th>
                                                    <th class="text-left">Course Code</th>
                                                    <th class="text-left">Course Title</th>
                                                    <th class="text-left">Credit Hours</th>
                                                    <th class="text-left">Course outline </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-if="AssignCourses.semester1.length > 0">
                                                    <tr v-for="(item,index) in AssignCourses.semester1" :key="item.id">
                                                        <td>{{ index+1 }}</td>
                                                        <td>{{item.course_code}}</td>
                                                        <td>{{item.course_title}}</td>
                                                        <td>{{item.credit_hours}}</td>
                                                        <td>
                                                            <v-chip v-if="!item.course_outline" text-color="white" color="red">
                                                                <span>No Avaiable</span>
                                                            </v-chip>
                                                            <v-chip v-else color="primary" text-color="white">
                                                                <span>Avaiable</span>
                                                            </v-chip>
                                                            <span class="delete-row-icon">
                                                                <v-icon @click="delAssignCourse(item.pivot.id)">mdi-delete</v-icon>
                                                            </span>

                                                        </td>
                                                    </tr>
                                                </template>
                                                <template v-else>
                                                    <td colspan="5" class="text-center"><span>No Courses Assign</span></td>
                                                </template>
                                            </tbody>
                                        </template>
                                    </v-simple-table>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="12" xs="12" md="12">
                                    <h3 class="semester-no">Semester 2nd</h3>
                                    <v-simple-table>
                                        <template v-slot:default>
                                            <thead>
                                                <tr>
                                                    <th class="text-left">Sr #</th>
                                                    <th class="text-left">Course Code</th>
                                                    <th class="text-left">Course Title</th>
                                                    <th class="text-left">Credit Hours</th>
                                                    <th class="text-left">Course outline </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-if="AssignCourses.semester2.length > 0">
                                                    <tr v-for="(item,index) in AssignCourses.semester2" :key="item.id">
                                                        <td>{{ index+1 }}</td>
                                                        <td>{{item.course_code}}</td>
                                                        <td>{{item.course_title}}</td>
                                                        <td>{{item.credit_hours}}</td>
                                                        <td>
                                                            <v-chip v-if="!item.course_outline" text-color="white" color="red">
                                                                <span>No Avaiable</span>
                                                            </v-chip>
                                                            <v-chip v-else color="primary" text-color="white">
                                                                <span>Avaiable</span>
                                                            </v-chip>
                                                            <span class="delete-row-icon">
                                                                <v-icon @click="delAssignCourse(item.pivot.id)">mdi-delete</v-icon>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </template>
                                                <template v-else>
                                                    <td colspan="5" class="text-center"><span>No Courses Assign</span></td>
                                                </template>
                                            </tbody>
                                        </template>
                                    </v-simple-table>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="12" xs="12" md="12">
                                    <h3 class="semester-no">Semester 3rd</h3>
                                    <v-simple-table>
                                        <template v-slot:default>
                                            <thead>
                                                <tr>
                                                    <th class="text-left">Sr #</th>
                                                    <th class="text-left">Course Code</th>
                                                    <th class="text-left">Course Title</th>
                                                    <th class="text-left">Credit Hours</th>
                                                    <th class="text-left">Course outline </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-if="AssignCourses.semester3.length > 0">
                                                    <tr v-for="(item,index) in AssignCourses.semester3" :key="item.id">
                                                        <td>{{ index+1 }}</td>
                                                        <td>{{item.course_code}}</td>
                                                        <td>{{item.course_title}}</td>
                                                        <td>{{item.credit_hours}}</td>
                                                        <td>
                                                            <v-chip v-if="!item.course_outline" text-color="white" color="red">
                                                                <span>No Avaiable</span>
                                                            </v-chip>
                                                            <v-chip v-else color="primary" text-color="white">
                                                                <span>Avaiable</span>
                                                            </v-chip>
                                                            <span class="delete-row-icon">
                                                                <v-icon @click="delAssignCourse(item.pivot.id)">mdi-delete</v-icon>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </template>
                                                <template v-else>
                                                    <td colspan="5" class="text-center"><span>No Courses Assign</span></td>
                                                </template>
                                            </tbody>
                                        </template>
                                    </v-simple-table>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="12" xs="12" md="12">
                                    <h3 class="semester-no">Semester 4th</h3>
                                    <v-simple-table>
                                        <template v-slot:default>
                                            <thead>
                                                <tr>
                                                    <th class="text-left">Sr #</th>
                                                    <th class="text-left">Course Code</th>
                                                    <th class="text-left">Course Title</th>
                                                    <th class="text-left">Credit Hours</th>
                                                    <th class="text-left">Course outline </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-if="!AssignCourses.semester4.length > 0">
                                                    <tr v-for="(item,index) in AssignCourses.semester4" :key="item.id">
                                                        <td>{{ index+1 }}</td>
                                                        <td>{{item.course_code}}</td>
                                                        <td>{{item.course_title}}</td>
                                                        <td>{{item.credit_hours}}</td>
                                                        <td>
                                                            <v-chip v-if="item.course_outline" text-color="white" color="red">
                                                                <span>No Avaiable</span>
                                                            </v-chip>
                                                            <v-chip v-else color="primary" text-color="white">
                                                                <span>Avaiable</span>
                                                            </v-chip>
                                                            <span class="delete-row-icon">
                                                                <v-icon @click="delAssignCourse(item.pivot.id)">mdi-delete</v-icon>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </template>
                                                <template v-else>
                                                    <td colspan="5" class="text-center"><span>No Courses Assign</span></td>
                                                </template>
                                            </tbody>
                                        </template>
                                    </v-simple-table>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="12" xs="12" md="12">
                                    <h3 class="semester-no">Semester 5th</h3>
                                    <v-simple-table>
                                        <template v-slot:default>
                                            <thead>
                                                <tr>
                                                    <th class="text-left">Sr #</th>
                                                    <th class="text-left">Course Code</th>
                                                    <th class="text-left">Course Title</th>
                                                    <th class="text-left">Credit Hours</th>
                                                    <th class="text-left">Course outline </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-if="AssignCourses.semester5.length > 0">
                                                    <tr v-for="(item,index) in AssignCourses.semester5" :key="item.id">
                                                        <td>{{ index+1 }}</td>
                                                        <td>{{item.course_code}}</td>
                                                        <td>{{item.course_title}}</td>
                                                        <td>{{item.credit_hours}}</td>
                                                        <td>
                                                            <v-chip v-if="!item.course_outline" text-color="white" color="red">
                                                                <span>No Avaiable</span>
                                                            </v-chip>
                                                            <v-chip v-else color="primary" text-color="white">
                                                                <span>Avaiable</span>
                                                            </v-chip>
                                                            <span class="delete-row-icon">
                                                                <v-icon @click="delAssignCourse(item.pivot.id)">mdi-delete</v-icon>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </template>
                                                <template v-else>
                                                    <td colspan="5" class="text-center"><span>No Courses Assign</span></td>
                                                </template>
                                            </tbody>
                                        </template>
                                    </v-simple-table>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="12" xs="12" md="12">
                                    <h3 class="semester-no">Semester 6th</h3>
                                    <v-simple-table>
                                        <template v-slot:default>
                                            <thead>
                                                <tr>
                                                    <th class="text-left">Sr #</th>
                                                    <th class="text-left">Course Code</th>
                                                    <th class="text-left">Course Title</th>
                                                    <th class="text-left">Credit Hours</th>
                                                    <th class="text-left">Course outline </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-if="AssignCourses.semester6.length > 0">
                                                    <tr v-for="(item,index) in AssignCourses.semester6" :key="item.id">
                                                        <td>{{ index+1 }}</td>
                                                        <td>{{item.course_code}}</td>
                                                        <td>{{item.course_title}}</td>
                                                        <td>{{item.credit_hours}}</td>
                                                        <td>
                                                            <v-chip v-if="!item.course_outline" text-color="white" color="red">
                                                                <span>No Avaiable</span>
                                                            </v-chip>
                                                            <v-chip v-else color="primary" text-color="white">
                                                                <span>Avaiable</span>
                                                            </v-chip>
                                                            <span class="delete-row-icon">
                                                                <v-icon @click="delAssignCourse(item.pivot.id)">mdi-delete</v-icon>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </template>
                                                <template v-else>
                                                    <td colspan="5" class="text-center"><span>No Courses Assign</span></td>
                                                </template>
                                            </tbody>
                                        </template>
                                    </v-simple-table>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="12" xs="12" md="12">
                                    <h3 class="semester-no">Semester 7th</h3>
                                    <v-simple-table>
                                        <template v-slot:default>
                                            <thead>
                                                <tr>
                                                    <th class="text-left">Sr #</th>
                                                    <th class="text-left">Course Code</th>
                                                    <th class="text-left">Course Title</th>
                                                    <th class="text-left">Credit Hours</th>
                                                    <th class="text-left">Course outline </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-if="AssignCourses.semester7.length > 0">
                                                    <tr v-for="(item,index) in AssignCourses.semester7" :key="item.id">
                                                        <td>{{ index+1 }}</td>
                                                        <td>{{item.course_code}}</td>
                                                        <td>{{item.course_title}}</td>
                                                        <td>{{item.credit_hours}}</td>
                                                        <td>
                                                            <v-chip v-if="!item.course_outline" text-color="white" color="red">
                                                                <span>No Avaiable</span>
                                                            </v-chip>
                                                            <v-chip v-else color="primary" text-color="white">
                                                                <span>Avaiable</span>
                                                            </v-chip>
                                                            <span class="delete-row-icon">
                                                                <v-icon @click="delAssignCourse(item.pivot.id)">mdi-delete</v-icon>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </template>
                                                <template v-else>
                                                    <td colspan="5" class="text-center"><span>No Courses Assign</span></td>
                                                </template>
                                            </tbody>
                                        </template>
                                    </v-simple-table>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="12" xs="12" md="12">
                                    <h3 class="semester-no">Semester 8th</h3>
                                    <v-simple-table>
                                        <template v-slot:default>
                                            <thead>
                                                <tr>
                                                    <th class="text-left">Sr #</th>
                                                    <th class="text-left">Course Code</th>
                                                    <th class="text-left">Course Title</th>
                                                    <th class="text-left">Credit Hours</th>
                                                    <th class="text-left">Course outline </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-if="AssignCourses.semester8.length > 0">
                                                    <tr v-for="(item,index) in AssignCourses.semester8" :key="item.id">
                                                        <td>{{ index+1 }}</td>
                                                        <td>{{item.course_code}}</td>
                                                        <td>{{item.course_title}}</td>
                                                        <td>{{item.credit_hours}}</td>
                                                        <td>
                                                            <v-chip v-if="!item.course_outline" text-color="white" color="red">
                                                                <span>No Avaiable</span>
                                                            </v-chip>
                                                            <v-chip v-else color="primary" text-color="white">
                                                                <span>Avaiable</span>
                                                            </v-chip>
                                                            <span class="delete-row-icon">
                                                                <v-icon @click="delAssignCourse(item.pivot.id)">mdi-delete</v-icon>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </template>
                                                <template v-else>
                                                    <td colspan="5" class="text-center"><span>No Courses Assign</span></td>
                                                </template>
                                            </tbody>
                                        </template>
                                    </v-simple-table>
                                </v-col>
                            </v-row>

                        </v-container>
                    </div>
                </v-card-text>
                <v-divider></v-divider>
                <pacer :message="'Loading.....'"></pacer>
                <v-snackbar top right v-model="snackbar" color="success">
                    Delete SuccessFully
                    <template v-slot:action="{ attrs }">
                        <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">Close</v-btn>
                    </template>
                </v-snackbar>

            </v-card>
        </v-dialog>
    </v-row>
</div>
</template>

<script>
import pacer from '../../CommonGobalComponent/Pacer';
import EventBus from '../../../EventBus/eventBus';
export default {
    name: "AssignCoursesModal",
    props: ['AssignCourseData', 'program'],
    data() {
        return {
          snackbar:false
        };
    },
    components: {
        pacer
    },
    computed: {
        // AssignCourses Function use to Get Data of Program and Course 
        AssignCourses: function () {
            return {
                semester1: this.AssignCourseData.filter(item => '1' == item.pivot.semester),
                semester2: this.AssignCourseData.filter(item => '2' == item.pivot.semester),
                semester3: this.AssignCourseData.filter(item => '3' == item.pivot.semester),
                semester4: this.AssignCourseData.filter(item => '4' == item.pivot.semester),
                semester5: this.AssignCourseData.filter(item => '5' == item.pivot.semester),
                semester6: this.AssignCourseData.filter(item => '6' == item.pivot.semester),
                semester7: this.AssignCourseData.filter(item => '7' == item.pivot.semester),
                semester8: this.AssignCourseData.filter(item => '8' == item.pivot.semester),
            }
        },
        dialog: function () {
            return this.$store.state.AssignCoursesModal;
        },
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("adminLogin")),
                "ums"
            );
        }
    },
    methods: {
        delAssignCourse: function (id) {
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            axios.post(process.env.MIX_APP_URL + '/del-assign-course', {'id': id}, {headers: headers})
                .then((res) => {
                    this.snackbar=true;
                    EventBus.$emit('loadAssignCourse',this.program.id);
                })
                .catch((err) => {})
        }
    }
};
</script>

<style scoped>
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

@media screen and (max-width:770px) {
    .v-application .headline {
        font-size: 20px !important;
    }
}
</style>
