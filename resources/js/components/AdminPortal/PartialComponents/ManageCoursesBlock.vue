<template>
<div class="time-table-wrapper">
    <v-card max-width="96%">
        <v-card-title>
            Manage Courses
            <!-- Close The Model -->
            <v-btn class="create-btn" @click="$store.dispatch('AddCourseModalToggle')">
                <v-icon>mdi-plus-circle</v-icon>Add New Course
            </v-btn>
            <!-- Close The Model -->
        </v-card-title>
        <v-card-subtitle>All Courses are manage here.</v-card-subtitle>
        <v-card-text>
            <v-simple-table>
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">Course Code</th>
                            <th class="text-left">Course Title</th>
                            <th class="text-left">Credit Hour</th>
                            <th class="text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Conditional Rendering -->
                        <template v-if="$store.state.allCourses.length > 0">
                            <tr v-for="item in $store.state.allCourses" :key="item.id">
                                <td>{{item.course_code.toUpperCase() }}</td>
                                <td>{{item.course_title | capitalize}}</td>
                                <td>{{item.credit_hours |capitalize}}</td>
                                <td>
                                    <v-menu offset-y>
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-icon color="primary" v-bind="attrs" v-on="on">mdi-dots-vertical</v-icon>
                                        </template>
                                        <v-list>
                                            <v-list-item @click="editCourse(item.id)">
                                                <v-list-item-title>Modify</v-list-item-title>
                                            </v-list-item>
                                            <v-list-item @click="delCourse(item.id)">
                                                <v-list-item-title>Delete</v-list-item-title>
                                            </v-list-item>
                                            <v-list-item @click="courseOutlineModal(item)">
                                                <v-list-item-title>Assign Outline</v-list-item-title>
                                            </v-list-item>
                                        </v-list>
                                    </v-menu>
                                    <!-- <span class="text-right outline-status">
                                    <v-chip>
                                        <v-icon>mdi-information-variant</v-icon>
                                    </v-chip>
                    </span>-->
                                </td>
                            </tr>
                        </template>
                        <!-- Else Block -->
                        <tr v-else>
                            <td colspan="4" class="text-center">
                                <template v-if="message">
                                    <v-progress-circular indeterminate color="primary"></v-progress-circular>
                                </template>
                                <template v-else>No Data Found!</template>
                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-card-text>
    </v-card>
    <!-- SnakeBar To display Success Message -->
    <v-snackbar top right v-model="snackbar" color="success">
        {{ succesMessage }}
        <template v-slot:action="{ attrs }">
            <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">Close</v-btn>
        </template>
    </v-snackbar>
    <AddCoursesModal :editData="editRow" :editRowMessage="editRowMessage"></AddCoursesModal>
    <CourseOutlineViewModal :course="courseDetail" :courseDetailToOutline="courseDetailToOutline"></CourseOutlineViewModal>
</div>
</template>

<script>
// *** Event Bus
import EventBus from "../../../EventBus/eventBus";
// *** AddCoursesModal 
import AddCoursesModal from "./AddCourseModal";


import CourseOutlineViewModal from './CourseOutlineViewModal';
export default {
    name: "ManageCoursesBlock",
    components: {
        AddCoursesModal,
        CourseOutlineViewModal
    },
    data() {
        return {
            courseDetailToOutline:'',
            courseDetail:'',
            succesMessage: "",
            snackbar: false,
            editRowMessage: false,
            editRow: {
                id: "",
                course_title: "",
                course_code: "",
                credit_hours: ""
            },
            message: true
        };
    },
    methods: {
        courseOutlineModal:function(data){
            this.courseDetailToOutline=data.courses_outline;
             this.courseDetail=data;
              this.$store.dispatch('CourseOutlineView')
        },
        // **geCourse Function is Use to get all Course Data
        getCourse: function () {
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            // send request to Api Route
            axios
                .post(process.env.MIX_APP_URL + "/get-all-course", "", {
                    headers: headers
                })
                .then(res => {
                    this.$store.dispatch("allCourses", res.data.courses);
                    this.message = false;
                })
                .catch(error => {
                    
                });
        },
        // **EditCourse Function Is use to edit the Desired Course
        editCourse: function (id) {
            let editData = this.$store.state.allCourses.filter(item => item.id == id);
            this.editRow.id = editData[0].id;
            this.editRow.course_title = editData[0].course_title;
            this.editRow.course_code = editData[0].course_code;
            this.editRow.credit_hours = editData[0].credit_hours;
            this.editRowMessage = true;
            this.$store.dispatch("AddCourseModalToggle");
        },

        //** delCOurse Function is use to delete the desired data
        delCourse: function (id) {
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
             // send request to Api Route
            axios
                .post(
                    process.env.MIX_APP_URL + "/del-course", {
                        id: id
                    }, {
                        headers: headers
                    }
                )
                .then(res => {
                    this.snackbar = true;
                    this.succesMessage = "Course Delete Successfully!";
                    this.getCourse();
                })
                .catch(error =>{
                    
                });
        },

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
        EventBus.$on("courseEdited", () => {
            this.getCourse();
            this.editRowMessage = false;
        });
        this.getCourse();
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

.outline-status {
    float: right;
}
</style>
