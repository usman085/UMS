<template>
<v-dialog scrollable v-model="$store.state.NotificationEditorModal" persistent max-width="800">
    <v-card>
        <v-card-title>Write New Notification</v-card-title>
        <v-card-subtitle>Wrtie New Notification</v-card-subtitle>
        <v-divider></v-divider>
        <v-card-text class="form-block">
            <v-form>
                <div class="descption-box-wrapper">
                    <v-container>
                        <v-row>
                            <v-col cols="12" sm="12">
                                <v-text-field label="NotificationTitle"></v-text-field>
                            </v-col>
                        </v-row>
                    </v-container>
                    <div class="descption-content">
                        <span class="descripton-head">Notification Description.</span>
                        <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
                    </div>
                    <!--descption-content-->
                    <v-container>
                        <v-row>
                            <v-col cols="12" sm="12">
                                <v-select :items="sendto" label="Send To"></v-select>
                            </v-col>
                        </v-row>
                    </v-container>
                </div>
                <!-- descption-box-wrapper -->

            </v-form>
        </v-card-text>
        <v-card-actions>
            <v-spacer></v-spacer>

            <div class="my-2 feedback-button text-center">

                <v-btn color="green darken-1" text @click="$store.dispatch('NotificationEditorModal')">SEND</v-btn>
                <v-btn color="green darken-1" text>Cancel</v-btn>
            </div>
        </v-card-actions>
    </v-card>
</v-dialog>
</template>

<script>
import Vue from 'vue'
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import EventBus from '../../../EventBus/eventBus';
Vue.use(CKEditor);
export default {
    name: 'NotificationEditorModal',
    data: function () {
        return {
            sendto: ['Students', 'Teachers', 'Both'],
            editor: ClassicEditor,
            editorData: '',
            editorConfig: {
                // The configuration of the editor.
            },
        }
    }
}
</script>

<style scoped>
.ck {
    padding: 10px 0 !important;
}

.form-block {
    overflow-x: hidden;
}

.descripton-head {
    padding: 5px 0;
}

.descption-content {
    padding: 10px;
}
</style>
