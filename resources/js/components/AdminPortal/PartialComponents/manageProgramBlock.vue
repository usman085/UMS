<template>
<div class="time-table-wrapper">
    <v-card max-width="96%">
        <v-card-title>
            Manage Programs
            <v-btn class="create-btn" @click="$store.dispatch('AddProgramModalToggle')">
                <v-icon>mdi-plus-circle</v-icon>Add New Program
            </v-btn>
        </v-card-title>
        <v-card-subtitle>All Programs are manage here.</v-card-subtitle>
        <v-card-text>
            <v-simple-table>
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">Program Title</th>
                            <th class="text-left">Short Name</th>
                            <th class="text-left">No of Semesters</th>
                            <th class="text-left">Duration</th>

                            <th class="text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-if=" $store.state.allProgram.length > 0">
                            <tr v-for="item in $store.state.allProgram " :key="item.id">
                                <td>{{ item.program_title | capitalize }}</td>
                                <td>{{ item.program_short_title.toUpperCase()}}</td>
                                <td>{{ item.no_of_semester }}</td>

                                <td>{{ item.program_duration + ' Year' }}</td>
                                <td>
                                    <v-menu offset-y>
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-icon color="primary" v-bind="attrs" v-on="on">mdi-dots-vertical</v-icon>
                                        </template>
                                        <v-list>
                                            <v-list-item @click="editProgram(item.id)">
                                                <v-list-item-title>Modify</v-list-item-title>
                                            </v-list-item>
                                            <v-list-item @click="deleteItem(item.id)">
                                                <v-list-item-title>Delete</v-list-item-title>
                                            </v-list-item>
                                            <v-list-item @click="addCourseModal(item)">
                                                <v-list-item-title>
                                                    <v-icon color="primary">mdi-plus</v-icon>Add Course
                                                </v-list-item-title>
                                            </v-list-item>
                                            <v-list-item>
                                                <v-btn small color="primary" class="create-btn pa-1" @click="assigedCourses(item)">Assigned Course</v-btn>
                                            </v-list-item>
                                        </v-list>
                                    </v-menu>
                                </td>
                            </tr>
                        </template>
                        <template v-else>
                            <tr>
                                <td colspan="4" class="text-center">
                                    <template v-if="message">
                                        <v-progress-circular indeterminate color="primary"></v-progress-circular>
                                    </template>
                                    <template v-else>No Data Found!</template>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </template>
            </v-simple-table>
        </v-card-text>
        <v-snackbar top right v-model="snackbar" color="success">
            {{succesMessage}}
            <template v-slot:action="{ attrs }">
                <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">Close</v-btn>
            </template>
        </v-snackbar>
    </v-card>

    <!-- Assign Courses Model -->
    <AssignCoursesModal :program="program_title_props" :AssignCourseData="AssignCourseData"></AssignCoursesModal>

    <!-- Course Assign Model  -->
    <CourseAssignToProgramModal :programDetail="programDetail"></CourseAssignToProgramModal>

    <!-- Add Program Model -->
    <AddProgramModal :editData="editRow" :editRowMessage="editRowMessage"></AddProgramModal>
</div>
</template>

<script>
// *** Importing Event Bus
import EventBus from "../../../EventBus/eventBus";

// *** Importing AssignCoursesModel
import AssignCoursesModal from "./AssignCoursesModal";

// *** Importing AddProgramModel
import AddProgramModal from "./AddProgramModal";

// *** Importing CourseAssignModel
import CourseAssignToProgramModal from './CourseAssignToProgramModal';

export default {
    name: "manageProgramblock",

    data() {
        return {
            allProgram:null,
            message: true,
            AssignCourseData: [],
            succesMessage: "",
            snackbar: false,
            editRowMessage: false,
            program_title_props: '',
            allProgram: [],
            editRow: {
                id: "",
                program_title: "",
                program_short_title: "",
                program_duration: "",
                no_of_semester: ""
            },
            programDetail: {
                id: '',
                program_title: '',
                program_duration: '',
                no_of_semester: '',
                program_short_title: ''
            }
        };
    },
    components: {
        AddProgramModal,
        AssignCoursesModal,
        CourseAssignToProgramModal
    },

    methods: {
        // assigedCourses function use to assign course to program
        assigedCourses: function (item) {
            this.program_title_props = item;
            this.$store.dispatch('overlay');

            this.$store.dispatch('AssignCoursesModalToggle');
            let headers = {
                'Content-type': 'application/json',
                'Authorization': "Bearer  " + this.userAuth.token
            }
            axios.post(process.env.MIX_APP_URL + '/assign-courses', {
                    'id': item.id
                }, {
                    headers: headers
                })
                .then(res => {
                    this.AssignCourseData = res.data;
                    this.$store.dispatch('overlay');

                })
                .catch(error => {

                });

        },
        addCourseModal: function (program) {
            this.programDetail = program;

            this.$store.dispatch('CourseAssignModal');
        },

        // **editProgram Function Is use to edit the Desired Program
        editProgram: function (id) {
            let editData = this.$store.state.allProgram.filter(item => item.id == id);
            this.editRow.id = editData[0].id;
            this.editRow.program_title = editData[0].program_title;
            this.editRow.program_short_title = editData[0].program_short_title;
            this.editRow.program_duration = editData[0].program_duration;
            this.editRow.no_of_semester = editData[0].no_of_semester;
            this.editRowMessage = true;
            this.$store.dispatch("AddProgramModalToggle");
        },

        //** deleteItem Function is use to delete the desired data
        deleteItem: function (id) {
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                'Authorization': "Bearer  " + this.userAuth.token
            };
            // send request to Api Route
            axios
                .post(
                    process.env.MIX_APP_URL + "/del-program", {
                        id: id
                    }, {
                        headers: headers
                    }
                )
                .then(res => {
                    this.snackbar = true;
                    this.succesMessage = "Program Delete Successfully!";
                    this.getProgram();
                })
                .catch(error => {

                });
        },

        // **getProgram Function is Use to get all Program Data
        getProgram: function () {
            // Headers are defined for authentication
            let data = cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("adminLogin")),
                "ums"
            );
            const headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + data.token
            };
            // send request to Api Route
            axios
                .post(process.env.MIX_APP_URL + "/get-program", "", {
                    headers: headers
                })
                .then(res => {
                        console.log(res);
                    this.$store.dispatch("allProgram", res.data.allProgram);
                    this.message = false;
                })
                .catch(error => {

                });
        }
    },
    computed: {
        //User Auth function authorizing Admin & use in Header  
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("adminLogin")),
                "ums"
            );
        }
    },
    // use as a constructor 
    created() {
        EventBus.$on("EditProgram", () => {
            this.getProgram();
            this.editRowMessage = false;
        });
        EventBus.$on('loadAssignCourse', (id) => {
            let headers = {
                'Content-type': 'application/json',
                'Authorization': "Bearer  " + this.userAuth.token
            }
            axios.post(process.env.MIX_APP_URL + '/assign-courses', {
                    'id': id
                }, {
                    headers: headers
                })
                .then(res => {
                    this.AssignCourseData = res.data;
                })
                .catch(error => {
                });
        });
        this.getProgram();
    }
};
</script>

<style scoped>
.create-btn {
    position: absolute;
    float: right;
    right: 10px;
}

.status-chip {
    color: white;
}
</style>
