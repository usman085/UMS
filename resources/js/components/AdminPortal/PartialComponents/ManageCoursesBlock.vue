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
                        <tr v-for="item in $store.state.allCourses" :key="item.id">
                            <td>{{item.course_code}}</td>
                            <td>{{item.course_title}}</td>
                            <td>{{item.credit_hours}}</td>
                            <td>
                                <v-menu offset-y>
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-icon color="primary" v-bind="attrs" v-on="on">mdi-dots-vertical</v-icon>
                                    </template>
                                    <v-list>
                                        <v-list-item>
                                            <v-list-item-title>Modify</v-list-item-title>
                                        </v-list-item>
                                        <v-list-item>
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
                    </tbody>
                </template>
            </v-simple-table>
        </v-card-text>
    </v-card>
    <AddCoursesModal></AddCoursesModal>
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
    data() {
        return {
            allCourses: []
        };
    },
    methods: {
        getCourse: function () {
            let data = cryptoJSON.decrypt(JSON.parse(localStorage.getItem('adminLogin')), 'ums');
            const headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer  ' + data.token
            }
            console.log(headers);
            axios.post(process.env.MIX_APP_URL + '/get-all-course', '', {
                    headers: headers
                })
                .then((res) => {
                    this.$store.dispatch('allCourses', res.data.courses);
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
        EventBus.$on('courseEdited', () => this.getCourse());
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
.outline-status{
    float: right;
}
</style>
