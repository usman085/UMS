<template>
<v-dialog scrollable v-model="$store.state.CourseAssignModal" max-width="800">
    <v-card>
        <v-card-title>
            {{ programDetail.program_title | capitalize }}
            <v-spacer></v-spacer>
            <v-icon @click="$store.dispatch('CourseAssignModal')">mdi-close</v-icon>
        </v-card-title>
        <v-card-subtitle>
            {{programDetail.program_short_title.toUpperCase()}} | {{programDetail.no_of_semester}} | {{programDetail.program_duration}}
            <v-divider></v-divider>
        </v-card-subtitle>
        <v-card-text>
            <div class="course-block">
                <v-container fluid="">
                    <span>All Courses {{selected}}</span>
                    <v-row >
                        <v-col cols="4" v-for="item in $store.state.allCourses" :key="item.id">
                            <div>
                                <span>
                                    <v-checkbox v-model="selected" :label="item.course_title" :value="item.id"></v-checkbox>
                                    <span class="course-detail-subtitle">{{item.course_code}} | {{item.credit_hours}}</span>
                                </span>
                            </div>
                        </v-col>
                    </v-row>
                </v-container>

            </div>
        </v-card-text>
    </v-card>
</v-dialog>
</template>

<script>
export default {
    name: 'CourseAssignModal',
    props:['programDetail'],
    data: function () {
        return {
            selected:[]
        }
    },
    computed: {
    userAuth: function() {
      return cryptoJSON.decrypt(
        JSON.parse(localStorage.getItem("adminLogin")),
        "ums"
      );
    }
  },
    methods: {
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
                    if (error.response.status === 401) {
                        this.$router.push({
                            name: "login"
                        });
                    }
                });
        }
    },
    mounted(){
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
.course-detail-subtitle{
    font-size: 11px;
    display: table;
    margin: 0 31px;
}
.v-application--is-ltr .v-messages {
display: none;
}
</style>
