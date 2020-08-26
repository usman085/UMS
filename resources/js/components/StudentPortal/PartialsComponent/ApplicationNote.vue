<template>
<v-row justify="center">
    <v-dialog v-model="dialog" max-width="490">
        <v-card>
            <v-card-title class="headline">Additional Note Regarding Application </v-card-title>
    <v-divider></v-divider>
            <v-card-text>
                Re: Your application Is reject due to kjb kbjk
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
    props: ['dialog'],
    name: 'ApplicationNote',
    methods: {
        close: function () {
                EventBus.$emit('noteClose');
        }
    }
}
</script>
