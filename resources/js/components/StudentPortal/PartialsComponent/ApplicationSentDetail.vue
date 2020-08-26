<template>
<div class="application-detail-content">
    <v-card class="mx-auto" max-width="95%">
        <template v-if="application != null">
        <v-card-title>
            <v-icon class="back-btn" @click="$router.push({name:'ApplicationInbox'})">mdi-arrow-left</v-icon>
             {{ application.application_title|capitalize }}
             </v-card-title>
        <v-card-text>
            <div>
                <span>
                    To :
                    <v-chip class="sending-dept">
                        Admin Department
                    </v-chip>
                </span>
                <span class="status-chip">
                   <v-chip class="ma-2" color="green" v-if="application.status == 'Accepted'" text-color="white">{{application.status|capitalize}}
                                 <v-icon class="note-btn" @click="noteMsg()">mdi-note</v-icon>
                            </v-chip>
                            <v-chip class="ma-2" color="secondary" v-if="application.status == 'pending'" text-color="white">{{application.status|capitalize}}</v-chip>
                            <v-chip class="ma-2" color="danger" v-if="application.status == 'Reject'" text-color="white">{{application.status|capitalize}}
                                  <v-icon class="note-btn" @click="noteMsg()">mdi-note</v-icon>
                            </v-chip>
                </span>
                <p>
                    Submit Date: {{application.created_at}}
                </p>

            </div>
            <p class="application-detail-content-title">
                Application Content
            </p>

            <div class="text--primary" v-html="application.application_content">
                
            </div>
        </v-card-text>
        </template>
        <template v-else>
             <div  class="text-center loading">
                    <v-progress-circular indeterminate color="primary" size="50"></v-progress-circular>
                    <p>Loading....</p>
                </div>
        </template>
    </v-card>
     <ApplicationNote :dialog="dialog"/>
</div>
<!--application-detail-content-->
</template>

<script>
import EventBus from '../../../EventBus/eventBus';
import ApplicationNote from './ApplicationNote';
export default {
    name: 'ApplicationSentDetail',
    created(){
         EventBus.$on('noteClose',()=>{
                this.dialog=false;
        })
        this.getApplicationDetail(this.$route.params.id);
    },
    components:{ApplicationNote},
    data:function(){
        return{
               dialog:false,
            application:null
        }
    },
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("studentLogin")),
                "ums"
            );
        }
    },
    methods:{
        noteMsg:function(){
            this.dialog=true;
        },
        getApplicationDetail:function(id){
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token,
            };
            axios.post(process.env.MIX_APP_URL + '/all-application-detail',{'id':id}, {
                    headers: headers
                })
                .then(res => {
                  
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

.application-detail-content {
    padding: 10px 0;
}
.loading {
    margin: 20px 0;
}
.back-btn{
    padding-right:5px ;
}
.note-btn{
    margin-left: 10px;
}
.application-detail-content-title {
    font-size: 22px;
}

.sending-dept {
    font-weight: bold;
}
</style>
