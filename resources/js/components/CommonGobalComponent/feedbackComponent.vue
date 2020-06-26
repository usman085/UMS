<template>
    <div class="feed-back-form-wrapper">
        <v-card class="mx-auto" max-width="100%">
            <div class="form-wraper-title">
                <div class="card-title-box">
                    <v-card-title>
                        <span class="head-title">Send us your Feedback !</span>
                    </v-card-title>
                    <v-card-subtitle>
                        <p class="form-card-subtitle">
                            Do you have a suggestion or found some bugs ?
                        </p>
                        <p class="form-card-subtitle">
                            Let us know in the field below.
                        </p>
                    </v-card-subtitle>
                </div>
            </div>
            <!--form-wraper-title-->
          <v-form v-model="valid">
            <div class="form-rating">
                <div class="rating">
                    <span class="rating-head"
                        >How was your experiance?
                        <div class="rating-star">
                            <v-rating
                                v-model="rating"
                                :length="5"
                               
                                color="#0091ea"
                               
                                background-color="grey lighten-1"
                            ></v-rating>
                            <div>
                                <span class="caption text-uppercase"
                                    >Stars:</span
                                >
                                <span class="font-weight-bold">
                                    {{ rating }}
                                </span>
                            </div>
                        </div>
                    </span>
                </div>
                <!--rating-->
            </div>
            <!--form-rating-->
            
            <v-divider></v-divider>
          
            <div class="descption-box-wrapper">
                <v-container>
                <v-row>
                <v-col cols="12" sm="12">
                    <v-text-field label="Your Name" required  :rules="nameRules" @blur="checkWords(name)" v-model="name"
                        ></v-text-field>
                </v-col>
            </v-row>
            </v-container>
                <div class="descption-content">
                    <span class="descripton-head"
                        >Describe your experience here.</span
                    >
                    <ckeditor
                    
                     @blur="checkWords(editorData)" 
                        :editor="editor"
                        v-model="editorData"
                         :rules="nameRules"
                         required
                        :config="editorConfig"
                    ></ckeditor>
                </div>
                <!--descption-content-->
            </div>
            <!-- descption-box-wrapper -->
            <div class="my-2 feedback-button text-center">
                
                <v-btn color="primary" :disabled="!valid || badWordFind"  >Send Feedback</v-btn>
            </div>
            </v-form>
        </v-card>
        <badWord :badWords='badWordFiltered'/>
    </div>
    <!--feed-back-form-wrapper-->
</template>

<script>
import Vue from "vue";
import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import badWord from '../StudentPortal/PartialsComponent/BadWordAlert';
Vue.use(CKEditor);
export default {
    name: "feedback",
    components:{
        badWord
    },
    data: function() {
        return {
             nameRules: [
                 v => !!v || 'Name is required',
                 v => v.length <= 15 || 'Name must be less than 15 characters',
                ],
            badWordFiltered:'',
            valid:true,
            name:'',
            rating: 0,
            editor: ClassicEditor,
            editorData: "<p></p>",
            badWordFind:false,
            editorConfig: {
                // The configuration of the editor.
            }
        };
    },
    methods:{
        checkWords:function(data){
            var banned = ["lun","fuck","lora","phudi","bond","motherFucker"];
            let words=data.toLowerCase();
    		for (var i = 0; i < banned.length; i++) {
    			if (words.includes(banned[i])) {
                    this.badWordFiltered=banned[i]; 
                    this.$store.dispatch('BadWordModalToggle');
                    this.badWordFind=true;   
                    break;   
                }else{
                    this.badWordFind=false;
                }
    		}
        }
    }


};
</script>
<style scoped>
.ck {
    padding: 10px 0 !important;
}
.descripton-head {
    padding: 5px 0;
}
.descption-content {
    padding: 10px;
}
.feedback-button {
    padding: 18px 0;
}
.rating {
    padding: 15px 23px;
}
.rating-head {
    font-size: 18px;
}
.descption-box-wrapper {
    padding: 0 10px;
}
* {
    font-family: "Allerta";
}
.form-card-subtitle {
    color: white;
    margin-bottom: 0;
}
.form-wraper-title {
    padding: 10px;
    background: #0091ea;
}
.card-title-box {
    background: #0091ea;
}
.card-title-box {
    color: white;
}
</style>
