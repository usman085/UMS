<template>
    <div class="application-form-wrapper">
        <v-container>
           <v-row>
               <h3 class="application-head">Application Form</h3>

               
               <v-col cols="11">
          <v-autocomplete
            v-model="values"
            :items="items"
            color="primary"
            chips
            
            label="To"
            multiple
            solo
          ></v-autocomplete>
        </v-col>

               


               <v-col cols="11">
                   <v-text-field  :counter="25"  label="Application Title*" required></v-text-field>
               </v-col>

                <v-col cols="11" sm="11" md="11">
                 <label>Application</label>
                     <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
               </v-col>
             <v-row>
                 <v-col cols="11" sm="12" md="12">
                    <div class="my-2">
                          <v-btn color="primary">Submit</v-btn>
                     </div>
                 </v-col>
             </v-row>
              
           </v-row>

        </v-container>
     
    </div>
</template>

<script>
import Vue from 'vue';
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
Vue.use( CKEditor );
export default {
    name:'composeApplication',
    data(){
        return{
             editor: ClassicEditor,
                editorData: '<p><b>Dear Sir/Mam.</b></p>',
                items: ['Admin', 'Account Office', 'HOD', 'Libray'],
      values: [],
      value: null,
                editorConfig: {
                 
                    // The configuration of the editor.
                }
    }
    }
}
</script>

<style>
.application-head{
    text-align: center;
}
.my-2{
    margin: 0 10px;
}
</style>