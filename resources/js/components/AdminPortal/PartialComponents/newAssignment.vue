<template>
<v-stepper v-model="e6" vertical>
    <v-stepper-step :complete="e6 > 1" step="1">
        Assignment Title | Assignment Description
        <small>Summarize if needed</small>
    </v-stepper-step>

    <v-stepper-content step="1">
        <v-card color=" lighten-1" class="mb-12">
            <v-card-text>
                <v-text-field label="Assignment Title"></v-text-field>
                <label>Assignment Description</label>
                <ckeditor :editor="editor"></ckeditor>
            </v-card-text>
        </v-card>
        <v-btn color="primary" @click="e6 = 2">Continue</v-btn>
        <v-btn text>Cancel</v-btn>
    </v-stepper-content>

    <v-stepper-step :complete="e6 > 2" step="2">Select Program | Semester | Shift</v-stepper-step>

    <v-stepper-content step="2">
        <v-card color=" lighten-1" class="mb-12">
            <v-card-text>
                <v-select  :items="states" label="Select Program"  hint="What are the target regions" persistent-hint></v-select>
                <v-select  :items="states" label="Select Semester"  hint="What are the target regions" persistent-hint></v-select>
                <v-select  :items="states" label="Select Shift"  hint="What are the target regions" persistent-hint></v-select>
            </v-card-text>
        </v-card>
        <v-btn color="primary" @click="e6 = 3">Continue</v-btn>
        <v-btn text>Cancel</v-btn>
    </v-stepper-content>

    <v-stepper-step :complete="e6 > 3" step="3">Due Date | Reference Document</v-stepper-step>

    <v-stepper-content step="3">
        <v-card color="grey lighten-1" class="mb-12" height="200px"></v-card>
        <v-btn color="primary" @click="e6 = 4">Continue</v-btn>
        <v-btn text>Cancel</v-btn>
    </v-stepper-content>

</v-stepper>
</template>

<script>
import Vue from "vue";
import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
Vue.use(CKEditor);
export default {
    name: 'AssignNewAssignment',
    data() {
        return {
            states:['BSSC'],
            e6: 1,
            editor: ClassicEditor
        }
    },
}
</script>
