<template>
    <div class="title-wrapper">
        <v-card
    max-width="100%"
    class="mx-auto"
  >
    <v-card-title>
      {{titleName}}
    </v-card-title>

    <v-card-subtitle>
      {{subTitle}}
    </v-card-subtitle>


       
  </v-card>
    </div><!--title-wrapper-->
</template>

<script>
export default{
    name:'TitleBlock',
    props:['titleName','subTitle']
}
</script>

<style scoped>

</style>