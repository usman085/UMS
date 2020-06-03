<template>

<login></login>

</template>


<script>
import login from './StudentComponents/LoginComponent/LoginComponent';

    export default {
         components:{login},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
