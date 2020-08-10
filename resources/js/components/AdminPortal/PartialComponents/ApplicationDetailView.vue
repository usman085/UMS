<template>
<div class="application-detail-content">
    <v-card class="mx-auto" max-width="95%">
        <v-card-title>
            <v-icon class="back-arrow" @click="$router.push({name:'AdminApplicationInbox'})">mdi-arrow-left-bold</v-icon>
            Request For Time
            <v-spacer></v-spacer>
            <v-menu offset-y>
                <template v-slot:activator="{ on, attrs }">
                    <v-btn color="primary" dark v-bind="attrs" v-on="on">
                        Action
                    </v-btn>
                </template>
                <v-list>
                    <v-list-item @click="dialog = true">
                        <v-list-item-title>Status</v-list-item-title>
                    </v-list-item>
                    <v-list-item @click="forwardApplication=true">
                        <v-list-item-title>Forward</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-card-title>
        <v-card-text>
            <div>
                <p>
                    From: M Usman Khan | Monday 20,2020
                </p>

            </div>
            <p class="application-detail-content-title">
                Application Content
            </p>

            <div class="text--primary">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,

                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </div>
        </v-card-text>
    </v-card>
    <!-- modal for status -->
    <div class="text-center">
        <v-dialog v-model="dialog" width="700">
            <v-card class="application-replay">
                <v-card-title class="headline" primary-title>
                    Application
                    <v-spacer></v-spacer>
                    <v-icon @click="dialog = false">mdi-close</v-icon>
                </v-card-title>

                <v-card-text>
                   <div class="descption-content">
                        <span class="descripton-head">Application Message.</span>
                        <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
                    </div>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary"  @click="dialog = false">
                        Accept
                    </v-btn>
                    <v-btn color="red" class="reject" @click="dialog = false">
                        Reject
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>

    <!-- Modal for status -->


    <!-- modal for status -->
    <div class="text-center">
        <v-dialog v-model="forwardApplication" width="700">
            <v-card class="application-replay">
                <v-card-title class="headline" primary-title>
                   Forward Application
                    <v-spacer></v-spacer>
                    <v-icon @click="forwardApplication = false">mdi-close</v-icon>
                </v-card-title>

                <v-card-text>
                    <v-container>
                        <v-row>
                            <v-col cols="12">
                                <v-select label="Forward To" :items="forwardto"></v-select>
                            </v-col>
                        </v-row>
                    </v-container>
                   <div class="descption-content">
                        <span class="descripton-head">Application Message.</span>
                        <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
                    </div>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary"  @click="forwardApplication = false">
                     <v-icon>mdi-share</v-icon>   Forward
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>

    <!-- Modal for status -->

</div>
<!--application-detail-content-->
</template>

<script>
import Vue from 'vue'
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
Vue.use(CKEditor);
export default {
    name: 'ApplicationDetailView',
    created(){
        this.getApplicationDetail(this.$route.params.id);
    },
    data: function () {
        return {
            dialog: false,
              application:null,
            forwardto:['Account Department','libaray'],
            forwardApplication:false,
            editor: ClassicEditor,
            editorData: '',
            editorConfig: {
                // The configuration of the editor.
            },
        };
    },
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("adminLogin")),
                "ums"
            );
        }
    },
    methods:{
        getApplicationDetail:function(id){
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token,
            };
            axios.post(process.env.MIX_APP_URL + '/admin-application-detail',{'id':id}, {
                    headers: headers
                })
                .then(res => {
                  console.log(res);
                    this.application=res.data.application;
                  
                })
                .catch(err => {})
        }
    }

}
</script>

<style scoped>
.status-chip {
    font-weight: bold;
    float: right;
}
.reject{
    color: white;
}
.back-arrow {
    padding-right: 5px;
}

.application-detail-content {
    padding: 10px 0;
}
.application-replay{
    overflow-x: hidden;
}
.application-detail-content-title {
    font-size: 22px;
}

.sending-dept {
    font-weight: bold;
}
.descripton-head {
    padding: 5px 0;
}
.ck {
    padding: 10px 0 !important;
}


.descption-content {
    padding: 10px;
}
</style>
