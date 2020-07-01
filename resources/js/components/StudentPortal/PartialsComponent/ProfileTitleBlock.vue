<template>
<v-container>
    <v-row>
        <v-card class="mx-auto float-left" width="100%" color="indigo">
            <v-row>
                <v-col align-self="start" class="pa-0 ml-3" cols="12">
                    <v-avatar class="profile" color="grey" size="164" tile>
                        <v-img src="https://cdn.vuetifyjs.com/images/profiles/marcus.jpg"></v-img>
                    </v-avatar>
                </v-col>
                <v-col class="py-0">
                    <v-list-item color="rgba(0, 0, 0, .4)" dark>
                        <v-list-item-content>
                            <v-list-item-title class="title">Marcus Obrien</v-list-item-title>
                            <v-list-item-subtitle>Fall-17 BS-SE</v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>
                </v-col>
            </v-row>
        </v-card>
    </v-row>
</v-container>
</template>

<script>
export default {
    name: "ProfileTitleBlock"
};
</script>
