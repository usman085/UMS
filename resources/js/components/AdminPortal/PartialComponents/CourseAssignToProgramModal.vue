<template>
<v-dialog scrollable v-model="$store.state.CourseAssignModal" max-width="800">
    <v-card>
        <v-card-title>
            {{ programDetail.program_title | capitalize }}

            <v-spacer></v-spacer>
            <v-icon @click="close()">mdi-close</v-icon>
        </v-card-title>
        <v-card-subtitle>
            {{programDetail.program_short_title.toUpperCase()}} | Total Semester : {{programDetail.no_of_semester}} | Program Duration {{programDetail.program_duration}}
            <v-divider></v-divider>
        </v-card-subtitle> 
        <v-card-text>
            <div class="course-block">
                
                <v-form v-model="valid" ref="form">
                    <v-container fluid="">
                        <span>Select Semester</span>
                        <v-row>
                            <v-col cols="12">
                                <v-radio-group :rules="semesterRules" v-model="semester" required row>
                                    <v-radio dense v-for="n in programDetail.no_of_semester" :key="n" :label="`Semester ${n}`" :value="n"></v-radio>
                                </v-radio-group>
                            </v-col>
                        </v-row>
                    </v-container>

                    <v-container fluid="">
                        <v-divider></v-divider>
                        <span>All Courses</span>
                        <template v-if="$store.state.allCourses.length > 0">
                            <v-row>
                                <v-col cols="4" v-for="item in $store.state.allCourses" :key="item.id">
                                    <div>
                                        <span>
                                            <v-checkbox :rules="semesterRules" required v-model="selected" :label="item.course_title" :value="item.id"></v-checkbox>
                                            <span class="course-detail-subtitle">{{item.course_code}} | {{item.credit_hours}}</span>
                                        </span>
                                    </div>
                                </v-col>
                            </v-row>
                        </template>
                        <template v-else>
                            <h4 class="text-center">No Data Found!</h4>
                        </template>
                    </v-container>
                </v-form>
            </div>
        </v-card-text>
        <v-card-actions>

            <v-spacer></v-spacer>

            <v-btn color="primary" @click="insertAssignCourse()" :disabled="!valid || (selected =='')">Assign Course</v-btn>
            <v-btn color="danger" @click="close()">Cancel</v-btn>
        </v-card-actions>
         <pacer :message="'Saving....'" ></pacer>
    </v-card>
   
</v-dialog>
</template>

<script>
import pacer from '../../CommonGobalComponent/Pacer';
export default {
    name: 'CourseAssignToProgramModal',
    props: ['programDetail'],
    data: function () {
        return {
            semesterRules: [v => !!v || "This Field is required"],
            valid: true,
            selected: [],
            semester: ""
        }
    },
    components:{pacer},
    computed: {
        program_id: function () {
            return this.programDetail.id

        },
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("adminLogin")),
                "ums"
            );
        }
    },
    methods: {
        close:function(){
            this.$store.dispatch('CourseAssignModal');
            this.$refs.form.reset();
        },
        insertAssignCourse: function () {
            this.$store.dispatch('overlay');
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };

            axios
                .post(process.env.MIX_APP_URL + "/assign-course-to-program", {
                    'program_id': this.program_id,
                    'selected': this.selected,
                    'semester': this.semester,
                }, {
                    headers: headers
                })
                .then(res => {
                    console.log(res);
                     this.$store.dispatch('overlay');
                     this.$refs.form.reset();
                    //this.$store.dispatch("allCourses", res.data.courses);
                })
                .catch(err => {
                    if (error.response.status == 401) {
                        this.$router.push({
                            name: "login"
                        });
                    }
                });
        },
        getCourse: function () {
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };

            axios
                .post(process.env.MIX_APP_URL + "/get-all-course", "", {
                    headers: headers
                })
                .then(res => {
                    this.$store.dispatch("allCourses", res.data.courses);
                })
                .catch(err => {
                    if (error.response.status == 401) {
                        this.$router.push({
                            name: "login"
                        });
                    }
                });
        }
    },
    mounted() {
        this.getCourse();
    }
}
</script>

<style scoped>
.course-block {

    border: 1px solid #eee;
}

.v-input--selection-controls.v-input {
    height: 25px;
    margin: 0;
}

.course-detail-subtitle {
    font-size: 11px;
    display: table;
    margin: 0 31px;
}

.v-input--selection-controls .v-input__slot>.v-label,
.v-input--selection-controls .v-radio>.v-label {
    font-size: 12px !important;
}

.v-application--is-ltr .v-messages {
    display: none;
}
</style>
