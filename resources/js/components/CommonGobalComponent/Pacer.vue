<template>
 <div class="text-center">
        <v-overlay :value="$store.state.overlay">
            <v-progress-circular indeterminate size="64"></v-progress-circular>
            <p>{{ message }}</p>
        </v-overlay>
    </div>
</template>

<script>
export default{
    props:['message'],
    name:'pacer'

}
</script>


