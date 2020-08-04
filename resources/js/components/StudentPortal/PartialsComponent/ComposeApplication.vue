<template>
<div class="application-form-wrapper">
    <ValidationObserver ref="observer" v-slot="{invalid}">
        <!-- form for adding course  -->
        <v-form ref="form">
            <v-container>
                <v-row>
                    <h3 class="application-head">Application Form</h3>

                    <v-col cols="11">
                        <b> Forward To: </b>
                        <v-chip>Admin Department</v-chip>
                    </v-col>

                    <v-col cols="12">
                        <ValidationProvider name="Application Title" rules="required|alpha_spaces|max:35" v-slot="{ errors }">
                            <v-text-field :error-messages="errors" :counter="35" @blur="checkWords(applicationData.applicationTitle) " label="Application Title*" v-model="applicationData.applicationTitle" required></v-text-field>
                        </ValidationProvider>
                    </v-col>

                    <v-col cols="12" >
                        <label>Application</label>
                        <ValidationProvider name="Application Subject" rules="required" v-slot="{ errors }">
                            <ckeditor :error-messages="errors" :editor="editor" @blur="checkWords(applicationData.applicationContent) " v-model="applicationData.applicationContent" :config="editorConfig"></ckeditor>
                            <span class="error-msg" v-for="(err,index) in errors" :key="index">{{errors[0] }}</span>
                        </ValidationProvider>
                    </v-col>
                    <v-row>
                        <v-col cols="11" sm="12" md="12">
                            <div class="my-2 text-center">
                                <v-btn color="primary" v-if="!btnPacer" :disabled="submitBtn || invalid" @click="Submit()">
                                        Submit
                                </v-btn>
                                <v-btn v-else color="primary" :disabled="submitBtn || invalid">                                   
                                        <v-progress-circular :size="25" color="white" indeterminate></v-progress-circular>
                                </v-btn>
                            </div>
                        </v-col>
                    </v-row>

                </v-row>

            </v-container>
        </v-form>
        <!-- form for adding course  -->
    </ValidationObserver>
    <badWord :badWords="badWords" />
</div>
</template>

<script>
import Vue from 'vue';
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import {
    required,
    max,
    alpha_spaces,
} from 'vee-validate/dist/rules';
import {
    extend,
    ValidationObserver,
    ValidationProvider,
    setInteractionMode
} from "vee-validate";
extend('max', {
    ...max,
    message: '{_field_} maximum 35 Characters'
});
setInteractionMode("eager");

extend('alpha_spaces', {
    ...alpha_spaces,
    message: '{_field_} contains only alphabets '
});

extend('required', {
    ...required,
    message: '{_field_} can not be empty',
});

Vue.use(CKEditor);
import badWord from './BadWordAlert';
export default {
    name: 'composeApplication',
    components: {
        badWord,
        ValidationProvider,
        ValidationObserver
    },
    data() {
        return {
            badWords: '',
            editor: ClassicEditor,
            btnPacer: false,
            applicationData: {
                applicationTitle: '',
                applicationContent: '',
            },
            editorConfig: {
                // The configuration of the editor.
            },
            submitBtn: false,

        }
    },
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("studentLogin")),
                "ums"
            );
        },
    },
    methods: {
        Submit: function () {
            this.btnPacer = true;;
            // Headers are defined for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            axios.post(process.env.MIX_APP_URL + '/submit-application', this.applicationData, {
                    headers: headers
                })
                .then(res => {
                    this.btnPacer = false;
                    this.$refs.observer.reset();
                    this.$refs.form.reset();
                    this.applicationData.applicationContent=""; 
                    console.log(res);
                })
                .catch(err => {})
        },
        checkWords: function (data) {
            var banned = ["lun", "apple", "banana"];
            let words = data.toLowerCase();
            for (var i = 0; i < banned.length; i++) {
                if (words.includes(banned[i])) {
                    this.submitBtn = true;
                    this.$store.dispatch('BadWordModalToggle');
                    break;
                } else {
                    this.submitBtn = false;
                }

            }
        }

    }
}
</script>

<style>
.application-head {
    text-align: center;
}

.my-2 {
    margin: 0 10px;
}

.error-msg {
    color: #ff5252;
    font-size: 12px;
}
</style>
