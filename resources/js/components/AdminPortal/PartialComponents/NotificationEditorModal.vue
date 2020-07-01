<template>
<v-dialog v-model="$store.state.NotificationEditorModal" persistent max-width="1000">
    <v-card>
        <v-card-title>Write New Notification</v-card-title>
        <v-card-subtitle>Wrtie New Notification</v-card-subtitle>
        <v-divider></v-divider>
        <v-card-text>
            <v-container>
                <v-row>
                    <v-col cols="11">
                        <v-text-field label="Notification Title"></v-text-field>
                    </v-col>
                    <v-col cols="11">
                        <label>Notification Message</label>
                        <div>
                            <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
                        </div>
                    </v-col>
                    <v-col cols="11">
                        <span>Send Type:
                            <v-chip >{{$store.state.senderSelect}}</v-chip>
                        </span>
                    </v-col>
                </v-row>
            </v-container>
        </v-card-text>
        <v-card-actions>
             <v-spacer></v-spacer>
           <v-btn color="green darken-1" text @click="$store.dispatch('NotificationEditorModal')">SEND</v-btn>
             <v-btn color="green darken-1" text>Cancel</v-btn>
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
            editor: ClassicEditor,
            editorData: '',
            editorConfig: {
                // The configuration of the editor.
            },
        }
    }
}
</script>
