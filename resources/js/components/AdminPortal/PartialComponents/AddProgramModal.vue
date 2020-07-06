<template>
<div>
    <v-row justify="center">
        <v-dialog v-model="dialog" persistent max-width="600px">
            <v-card>
                <v-card-title>
                    <span class="headline">Add a New Program</span>
                </v-card-title>
                <v-card-text>
                    <v-container>
                        <v-form v-model="valid" ref="form">
                            <v-row>
                                <v-col cols="12">
                                    <v-text-field v-model="programs.program_title" :rules="FieldRules" required label="Program Title*" hint="Becholar of Computer Science"></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-text-field v-model="programs.program_short_title" :rules="FieldRules" required label="Short Title" hint="BSCS"></v-text-field>
                                </v-col>

                                <v-col cols="12">
                                    <v-select :items="items" v-model="programs.program_duration" :rules="FieldRules" required item-text="state" label="Select Duration*" persistent-hint return-object single-line></v-select>
                                </v-col>
                                <v-col cols="12">
                                    <v-text-field v-model="programs.no_of_semester" :rules="FieldRules" label="No Of Semesters*" type="text" required></v-text-field>
                                </v-col>
                            </v-row>
                        </v-form>
                    </v-container>
                    <small>*indicates required field</small>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn small color="error" @click="$store.dispatch('AddProgramModalToggle')">Close</v-btn>
                    <v-btn small color="primary" @click="addProgram()">Add</v-btn>
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
export default {
    name: "AddProgramModel",
    data() {
        return {
            valid: true,
            snackbar: false,
            items: [1],
            programs: {
                program_title: "",
                program_short_title: "",
                program_duration: "",
                no_of_semester: ""
            },
            FieldRules: [v => !!v || "This Field is required"]
        };
    },
    methods: {
        addProgram: function () {
            let data = cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("adminLogin")),
                "ums"
            );
            const headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + data.token
            };
            axios
                .post(process.env.MIX_APP_URL + "/insert-program", this.programs, {
                    headers: headers
                })
                .then(response => {
                    console.log(response);
                    this.$refs.form.reset();
                    this.$store.dispatch("AddProgramModalToggle");
                    this.snackbar = true;
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
    computed: {
        dialog: function () {
            return this.$store.state.AddProgramModal;
        }
    }
};
</script>

<style scoped>
</style>
