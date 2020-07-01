<template>
<div class="application-detail-content">
    <v-card class="mx-auto" max-width="95%">
        <v-card-title>Request For Time</v-card-title>
        <v-card-text>
            <div>
                <span>
                    To :
                    <v-chip class="sending-dept">
                        Admin
                    </v-chip>
                    <v-chip class="sending-dept">
                        HOD
                    </v-chip>
                </span>
                <span class="status-chip">
                    <v-chip class="ma-2 " color="green" text-color="white">{{'Accepted'|capitalize}}</v-chip>
                </span>
                <p>
                    Submit Date: Monday 12,2020
                </p>

            </div>
            <p class="application-detail-content-title">
                Application Content
            </p>

            <div class="text--primary">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,

                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </div>
        </v-card-text>
    </v-card>
</div>
<!--application-detail-content-->
</template>

<script>
export default {
    name: 'ApplicationSentDetail',

}
</script>

<style scoped>
.status-chip {
    font-weight: bold;
    float: right;
}

.application-detail-content {
    padding: 10px 0;
}

.application-detail-content-title {
    font-size: 22px;
}

.sending-dept {
    font-weight: bold;
}
</style>
