<template>
<v-simple-table>
    <template v-slot:default>
        <thead>
            <tr>
                <th class="text-left">id</th>
                <th class="text-left">Name</th>
                <th class="text-left">FeedBack</th>
                <th class="text-left">Rating</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in items" :key="item.name">
                <td>{{ item.id }}</td>
                <td>{{ item.name }}</td>
                <td v-html="item.description"></td>
                <td>{{ item.rating }}</td>
            </tr>
        </tbody>
    </template>
</v-simple-table>
</template>

<script>
export default {
    name: 'feedBackView',
    data() {
        return {
            items: [

            ],
        }
    },
    created() {
        axios.get('http://localhost:8000/api/feedbackView')
            .then(response => this.items = response.data);
    }
}
</script>

<style scoped>
td {
    border: 1px solid #eee;
}
</style>
