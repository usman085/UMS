<template>
<div>
    <v-row justify="center">
        <v-dialog v-model="dialog" persistent max-width="600px">
            <v-card>
                <v-card-title>
                    <!-- If editRowMessage is tru then update else Add A New   -->
                    <span class="headline">{{ editRowMessage ? 'Update ' :' Add A New' }} Program</span>
                </v-card-title>
                <ValidationObserver ref="observer"  v-slot="{invalid}">
                            <!-- Form To add or Update Data -->
                            <v-form ref="form">
                <v-card-text>
                    <v-container>
                        
                                <v-row>
                                    <v-col cols="12">
                                        <ValidationProvider name="Program Title" rules="required|alpha_spaces" v-slot="{ errors }">
                                            <v-text-field :error-messages="errors" v-model="programDetail.program_title" required label="Program Title*" hint="Becholar of Computer Science"></v-text-field>
                                        </ValidationProvider>
                                    </v-col>

                                    <v-col cols="12">
                                        <ValidationProvider name="Program Short Title" rules="required|alpha_spaces" v-slot="{ errors }">
                                            <v-text-field :error-messages="errors" v-model="programDetail.program_short_title" required label="Short Title" hint="BSCS"></v-text-field>
                                        </ValidationProvider>
                                    </v-col>

                                    <v-col cols="12">
                                        <ValidationProvider name="Program Duration" rules="required" v-slot="{ errors }">
                                            <v-select :error-messages="errors" :items="items" v-model="programDetail.program_duration" required item-text="state" label="Select Duration*" persistent-hint return-object></v-select>
                                        </ValidationProvider>
                                    </v-col>

                                    <v-col cols="12">
                                        <ValidationProvider name="Program Duration" rules="required|numeric" v-slot="{ errors }">
                                            <v-text-field :error-messages="errors" v-model="programDetail.no_of_semester" label="No Of Semesters*" type="number" step="1" onkeypress="return event.charCode > 48" min="1" max="9" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="1" required></v-text-field>
                                        </ValidationProvider>
                                    </v-col>
                                </v-row>

                    </v-container>
                    <small>*indicates required field</small>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn small color="error" @click="$store.dispatch('AddProgramModalToggle')">Close</v-btn>

                    <v-btn small :disabled="invalid" v-if="!editRowMessage" color="primary" @click="addProgram()">Add</v-btn>
                    <v-btn small :disabled="invalid" v-else color="primary" @click="editProgram()">Update</v-btn>
                </v-card-actions>
                </v-form>
                <!-- Form To add or Update Dataa -->
                </ValidationObserver>
            </v-card>
        </v-dialog>
    </v-row>
    <!-- Success Message Display in SnakeBar -->
    <v-snackbar top right v-model="snackbar" color="success">
        {{successMessage}}
        <template v-slot:action="{ attrs }">
            <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">Close</v-btn>
        </template>
    </v-snackbar>
</div>
</template>

<script>
// *** Event Bus Use to Communicate Data Between Two Components
import EventBus from "../../../EventBus/eventBus";
import {
    required,
    alpha_spaces,
    numeric
} from 'vee-validate/dist/rules';
import {
    extend,
    ValidationObserver,
    ValidationProvider,
    setInteractionMode,

} from "vee-validate";

setInteractionMode("eager");

extend('alpha_spaces', {
    ...alpha_spaces,
    message: '{_field_} contains only alphabets '
});

extend('required', {
    ...required,
    message: '{_field_} can not be empty',
});
extend('numeric', {
    ...numeric,
    message: '{_field_} can only contain numbers',
})

export default {
    name: "AddProgramModel",
    props: ["editData", "editRowMessage"],
    components: {

        ValidationProvider,
        ValidationObserver
    },
    data() {
        return {
            amount: 7,
            successMessage: "",
           
            snackbar: false,
            items: [1, 2, 3, 4],

        };
    },
    methods: {
        // successCall Function use to reset form,close Model,snake bar true,and to emit data
        successCall: function () {
            this.$refs.form.reset();
            this.$store.dispatch("AddProgramModalToggle");
            this.snackbar = true;
            this.$refs.observer.reset();
            EventBus.$emit("EditProgram");
        },
        //**addProgram Function Is use to Add The Program
        addProgram: function () {
            // Headers are required for authentication
            let data = cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("adminLogin")),
                "ums"
            );
            const headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + data.token
            };
            // sending request to Api Route
            axios
                .post(process.env.MIX_APP_URL + "/insert-program", this.programDetail, {
                    headers: headers
                })
                .then(res => {
                    this.successMessage = "Program is Add Successfully";
                    this.successCall();
                })

                .catch(err => {

                });
        },

        // Edit Program Function use to edit data in Program table
        editProgram: function () {
            // Headers are required for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            // sending request to Api Route
            axios
                .post(process.env.MIX_APP_URL + "/edit-program", this.programDetail, {
                    headers: headers
                })
                .then(res => {
                    this.successMessage = "Program is Updated Successfully";
                    this.successCall();
                })

                .catch(err => {

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
        },
        // Dialog Function is use to open Model to Add Course
        dialog: function () {
            return this.$store.state.AddProgramModal;
        },
        // Data of Form Insert and Edit From this function
        programDetail: function () {
            return {
                id: this.editData.id,
                program_title: this.editData.program_title,
                program_duration: this.editData.program_duration,
                program_short_title: this.editData.program_short_title,
                no_of_semester: this.editData.no_of_semester
            };
        }
    }
};
</script>

<style scoped>
</style>
