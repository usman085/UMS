<template>

<login></login>

</template>


<script>
import login from './LoginComponent/LoginComponent';

    export default {
         components:{login},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
