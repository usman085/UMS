<template>
<v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="800px" style="overflow-y:hidden" class="modal-width">
        <v-card>
            <v-card-title>
                <span class="headline">Assignment Submission</span>
            </v-card-title>
            <v-card-text>
                <v-container>
                    <v-row>
                        <v-col cols="11" sm="11" md="11">
                            <v-text-field label="Assignment Title*" required></v-text-field>
                        </v-col>

                        <v-col cols="11" sm="11" md="11">
                            <v-file-input v-model="files" color="deep-purple accent-4" counter label="File input" multiple placeholder="Select your files" prepend-icon="mdi-paperclip" outlined :show-size="1000">
                                <template v-slot:selection="{ index, text }">
                                    <v-chip v-if="index < 2" color="deep-purple accent-4" dark label small>
                                        {{ text }}
                                    </v-chip>

                                    <span v-else-if="index === 2" class="overline grey--text text--darken-3 mx-2">
                                        +{{ files.length - 2 }} File(s)
                                    </span>
                                </template>
                            </v-file-input>
                        </v-col>

                    </v-row>
                </v-container>
                <small>*indicates required field</small>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" :disabled="loader" text @click="$store.dispatch('SubmitAssignmentModalToggle')">Close</v-btn>
                <v-btn color="blue darken-1" :disabled="loader" text @click="save()">Save</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
    <Loader :dialog='loader'></Loader>
</v-row>
</template>

<script>
import Loader from './LoaderComponent';

export default {
    name: 'SubmitAssignment',
    components: {
        Loader
    },
    data: function () {
        return {
            loader: false,
            files: []
        };
    },
    computed: {
        dialog: function () {
            return this.$store.state.SubmitAssignmentModal;
        }
    },
    methods: {
        save() {
            this.loader = true;
            setTimeout(() => (this.loader = false), 5000)
        },
    }
}
</script>

<style scoped>

</style>
