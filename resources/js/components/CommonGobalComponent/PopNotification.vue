<template>
<!-- <v-snackbar v-model="$store.state.PopNotification" :multi-line="multiLine">
        {{ text }}

        <template v-slot:action="{ attrs }">
            <v-btn color="primary" text v-bind="attrs" @click="$store.dispatch('PopNotification')">
                Close
            </v-btn>
        </template>
    </v-snackbar> -->

<v-alert   class="notification-alert" max-width="35%" shaped prominent v-model="$store.state.PopNotification" border="left" close-text="Close Alert" color="deep-purple accent-4" dark dismissible>
    Aenean imperdiet. Quisque id odio. Cras dapibus. Pellentesque ut neque. Cras dapibus.

    Vivamus consectetuer hendrerit lacus. Sed mollis, eros et ultrices tempus, mauris ipsum aliquam libero, non adipiscing dolor urna a orci. Sed mollis, eros et ultrices tempus, mauris ipsum aliquam libero, non adipiscing dolor urna a orci. Curabitur blandit mollis lacus. Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo.
</v-alert>
</template>

<script>

export default {
    name: 'PopNotification',
    data: () => ({
        multiLine: true,
        snackbar: false,
        text: 'I\'m a multi-line snackbar.kijnhbjnhbhjijnhbhjijnhbhjijnh',
    }),
}
</script>

<style scoped>
.notification-alert{
    position:absolute;
    bottom: 10px;
    right: 0;
    z-index: 1111;
}
</style>
