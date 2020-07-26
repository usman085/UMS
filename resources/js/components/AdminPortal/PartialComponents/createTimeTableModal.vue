<template>
<div>
    <!-- modal create time table -->
    <v-row justify="center">
        <v-dialog v-model="scheduleModalToggle" max-width="50%" persistent>
            <v-card>
                <!-- Condional Rendering -->
                <v-card-title>{{ updateBtn ? 'Update' : 'Enter' }} Lecture Detail</v-card-title>
                <v-card-subtitle>Select and Enter Lecture Details</v-card-subtitle>
                <v-card-text>
                    <v-container>
                        <!-- Form Start -->
                <ValidationObserver ref="observer" v-slot="{ invalid }">
                    <v-form  ref="form">
                            <!--Form Ref variable-->
                            <v-row>
                                <!-- hidden field for updating -->
                                <input type="hidden" v-model="detailSchedule.id" />
                                <v-col cols="12">
                                    <ValidationProvider name="Day" rules="required" v-slot="{ errors }">
                                    <v-select :error-messages="errors" :items="$store.state.days" v-model="detailSchedule.day" label="Select Day"></v-select>
                                    </ValidationProvider>
                                </v-col>
                                <v-col cols="12">
                                     <ValidationProvider name="Course" rules="required" v-slot="{ errors }">
                                          <v-select :error-messages="errors" :items="$store.state.allCourses" item-text="course_title" item-value="id" v-model="detailSchedule.subject_id" label="Select Course"></v-select>
                                       </ValidationProvider>   
                                   
                                </v-col>

                                <v-col cols="6">
                                    <ValidationProvider name="Teacher" rules="required" v-slot="{ errors }">
                                    <v-select :error-messages="errors" :items="$store.state.teachers" v-model="detailSchedule.teacher" label="Select Teacher"></v-select>
                                    </ValidationProvider>
                                </v-col>

                                <v-col cols="6">
                                    <ValidationProvider name="Teacher" rules="required" v-slot="{ errors }">
                                      <v-select :error-messages="errors" :items="classRooms" item-value="id" item-text="class_room" v-model="detailSchedule.class_room_id" label="Select Class Room"></v-select>
                                    </ValidationProvider>
                                  
                                </v-col>
                                <v-col cols="6">
                                    <!-- time picker -->
                                    <v-menu ref="menu" v-model="startingTimeModal" :close-on-content-click="false" :nudge-right="40" :return-value.sync="detailSchedule.startingTime" transition="scale-transition" offset-y max-width="290px" min-width="290px">
                                        <template v-slot:activator="{ on, attrs }">
                                            <ValidationProvider name="Starting Time" rules="required" v-slot="{ errors }">
                                            <v-text-field :error-messages="errors" v-model="detailSchedule.startingTime" label="Pick Starting Time" prepend-icon readonly v-bind="attrs" v-on="on"></v-text-field>
                                            </ValidationProvider>
                                        </template>
                                        <v-time-picker v-if="startingTimeModal" v-model="detailSchedule.startingTime" full-width @click:minute="$refs.menu.save(detailSchedule.startingTime)"></v-time-picker>
                                    </v-menu>
                                </v-col>

                                <v-col cols="6">
                                    <v-menu ref="menu2" v-model="endingTimeModal" :close-on-content-click="false" :nudge-right="40" :return-value.sync="detailSchedule.endingTime" transition="scale-transition" offset-y max-width="290px" min-width="290px">
                                        <template v-slot:activator="{ on, attrs }">
                                            <ValidationProvider name="Ending Time" rules="required" v-slot="{ errors }">
                                            <v-text-field :error-messages="errors" v-model="detailSchedule.endingTime" label="Pick Ending Time" prepend-icon readonly v-bind="attrs" v-on="on"></v-text-field>
                                            </ValidationProvider>
                                       </template>
                                        <v-time-picker v-if="endingTimeModal" v-model="detailSchedule.endingTime" full-width @click:minute="$refs.menu2.save(detailSchedule.endingTime)"></v-time-picker>
                                    </v-menu>
                                </v-col>

                                <v-col cols="12">
                                    <div class="text-center">
                                        <v-btn color="primary" :disabled="invalid" v-if="!updateBtn" @click.stop="insertTimeTable()">Add To Schedule</v-btn>
                                        <v-btn color="primary" :disabled="invalid" v-if="updateBtn" @click.stop="updateTableData()">Update the Schedule</v-btn>
                                        <v-btn color="red"  class="cancel-btn" @click.stop="cancel()">Cancel</v-btn>
                                    </div>
                                </v-col>
                            </v-row>
                        </v-form>
                        </ValidationObserver>
                    </v-container>
                </v-card-text>
            </v-card>
        </v-dialog>
    </v-row>

    <!-- modal time table -->
