<template>
<div>
    <v-dialog scrollable v-model="$store.state.NotificationPreviewModal" max-width="800">
        <v-card>
            <v-card-title>Notificatin
                <v-spacer></v-spacer>
                <v-icon @click="$store.dispatch('NotificationPreviewModal')">mdi-close</v-icon>
            </v-card-title>
            <v-card-subtitle>
                <p>
                    <v-icon>mdi-share</v-icon>Students | Monday 22,2020
                </p>
                <v-divider></v-divider>
            </v-card-subtitle>

            <v-card-text>
                <div class="notification-content">
                    <h4><b>Notification Message</b></h4>
                    <span class="notification-content-block">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

                        Why do we use it?
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

                    </span>
                </div>
            </v-card-text>
        </v-card>
    </v-dialog>
</div>
</template>

<script>
export default {
    name: 'NotificationPreviewModal'
}
</script>
