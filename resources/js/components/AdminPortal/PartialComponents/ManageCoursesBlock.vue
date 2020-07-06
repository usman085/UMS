<template>
<div class="time-table-wrapper">
    <v-card max-width="96%">
        <v-card-title>
            Manage Courses
            <v-btn class="create-btn" @click="$store.dispatch('AddCourseModalToggle')">
                <v-icon>mdi-plus-circle</v-icon>Add New Course
            </v-btn>
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
                                            <v-list-item>
                                                <v-list-item-title>Assign Outline</v-list-item-title>
                                            </v-list-item>
                                        </v-list>
                                    </v-menu>
                                    <!-- <span class="text-right outline-status">
                                    <v-chip>
                                        <v-icon>mdi-information-variant</v-icon>
                                    </v-chip>
                                </span> -->
                                </td>
                            </tr>
                        </template>
                        <tr v-else>
                            <td colspan="4" class="text-center">
                                <template v-if="message">
                                    <v-progress-circular indeterminate color="primary"></v-progress-circular>
                                </template>
                                <template v-else>
                                    No Data Found!
                                </template>

                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-card-text>
    </v-card>
    <v-snackbar top right v-model="snackbar" color="success">
        {{succesMessage}}

        <template v-slot:action="{ attrs }">
            <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">Close</v-btn>
        </template>
    </v-snackbar>
    <AddCoursesModal :editData="editRow" :editRowMessage="editRowMessage"></AddCoursesModal>
</div>
</template>

<script>
import EventBus from '../../../EventBus/eventBus';
import AddCoursesModal from './AddCourseModal';

export default {
    name: "ManageCoursesBlock",
    components: {
        AddCoursesModal
    },
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(JSON.parse(localStorage.getItem('adminLogin')), 'ums');
        }
    },
    data() {
        return {
            succesMessage: '',
            snackbar: false,
            editRowMessage: false,
            editRow: {
                id: '',
                course_title: '',
                course_code: '',
                credit_hours: ''
            },
            message: true,
        };
    },
    methods: {
        editCourse: function (id) {
            let editData = this.$store.state.allCourses.filter(item => item.id == id);
            this.editRow.id = editData[0].id;
            this.editRow.course_title = editData[0].course_title;
            this.editRow.course_code = editData[0].course_code;
            this.editRow.credit_hours = editData[0].credit_hours;
            this.editRowMessage = true;
            this.$store.dispatch('AddCourseModalToggle');
        },
        delCourse: function (id) {
            let headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer  ' + this.userAuth.token
            }
            axios.post(process.env.MIX_APP_URL + '/del-course', {
                    'id': id
                }, {
                    headers: headers
                })
                .then((res) => {
                    this.snackbar = true;
                    this.succesMessage = 'Course Delete Successfully!'
                    this.getCourse();
                })
                .catch((err) => alert(err));
        },
        getCourse: function () {
            let headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer  ' + this.userAuth.token
            }

            axios.post(process.env.MIX_APP_URL + '/get-all-course', '', {
                    headers: headers
                })
                .then((res) => {
                    this.$store.dispatch('allCourses', res.data.courses);
                    this.message = false;
                })
                .catch((err) => {
                    if (error.response.status === 401) {
                        this.$router.push({
                            name: 'login'
                        })
                    }
                })
        },
    },
    created() {
        EventBus.$on('courseEdited', () => {
            this.getCourse();
            this.editRowMessage = false
        });
        this.$store.dispatch('overlay');
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
