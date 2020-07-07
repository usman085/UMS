<template>
  <div>
    <v-row justify="center">
      <v-dialog v-model="dialog" persistent max-width="600px">
        <v-card>
          <v-card-title>
            <span class="headline">{{ editRowMessage ? 'Update ' :' Add A New' }} Program</span>
          </v-card-title>
          <v-card-text>
            <v-container>
              <v-form v-model="valid" ref="form">
                <v-row>
                  <v-col cols="12">
                    <v-text-field
                      v-model="programDetail.program_title"
                      :rules="FieldRules"
                      required
                      label="Program Title*"
                      hint="Becholar of Computer Science"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field
                      v-model="programDetail.program_short_title"
                      :rules="FieldRules"
                      required
                      label="Short Title"
                      hint="BSCS"
                    ></v-text-field>
                  </v-col>

                  <v-col cols="12">
                    <v-select
                      :items="items"
                      v-model="programDetail.program_duration"
                      :rules="FieldRules"
                      required
                      item-text="state"
                      label="Select Duration*"
                      persistent-hint
                      return-object
                      single-line
                    ></v-select>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field
                      v-model="programDetail.no_of_semester"
                      :rules="FieldRules"
                      label="No Of Semesters*"
                      type="text"
                      required
                    ></v-text-field>
                  </v-col>
                </v-row>
              </v-form>
            </v-container>
            <small>*indicates required field</small>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn small color="error" @click="$store.dispatch('AddProgramModalToggle')">Close</v-btn>

            <v-btn
              small
              :disabled="!valid"
              v-if="!editRowMessage"
              color="primary"
              @click="addProgram()"
            >Add</v-btn>
            <v-btn small :disabled="!valid" v-else color="primary" @click="editProgram()">Update</v-btn>
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
import EventBus from "../../../EventBus/eventBus";
export default {
  name: "AddProgramModel",
  props: ["editData", "editRowMessage"],
  data() {
    return {
      succesMessage: "",
      valid: true,
      snackbar: false,
      items: [1],
    
      FieldRules: [v => !!v || "This Field is required"]
    };
  },
  methods: {
    succesCall: function() {
      this.$refs.form.reset();
      this.$store.dispatch("AddProgramModalToggle");
      this.snackbar = true;
      EventBus.$emit("EditProgram");
    },
    editProgram: function() {
      console.log(this.editData);
        let headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer  ' + this.userAuth.token
            }
      axios
        .post(process.env.MIX_APP_URL + "/edit-program", 
        this.programDetail, {
          headers: headers
        })
        .then(res => {
          this.succesMessage = "Program is Updated Successfully";
          this.succesCall();
        })

        .catch(err => {
          if (error.response.status === 401) {
            this.$router.push({
              name: "login"
            });
          }
        });
    },
    addProgram: function() {
      let data = cryptoJSON.decrypt(
        JSON.parse(localStorage.getItem("adminLogin")),
        "ums"
      );
      const headers = {
        "Content-Type": "application/json",
        Authorization: "Bearer  " + data.token
      };
      axios
        .post(process.env.MIX_APP_URL + "/insert-program", this.programDetail, {
          headers: headers
        })
        .then(res => {
          this.succesMessage = "Program is Add Successfully";
          this.succesCall();
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
    userAuth: function() {
      return cryptoJSON.decrypt(
        JSON.parse(localStorage.getItem("adminLogin")),
        "ums"
      );
    },
    dialog: function() {
      return this.$store.state.AddProgramModal;
    },
    programDetail: function() {
      return {
        id: this.editData.id,
        program_title: this.editData.program_title,
        program_duration: this.editData.program_duration,
        program_short_title: this.editData.program_short_title,
        no_of_semester: this.editData.no_of_semester
      }
    },
  },
};
</script>

<style scoped>
</style>
