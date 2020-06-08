<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="800px" style="overflow-y:hidden" class="modal-width">
      <v-card>
        <v-card-title>
          <span class="headline">Application</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="11" sm="11" md="11">
                <v-text-field label="Application Title*" class="application-title-field" value="Request For More Time" disabled="" required></v-text-field>
              </v-col>
               <v-col cols="11" sm="11" md="11">
                 <label>Application</label>
                     <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
               </v-col>
               
                    
            </v-row>
          </v-container>
          <small>*indicates required field</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" :disabled="loader" text @click="$store.dispatch('ApplicationRequestTimeModalToggle')">Close</v-btn>
          <v-btn color="blue darken-1" :disabled="loader" text @click="save()">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <Loader :dialog='loader'></Loader>
  </v-row>
</template>

<script>
import Vue from 'vue';
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import Loader from './LoaderComponent';
Vue.use( CKEditor );
  export default {
      name:'RequestTimeApplication',
      components:{Loader},
      data:function(){
        return{
                loader:false,
                editor: ClassicEditor,
                editorData: '<p><b>Dear Sir/Mam.</b></p>',
                editorConfig: {
                 
                    // The configuration of the editor.
                }
        };
      },
    computed:{
        dialog:function(){
             return this.$store.state.ApplicationRequestTimeModal;
        }
    },
    methods:{
      save(){
            this.loader=true;
          setTimeout(() => (this.loader = false), 5000)
      },
    }
  }
</script>

<style scoped>
.application-title-field{
    font-weight: bold;
}
</style>