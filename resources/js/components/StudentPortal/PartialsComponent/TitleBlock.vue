<template>
<div class="title-wrapper">
   
        <v-card-title>{{ titleName }}</v-card-title>
        <v-card-subtitle>{{ subtitle }}</v-card-subtitle>
   
</div>
<!--title-wrapper-->
</template>

<script>
export default {
    name: "TitleBlock",
    props: ["titleName", "subtitle"]
};
</script>

<style scoped>
.v-application .blue--text {
    color: #2e87ce !important;
    caret-color: #2196F3 !important;
}
</style>
