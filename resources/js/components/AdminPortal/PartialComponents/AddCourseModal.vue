<template>
<div>
    <v-row justify="center">
        <v-dialog scrollable="" v-model="dialog" persistent max-width="600px">
            <v-card>
                <v-card-title>
                    <span class="headline">{{ editRowMessage ? 'Update Course' :' Add A New' }} Course</span>
                </v-card-title>
                <v-card-text>
                    <v-container>
                        <v-form v-model="valid" ref="form">
                            <v-row>
                                <v-col cols="12">
                                    <v-text-field v-model="courseDetail.course_code" :rules="FieldRules" required label="Course Code" hint="SWE-403"></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-text-field v-model="courseDetail.course_title" :rules="FieldRules" label="Course Title*" hint="Web Engineering" required></v-text-field>
                                </v-col>

                                <v-col cols="12">
                                    <v-text-field v-model="courseDetail.credit_hours" :rules="FieldRules" required label="Credit Hours" hint="4(3-1)"></v-text-field>
                                </v-col>

                            </v-row>
                        </v-form>
                    </v-container>
                    <small>*indicates required field</small>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn small color="error" @click="$store.dispatch('AddCourseModalToggle');$refs.form.reset();">Close</v-btn>
                    <v-btn small :disabled="!valid" v-if="!editRowMessage" color="primary" @click="insertCourse()">Add</v-btn>
                    <v-btn small :disabled="!valid" v-else color="primary" @click="editCourse()">Update</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-row>
    <v-snackbar top right v-model="snackbar" color="success">
        {{succesMessage}}

        <template v-slot:action="{ attrs }">
            <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">Close</v-btn>
        </template>
    </v-snackbar>
</div>
</template>

<script>
import EventBus from '../../../EventBus/eventBus';
export default {
    name: "AddCourseModel",
    props: ['editData', 'editRowMessage'],
    data() {
        return {
            valid: true,
            snackbar: false,
            FieldRules: [
                v => !!v || 'This Field is required'
            ],

        };
    },
    methods: {
        succesCall: function () {
            this.$refs.form.reset();
            this.$store.dispatch('AddCourseModalToggle');
            this.snackbar = true;
            EventBus.$emit('courseEdited');
        },
        editCourse: function () {
            console.log(this.editData);
            let headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer  ' + this.userAuth.token
            }
            axios.post(process.env.MIX_APP_URL + '/edit-course', this.courseDetail, {
                    headers: headers
                })
                .then((res) => {
                    this.succesMessage = 'Course was Update Successfully'
                    this.succesCall()
                })
                .catch((err) => {
                    if (error.response.status === 401) {
                        this.$router.push({
                            name: 'login'
                        })
                    }
                })
        },
        insertCourse: function () {
            let headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer  ' + this.userAuth.token
            }
            axios.post(process.env.MIX_APP_URL + '/insert-course', this.courseDetail, {
                    headers: headers
                })
                .then((res) => {
                    this.succesMessage = 'Course was Add Successfully';
                    this.succesCall()
                })
                .catch((err) => {
                    if (error.response.status === 401) {
                        this.$router.push({
                            name: 'login'
                        })
                    }
                })

        }
    },
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(JSON.parse(localStorage.getItem('adminLogin')), 'ums');
        },
        dialog: function () {
            return this.$store.state.AddCourseModal;
        },
        courseDetail: function () {
            return {
                id: this.editData.id,
                course_title: this.editData.course_title,
                course_code: this.editData.course_code,
                credit_hours: this.editData.credit_hours
            }
        },
    },

};
</script>

<style scoped>
</style>
