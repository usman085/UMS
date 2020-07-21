<template>
<div class="time-table-wrapper">
    <v-card max-width="96%">
        <v-card-title>
            Time Tables
            <v-btn class="create-btn" @click="createTimeTable()">Create New Time Table</v-btn>
        </v-card-title>
        <v-card-subtitle>All Department of Semester Time Table is here</v-card-subtitle>
        <v-card-text>
            <v-simple-table>
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">Program</th>
                            <th class="text-left">Semester</th>
                            <th class="text-left">Shift</th>
                            <th class="text-left">Status</th>
                            <th class="text-left">Created At</th>
                            <th class="text-left">Modify At</th>
                            <th class="text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-if="$store.state.allTimeTable.length > 0">
                            <tr v-for="timeTable in $store.state.allTimeTable " :key="timeTable.id">
                                <v-tooltip bottom>
                                    <template v-slot:activator="{ on, attrs }">
                                        <td v-bind="attrs" v-on="on">{{ timeTable.program.program_short_title }}</td>
                                    </template>
                                    <span>{{timeTable.program.program_title}}</span>
                                </v-tooltip>

                                <td>{{ timeTable.semester | numberToNth }}</td>
                                <td>{{ timeTable.shift.shift}}</td>

                                <td>
                                    <v-chip v-if="timeTable.status" color="green" class="status-chip">Public</v-chip>
                                    <v-chip v-else color="warn" class="status-chip">Private</v-chip>
                                </td>
                                <td>{{ timeTable.created_at }}</td>
                                <td>{{ timeTable.updated_at }}</td>
                                <td>
                                    <v-menu offset-y>
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-icon color="primary" v-bind="attrs" v-on="on">mdi-dots-vertical</v-icon>
                                        </template>
                                        <v-list>
                                            <v-list-item :to="{name :'PreviewTimeTable', params: { id:timeTable.id,slug:timeTable.program.program_title } }">
                                                <v-list-item-title>Preview</v-list-item-title>
                                            </v-list-item>
                                            <v-list-item :to="{name:'EditTimeTable'}">
                                                <v-list-item-title>Modify</v-list-item-title>
                                            </v-list-item>
                                            <v-list-item @click="changeStatus(timeTable.id,timeTable.status)">
                                                <v-list-item-title>Change Status</v-list-item-title>
                                            </v-list-item>
                                            <v-list-item>
                                                <v-list-item-title>Delete</v-list-item-title>
                                            </v-list-item>
                                        </v-list>
                                    </v-menu>
                                </td>
                            </tr>
                        </template>
                        <tr v-else>
                            <td colspan="7" class="text-center">
                                <template v-if="message">

                                    <v-progress-circular indeterminate color="primary"></v-progress-circular>
                                </template>
                                <template v-else>No Data Found!</template>
                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-card-text>
    </v-card>
     <v-snackbar
      v-model="snackbar">
      {{ text }}
      <template v-slot:action="{ attrs }">
        <v-btn
          color="primary"
          text
          top
          right
          text-color="white"
          v-bind="attrs"
          @click="snackbar = false"
        >
          Close
        </v-btn>
      </template>
    </v-snackbar>
</div>
</template>
 
<script>
export default {
    name: "AllTimeTable",
    data() {
        return {
            message: true,
            snackbar:false,
            text:''
        }
    },
    computed: {
        userAuth: function () {
            return cryptoJSON.decrypt(JSON.parse(localStorage.getItem("adminLogin")), "ums");
        },
    },
    methods: {
        createTimeTable: function () {
            this.$router.push({
                name: "createTimeTable"
            });
        },
        changeStatus:function(id,status){
             // Headers are required for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            axios.post(process.env.MIX_APP_URL+'/time-table-status',{'id':id,'status':status},{headers:headers})
            .then(res=>{
                this.snackbar=true;
                this.text='Time Table Change Successfully'
                this.getAllTimeTable();
            })
            .catch(err=>err);
        },
        getAllTimeTable: function () {
            // Headers are required for authentication
            let headers = {
                "Content-Type": "application/json",
                Authorization: "Bearer  " + this.userAuth.token
            };
            // sending request to Api Route
            axios.post(process.env.MIX_APP_URL + '/get-all-time-table', "", {
                    headers: headers
                })
                .then((res) => {
                    console.log(res);
                    this.$store.dispatch("timeTable", res.data.timeTables);
                    this.message = false;
                })
                .catch(err => {});
        }
    },
    mounted() {
        this.getAllTimeTable();
    }
};
</script>

<style scoped>
.create-btn {
    position: absolute;
    float: right;
    right: 10px;
}

.status-chip {
    color: white;
}
</style>
