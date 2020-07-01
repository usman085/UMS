<template>
<v-card class="mx-auto" max-width="100%">
    <div class="customer-support">
        <v-card-title>Get In Touch</v-card-title>
        <v-card-subtitle class="subtitle">Please fill out the quick form and we will be in touch with ligthening Speed</v-card-subtitle>
    </div>
    <!--customer-support-->
    <div class="form-card">
        <v-container>
            <v-row>
                <v-col cols="12" xs="12" sm="6" md="8">
                    <v-text-field label="Name"></v-text-field>
                    <v-text-field label="Email"></v-text-field>

                    <label>Message:</label>
                    <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
                    <div class="my-2 feedback-button text-center">
                        <v-btn color="primary">Send To Support</v-btn>
                    </div>
                </v-col>
                <v-col cols="12" xs="12" sm="6" md="4">
                    <v-card max-width="100%">
                        <!-- connnet block -->
                        <v-card max-width="100%">
                            <v-card-title>Connect with us</v-card-title>
                            <v-card-subtitle>
                                <div class="support-contact">
                                    For Support Or any question?
                                    <p>Email us at : usmanqadeer085@gmail.com</p>
                                    <p>Email us at : ru03244523131@gmail.com</p>
                                </div>
                            </v-card-subtitle>
                        </v-card>
                        <!-- connnet block -->
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </div>
</v-card>
</template>

<script>
import Vue from "vue";
import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
Vue.use(CKEditor);
export default {
    name: "customSupport",
    data: function () {
        return {
            editor: ClassicEditor,
            editorData: "<p></p>",
            editorConfig: {
                // The configuration of the editor.
            }
        };
    }
};
</script>

<style scoped>
.support-contact {
    padding: 10px;
    font-size: 14px;
}

.customer-support,
.theme--light.v-card .v-card__subtitle {
    background: #0091ea;
    color: white;
    font-weight: bold;
}

* {
    font-family: "Allerta";
}
</style>
