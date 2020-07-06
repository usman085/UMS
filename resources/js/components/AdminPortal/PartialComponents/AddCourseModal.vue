<template>
  <div>
    <v-row justify="center">
        <v-dialog scrollable="" v-model="dialog" persistent max-width="600px">
            <v-card>
                <v-card-title>
                    <span class="headline">Add a New Course</span>
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
                    <v-btn small color="error" @click="$store.dispatch('AddCourseModalToggle')">Close</v-btn>
                    <v-btn small :disabled="!valid" color="primary" @click="insertCourse()">Add</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-row>
    <v-snackbar top right v-model="snackbar" color="success">
      Course is Added successfully!
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
    data() {
        return {
            valid: true,
            snackbar: false,
            courseDetail: {
                course_title: '',
                course_code: "",
                credit_hours: ''
            },
            FieldRules: [
                v => !!v || 'This Field is required'
            ],

        };
    },
    methods: {
       
        insertCourse: function () {
            let data = cryptoJSON.decrypt(JSON.parse(localStorage.getItem('adminLogin')), 'ums');
            const headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer  ' + data.token
            }
            console.log(headers);
            axios.post(process.env.MIX_APP_URL + '/insert-course', this.courseDetail, {
                    headers: headers
                })
                .then((res) => {
                    console.log(res);
                    this.$refs.form.reset();
                    this.$store.dispatch('AddCourseModalToggle');
                    this.snackbar = true;
                    EventBus.$emit('courseEdited');
                })
                .catch((err) => {
                     if (error.response.status === 401) {
                        this.$router.push({name: 'login'})
                    }
                })
            

        }
    },
    computed: {
        dialog: function () {
            return this.$store.state.AddCourseModal;
        }
    },
    
};
</script>

<style scoped>
</style>
