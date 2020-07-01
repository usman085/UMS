<template>
<v-row justify="center">
    <v-dialog v-model="$store.state.NotificationTypeModal" persistent max-width="490">
        <v-card>
            <v-card-title class="headline">Select Notification Type
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <v-radio-group :mandatory="false" v-model="NotificationType" required>

                    <v-radio label="Send To All Student" value="Send To All Student"></v-radio>
                    <v-radio label="Send To All Teacher" value="Send To All Teacher"></v-radio>
                    <v-radio label="Both" value="Both"></v-radio>
                </v-radio-group>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="green darken-1" text @click="$store.dispatch('NotificationTypeModal')">Cancel</v-btn>
                <v-btn color="green darken-1" text @click="NotificationEditor()">Next</v-btn>

            </v-card-actions>
        </v-card>
    </v-dialog>
</v-row>
</template>

<script>
import EventBus from '../../../EventBus/eventBus'
export default {
    name: 'NotificationTypeModal',
    data() {
        return {
            NotificationType: 'Send To All ',
            dialog: true,

        }
    },
    methods: {
        NotificationEditor: function () {
            this.$store.dispatch('senderSelect', this.NotificationType);
            this.$store.dispatch('NotificationTypeModal');
            this.$store.dispatch('NotificationEditorModal');

        }
    }
}
</script>

<style scoped>
.headline {
    word-wrap: break-word;
}

.v-messages {
    height: 0 !important;
}
</style>
