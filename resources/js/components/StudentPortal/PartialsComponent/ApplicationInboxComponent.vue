<template>
<v-card max-width="100%" class="mx-auto">
    <v-list three-line>
        <template v-if="items.data">
            <template v-for="(item, index) in items.data">
                <v-list-item :key="item.id">
                    <v-list-item-avatar>
                        <span class="tag-badge">
                            <v-icon>mdi-application</v-icon>
                        </span>
                    </v-list-item-avatar>

                    <v-list-item-content>
                        <router-link :to="{name:'ApplicationDetail',params: { 'id': item.id } }" class="application-content">
                            <v-list-item-title>{{ item.application_title | capitalize  }}</v-list-item-title>
                            <v-list-item-subtitle v-html="item.application_content.slice(0, 125)"></v-list-item-subtitle>
                        </router-link>
                        <span class="application-status">
                            <v-chip class="ma-2" color="green" v-if="item.status == 'Accepted'" text-color="white">{{item.status|capitalize}}
                            </v-chip>
                            <v-chip class="ma-2" color="secondary" v-if="item.status == 'pending'" text-color="white">{{item.status|capitalize}}</v-chip>
                            <v-chip class="ma-2" color="red" v-if="item.status == 'Rejected'" text-color="white">{{item.status|capitalize}}
                            </v-chip>
                        </span>
                    </v-list-item-content>

                </v-list-item>
                <v-divider :key="index" :inset="true"></v-divider>

            </template>
            <div class="text-center">
                <v-pagination v-model="page" circle :length="items.last_page" @input="getApplications"></v-pagination>
            </div>
        </template>
        <template v-else>
            <div v-if="!loading" class="text-center loading">
                No Application Found 😟 !
            </div>
            <div v-else class="text-center loading">
                <v-progress-circular indeterminate color="primary" size="50"></v-progress-circular>
                <p>Loading....</p>
            </div>
        </template>
    </v-list>
    <ApplicationNote :dialog="dialog"/>
</v-card>

</template>

<script>
import EventBus from '../../../EventBus/eventBus';
import ApplicationNote from './ApplicationNote';
export default {
    name: 'ApplicationInbox',
    components:{ApplicationNote},
    data: () => ({
        page: 1,
        loading: true,
        dialog:false,
        items: [],
    }),
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("studentLogin")),
                "ums"
            );
        }
    },
    mounted() {
        this.getApplications();
        EventBus.$on('noteClose',()=>{
                this.dialog=false;
        })
    },
    methods: {
        noteMsg:function(){
            this.dialog=true;
        },
        getApplications: function (page = 1) {
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token,
            };
            axios.post(process.env.MIX_APP_URL + '/all-applications?page=' + page, '', {
                    headers: headers
                })
                .then(res => {
                    this.items = res.data.applications;
                    this.loading = false;
                })
                .catch(err => {})
        }
    }
}
</script>

<style scoped>
.application-status {
    text-align: right;
    font-weight: bold;
}

.application-content:hover,
.application-content {
    text-decoration: none;
}
.note-btn{
    margin-left: 10px;
}
.loading {
    margin: 20px 0;
}

.tag-badge {
    padding: 8px 12px;
    color: white;
    background: #d6cfcf;
    border-radius: 50%;
}
</style>
