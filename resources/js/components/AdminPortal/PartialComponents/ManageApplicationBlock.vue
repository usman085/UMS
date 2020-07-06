<template>
<v-card max-width="100%" class="mx-auto">
    <v-card-title>Application</v-card-title>
    <v-card-subtitle>All Application Here</v-card-subtitle>
    <v-list three-line>
        <template v-for="(item, index) in items">
            <v-subheader v-if="item.header" :key="item.header" v-text="item.header"></v-subheader>

            <v-divider v-else-if="item.divider" :key="index" :inset="item.inset"></v-divider>

            <v-list-item v-else :key="item.title">

                <v-list-item-avatar>
                    <v-img :src="item.avatar"></v-img>
                </v-list-item-avatar>

                <v-list-item-content>
                    <router-link :to="{name:'ViewApplication',params: { id: id,slug:'bvfbvnfjwnvwflnjw' } }" class="application-content">
                        <v-list-item-title v-html="item.title "></v-list-item-title>
                        <v-list-item-subtitle v-html="item.subtitle"></v-list-item-subtitle>
                    </router-link>
                    <span class="application-status">
                        <v-chip class="ma-2" :color="item.color" text-color="white">{{item.status|capitalize}}</v-chip>
                    </span>
                </v-list-item-content>

            </v-list-item>
        </template>
    </v-list>
</v-card>
</template>

<script>
export default {
    name: 'ManageApplicationBlock',
    data: () => ({
        id: '3',
        items: [{
                header: 'Today'
            },
            {
                status: 'Accepted',
                color: 'green',
                avatar: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
                title: 'Brunch this weekend?',
                subtitle: "<span class='text--primary'>Ali Connors</span> &mdash; I'll be in your neighborhood doing errands this weekend. Do you want to hang out?",
            },
            {
                divider: true,
                inset: true
            },
            {
                status: 'Pending',
                color: 'secondary',
                avatar: 'https://cdn.vuetifyjs.com/images/lists/2.jpg',
                title: 'Summer BBQ <span class="grey--text text--lighten-1">4</span>',
                subtitle: "<span class='text--primary'>to Alex, Scott, Jennifer</span> &mdash; Wish I could come, but I'm out of town this weekend.",
            },
            {
                divider: true,
                inset: true
            },
            {
                avatar: 'https://cdn.vuetifyjs.com/images/lists/3.jpg',
                title: 'Oui oui',
                status: 'Accepted',
                color: 'green',
                subtitle: "<span class='text--primary'>Sandra Adams</span> &mdash; Do you have Paris recommendations? Have you ever been?",
            },
            {
                divider: true,
                inset: true
            },
            {
                avatar: 'https://cdn.vuetifyjs.com/images/lists/4.jpg',
                title: 'Birthday gift',
                status: 'reject',
                color: 'red',
                subtitle: "<span class='text--primary'>Trevor Hansen</span> &mdash; Have any ideas about what we should get Heidi for her birthday?",
            },
            {
                divider: true,
                inset: true
            },
            {
                status: 'pending',
                color: 'secondary',
                avatar: 'https://cdn.vuetifyjs.com/images/lists/5.jpg',
                title: 'Recipe to try',
                subtitle: "<span class='text--primary'>Britta Holt</span> &mdash; We should eat this: Grate, Squash, Corn, and tomatillo Tacos.",
            },
        ],
    }),
}
</script>

<style scoped>
.application-status {
    text-align: right;
    font-weight: bold;
}

.application-content:hover,
.application-content {
    text-decoration: none;
}
</style>
