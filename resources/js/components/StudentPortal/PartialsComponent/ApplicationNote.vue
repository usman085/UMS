<template>
<v-row justify="center">
    <v-dialog v-model="dialog" max-width="490">
        <v-card v-if="data">
           
            <v-card-title class="headline">Additional Note Regarding Application </v-card-title>
            <v-divider></v-divider>
            <v-card-text v-if="data.application_note ">
                Reply:<span v-html="data.application_note.note"></span>
            </v-card-text>
             <v-card-text v-else>
               Nothing to show
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="green darken-1" text @click="close()">
                    OK!
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</v-row>
</template>

<script>
import EventBus from '../../../EventBus/eventBus';
export default {
    props: ['dialog','data'],
    name: 'ApplicationNote',
    methods: {
        close: function () {
                EventBus.$emit('noteClose');
        }
    }
}
</script>
