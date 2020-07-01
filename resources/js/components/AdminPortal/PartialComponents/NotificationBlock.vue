<template>
<div class="notification-block">
    <v-card>
        <v-card-title>
            Notifications
            <v-btn class="create-btn" @click="$store.dispatch('NotificationTypeModal')">Generate New Notification</v-btn>
        </v-card-title>
        <v-card-subtitle>All Notifications are here</v-card-subtitle>
        <v-card-title>
                test
            <v-spacer></v-spacer>
            <v-text-field v-model="search" append-icon="mdi-magnify" label="Search Notifications" single-line hide-details></v-text-field>
        </v-card-title>
        <v-data-table :headers="headers" :items="notifications" :search="search">
            <template v-slot:item="row">
                <tr>
                    <td>{{row.item.notificationTitle}}</td>
                    <td>{{row.item.notificationMessage | trimString(60)}}</td>
                    <td>{{row.item.sendedTo}}</td>
                    <td>del</td>
                </tr>
            </template>
        </v-data-table>
    </v-card>
    <NotificationTypeModal/>
    <NotificationEditorModal/>
</div>
</template>

<script>
import NotificationTypeModal from './NotificationTypeModal';
import NotificationEditorModal from './NotificationEditorModal'
export default {
    name: 'NotificationBlock',
    components:{NotificationTypeModal,NotificationEditorModal},
    data() {
        return {
            search: '',
            headers: [{
                    text: 'Notification Title',
                    align: 'start',
                    sortable: true,
                    filterable: true,
                    value: 'notificationTitle',
                },
                {
                    text: 'Notification Message',
                    value: 'notificationMessage'
                },
                {
                    text: 'Sended To',
                    value: 'sendedTo'
                },
                {
                    text: 'Options',

                },
            ],
            notifications: [{
                    notificationTitle: 'Submit Fee',
                    notificationMessage: 'Kindly pay full fee of this semster',
                    sendedTo: 'Multiple',
                },
                {
                    notificationTitle: 'Leave Fee',
                    notificationMessage: 'Kindly pay full fee of this semster',
                    sendedTo: 'Multiple',
                },
            ],
        }
    },
}
</script>

<style scoped>
.create-btn {
    position: absolute;
    float: right;
    right: 10px;
}
</style>
