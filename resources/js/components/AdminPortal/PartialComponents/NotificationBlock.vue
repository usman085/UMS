<template>
<div class="notification-block">
    <v-card>
        <v-card-title>
            <v-icon>mdi-bell</v-icon> Notifications
            <v-btn class="create-btn" @click="$store.dispatch('NotificationEditorModal')">Generate New Notification</v-btn>
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
                    <td>
                        <v-menu offset-y>
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn v-bind="attrs" v-on="on">
                                    <v-icon>mdi-dots-vertical</v-icon>
                                </v-btn>
                            </template>
                            <v-list>
                                <v-list-item @click="$store.dispatch('NotificationPreviewModal')">
                                    <v-list-item-title>Preview</v-list-item-title>
                                </v-list-item>
                                <v-list-item>
                                    <v-list-item-title>Edit</v-list-item-title>
                                </v-list-item>
                                <v-list-item>
                                    <v-list-item-title>Delete</v-list-item-title>
                                </v-list-item>
                            </v-list>
                        </v-menu>
                    </td>
                </tr>
            </template>
        </v-data-table>
    </v-card>

    <NotificationEditorModal />
    <NotificationPreviewModal />
</div>
</template>

<script>
import NotificationEditorModal from './NotificationEditorModal'
import NotificationPreviewModal from './NotificationPreviewModal';
export default {
    name: 'NotificationBlock',
    components: {
        NotificationEditorModal,
        NotificationPreviewModal
    },
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
                    sortable: false,

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