</div>
</template>

<script>
// *** Import Event Bus
import EventBus from "../../../EventBus/eventBus";
import {required} from 'vee-validate/dist/rules';
import {extend,ValidationObserver,ValidationProvider,setInteractionMode} from "vee-validate";

extend('required', {
    ...required,
    message: '{_field_} can not be empty',
});

setInteractionMode("eager");
export default {
    name: "TimeTableModal",
    props: ["editData", "updateBtn"], //props 'editData' for Updating & 'updateBtn' for Btn & title
    data: function () {
        return {
            classRooms: [],
            courses: [],
            startingTimeModal: false, //Time picker modal For Starting time
            endingTimeModal: false, // Time Picker modl for Ending Time
        };
    },
    components: {
        ValidationObserver,
        ValidationProvider,
    },
    mounted() {
        this.getCourse();
        this.getClassRoom();
    },
    // *** Data Object
    methods: {
        getCourse: function () {
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            // send request to Api Route
            axios.post(process.env.MIX_APP_URL + "/get-all-course", "", { headers: headers})
                .then(res => {
                    this.$store.dispatch("allCourses", res.data.courses);
                })
                .catch(error => {});
        },
        getClassRoom() {
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            axios.post(process.env.MIX_APP_URL + '/get-class-room-detail', '', {headers: headers})
                .then((res) => {
                    this.classRooms = res.data.rooms;
                })
                .catch(err => {})
        },
        //*** Fun for Close Modal
        cancel: function () {
            this.$store.dispatch("CreateTimeTableModal");
            this.$refs.form.reset();
        },
        //*** fun for get updated data and send to array
        updateTableData: function () {

            let subject = this.$store.state.allCourses.filter(item => item.id == this.detailSchedule.subject_id);
            let ClassRoom = this.classRooms.filter(item => item.id == this.detailSchedule.class_room_id);

            this.detailSchedule.subject_name = subject[0].course_title;
            this.detailSchedule.classRoom_name = ClassRoom[0].class_room;

            EventBus.$emit("updateTimeTableData", this.detailSchedule);
            this.$store.dispatch("CreateTimeTableModal");
            this.$refs.form.reset();
            this.$refs.observer.reset();
        },
        //*** Insert Data In Table
        insertTimeTable: function () {
            
            let subject = this.$store.state.allCourses.filter(item => item.id == this.detailSchedule.subject_id);
            let ClassRoom = this.classRooms.filter(item => item.id == this.detailSchedule.class_room_id);
            
            this.detailSchedule.subject_name = subject[0].course_title;
            this.detailSchedule.classRoom_name = ClassRoom[0].class_room;
            
            EventBus.$emit("timeTableData", this.detailSchedule);
            this.$refs.form.reset();
            this.$refs.observer.reset();
            this.$store.dispatch("CreateTimeTableModal");
        }
    },
    // *** Reactive Property
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(JSON.parse(localStorage.getItem("adminLogin")),"ums");
        },
        // *** Time Table Modal Object if update data get then put in object
        detailSchedule: function () {
            return {
                id: this.editData.id,
                day: this.editData.day,
                teacher: this.editData.teacher,
                subject_id: this.editData.subject_id,
                subject_name: this.editData.subject_name,
                startingTime: this.editData.startingTime,
                endingTime: this.editData.endingTime,
                class_room_id: this.editData.class_room_id,
                classRoom_name: this.editData.classRoom_name
            };
        },
        // *** Toggle Schedule Modal
        scheduleModalToggle: function () {
            return this.$store.state.CreateTimeTableModal;
        }
    }
};
</script>

<style scoped>
.cancel-btn {
    color: white;
}
</style>
