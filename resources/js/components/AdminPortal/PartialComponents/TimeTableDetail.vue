<template>
<div>
    <v-row justify="center">
        <v-dialog v-model="TimeTableDetailModal" persistent max-width="500px">
            <v-card max-width="100%">
                <v-card-title class="title font-weight-regular justify-space-between">
                    <span>Create Time Table</span>
                    <v-avatar color="primary lighten-2" class="subheading white--text" size="24" v-text="step"></v-avatar>
                </v-card-title>
                <ValidationObserver ref="observer" v-slot="{ invalid }">
                    <v-form v-model="valid" ref="form">
                        <v-window v-model="step">
                            <v-window-item :value="1">
                                <v-card-text>
                                    <ValidationProvider name="Program" rules="required" v-slot="{ errors }">
                                        <v-select item-text="program_title" item-value="id" :items="program" :error-messages="errors" v-model="scheduleHead.program" label="Select Program"></v-select>
                                    </ValidationProvider>
                                    <ValidationProvider name="Semester" rules="required" v-slot="{ errors }">
                                        <v-select :items="semester" :error-messages="errors" v-model="scheduleHead.semester" label="Select Semester"></v-select>
                                    </ValidationProvider>

                                </v-card-text>
                            </v-window-item>

                            <v-window-item :value="2">
                                <v-card-text>
                                    <ValidationProvider name="Shift" rules="required" v-slot="{ errors }">
                                        <v-select :items="shift" item-text="Shift" item-value="id" :error-messages="errors" v-model="scheduleHead.shift" label="Select Shift"></v-select>
                                    </ValidationProvider>
                                </v-card-text>
                            </v-window-item>

                            <v-window-item :value="3">
                                <div class="pa-4 text-center" v-if="loading">
                                    <h3 class="title font-weight-light mb-2">Done!</h3>
                                    <span class="caption grey--text">This Parameters Are same For all enter schedules</span>
                                    <span class="caption grey--text">Thanks for Setting require Parameter</span><br>
                                    <v-btn color="primary" v-if="avaiable != '' " @click="modify()">Modify Time Table</v-btn>
                                    <v-btn color="primary" @click="AddTimeTableModel()" v-else>Create Time Table</v-btn>
                                </div>
                                <div v-else class="text-center">
                                    <v-progress-circular indeterminate color="primary"></v-progress-circular>
                                </div>
                            </v-window-item>
                        </v-window>

                        <v-divider></v-divider>

                        <v-card-actions>
                            <v-btn :disabled="step === 1" text @click="step--">Back</v-btn>
                            <v-spacer></v-spacer>

                            <v-btn :disabled="step === 3 || (step===2 && invalid)" color="primary" depressed @click="check()" v-if="step < 3">Next</v-btn>
                        </v-card-actions>
                    </v-form>
                </ValidationObserver>
            </v-card>
        </v-dialog>
    </v-row>
</div>
</template>

<script>
// *** Importing Event Bus
import EventBus from "../../../EventBus/eventBus";

import {
    required
} from 'vee-validate/dist/rules';
import {
    extend,
    ValidationObserver,
    ValidationProvider,
    setInteractionMode
} from "vee-validate";
extend('required', {
    ...required,
    message: '{_field_} can not be empty',
});
setInteractionMode("eager");

export default {
    name: "timeTableDetail",
    components: {
        ValidationObserver,
        ValidationProvider,
    },
    mounted() {
        this.getProgram();
        this.getShift();

    },
    data: function () {
        return {
            step: 1,
            valid: true,
            loading:false,
            program: [],
            semester: ["1", "2", "3", "4", "5", '6', '7', '8'],
            shift: [],
            avaiable: null,
            scheduleHead: {
                program: "",
                program_name:'',
                semester: "",
                shift: "",
                shift_name:''
            }
        };
    },
    methods: {
        modify:function(){
            this.$store.dispatch("TimeTableDetailModal");
            this.$router.push({name:'EditTimeTable',params: { id:this.avaiable[0].id,slug:'Modifying Time Table' }})
        },
        check: function () {

            if (this.step == 2) {
                let headers = {
                    "Content-Type": "application/json",
                    Authorization: "Bearer  " + this.userAuth.token
                };
                axios.post(process.env.MIX_APP_URL + '/check-time-table', this.scheduleHead, {
                        headers: headers
                    })
                    .then(res => {
                        this.avaiable = res.data.timeTables;
                      
                        this.loading=true;
                       
                    })
                    .catch((err) => err)
            }
            this.step++;
        },
        getProgram() {
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            // send request to Api Route
            axios
                .post(process.env.MIX_APP_URL + "/get-all-program", "", {
                    headers: headers
                })
                .then(response => {
                    this.program = response.data.data;
                })
                .catch(error => {});
        },
        getShift: function () {
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            // send request to Api Route
            axios
                .post(process.env.MIX_APP_URL + "/get-shift", "", {
                    headers: headers
                })
                .then(response => {
                    this.shift = response.data.data;

                })
                .catch(error => {});
        },
        // AddTimeTableModel  Use to open Dilog Box 
        AddTimeTableModel() {
         let program_name= this.program.filter(item=>item.id==this.scheduleHead.program);
         this.scheduleHead.program_name=program_name[0].program_title;
          let shift_name= this.shift.filter(item=>item.id==this.scheduleHead.shift);
         this.scheduleHead.shift_name=shift_name[0].shift;
            EventBus.$emit("timeTableDetail", this.scheduleHead);
            this.$store.dispatch("TimeTableDetailModal");
            this.$store.dispatch("CreateTimeTableModal");
        }
    },
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("adminLogin")),
                "ums"
            );
        },
        TimeTableDetailModal: function () {
            return this.$store.state.TimeTableDetailModal;
        }
    }
};
</script>
