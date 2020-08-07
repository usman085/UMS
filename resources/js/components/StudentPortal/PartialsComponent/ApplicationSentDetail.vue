<template>
<div class="application-detail-content">
    <v-card class="mx-auto" max-width="95%">
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
                    <v-chip class="ma-2" color="green" v-if="application.status == 'Accepted'" text-color="white">{{application.status|capitalize}}</v-chip>
                        <v-chip class="ma-2" color="secondary" v-if="application.status == 'pending'" text-color="white">{{application.status|capitalize}}</v-chip>
                        <v-chip class="ma-2" color="danger" v-if="application.status == 'Reject'" text-color="white">{{application.status|capitalize}}</v-chip>
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
    </v-card>
</div>
<!--application-detail-content-->
</template>

<script>
export default {
    name: 'ApplicationSentDetail',
    created(){
        this.getApplicationDetail(this.$route.params.id);
    },
    data:function(){
        return{
            application:''
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
                    // this.items = res.data.applications;
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
.back-btn{
    padding-right:5px ;
}
.application-detail-content-title {
    font-size: 22px;
}

.sending-dept {
    font-weight: bold;
}
</style>
