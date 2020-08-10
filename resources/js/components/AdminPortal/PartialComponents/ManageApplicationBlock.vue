<template>
<v-card max-width="100%" class="mx-auto">
    <v-card-title>Application</v-card-title>
    <v-card-subtitle>All Application Here</v-card-subtitle>
    <v-list three-line>
        <template v-if="items.length > 0">
            <template v-for="(item, index) in items">

                <v-list-item :key="item.id">
                    <v-list-item-avatar>
                        <span class="tag-badge">
                            <v-icon>mdi-application</v-icon>
                        </span>
                    </v-list-item-avatar>

                    <v-list-item-content>
                        <router-link :to="{name:'ViewApplication',params: { id: item.id,slug:item.application_title } }" class="application-content">
                            <v-list-item-title>{{ item.application_title | capitalize  }}</v-list-item-title>
                            <v-list-item-subtitle v-html="item.application_content.slice(0, 125)"></v-list-item-subtitle>
                        </router-link>
                        <span class="application-status">
                            <v-chip class="ma-2" color="green" v-if="item.status == 'Accepted'" text-color="white">{{item.status|capitalize}}</v-chip>
                            <v-chip class="ma-2" color="secondary" v-if="item.status == 'pending'" text-color="white">{{item.status|capitalize}}</v-chip>
                            <v-chip class="ma-2" color="danger" v-if="item.status == 'Reject'" text-color="white">{{item.status|capitalize}}</v-chip>
                        </span>
                    </v-list-item-content>

                </v-list-item>
                <v-divider :key="index" :inset="true"></v-divider>
            </template>
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
</v-card>
</template>

<script>
export default {
    name: 'ManageApplicationBlock',
    data: () => ({
        items: [],
        loading:true
    }),
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(
                JSON.parse(localStorage.getItem("adminLogin")),
                "ums"
            );
        }
    },
    mounted() {
        this.getApplications();
    },
    methods: {
        getApplications: function () {
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token,
            };
            axios.post(process.env.MIX_APP_URL + '/all-admin-applications', '', {
                    headers: headers
                })
                .then(res => {
                    this.items = res.data.applications;
                    this.loading = false;
                  console.log(res);
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
</style>
