<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon dark @click="$store.dispatch('CourseOutlinePageModalToggle')">
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-toolbar-title>Assignment Detail</v-toolbar-title>
          <v-spacer></v-spacer>
        </v-toolbar>
        <v-list  subheader>
          <v-subheader>Assignment Content Detail </v-subheader>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Assignment Title</v-list-item-title>
              <v-list-item-subtitle>Web Enginer Protype </v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Assignment Description</v-list-item-title>
              <p class="list-detail">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                   been the industry's standard dummy text ever since the 1500s, when an unknown printer took
                   a galley of type and scrambled it to make a type specimen book. It has survived not only
                    five centuries, but also the leap into electronic typesetting, remaining essentially
                    unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                    Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker
                     including versions of Lorem Ipsum. </p>
            </v-list-item-content>
          </v-list-item>
        </v-list>

        <v-divider></v-divider>
        <v-list three-line subheader>
          <v-subheader>General</v-subheader>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Subject</v-list-item-title>
              <v-list-item-subtitle>Software Engineering</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Teacher Name</v-list-item-title>
              <v-list-item-subtitle>Sir Danish</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Assign Date</v-list-item-title>
              <v-list-item-subtitle>Monday 20,2020</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
           <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Submit Date </v-list-item-title>
              <v-list-item-subtitle>Monday 26,2020</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
           <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Reference Documents</v-list-item-title>
              <div class="ref-doc-wrapper">
                  <span class="ref-doc">
                       <span class="file-name">Test-090.doc</span>
                       <span class="download-file"><v-icon>mdi-arrow-collapse-down</v-icon></span>
                  </span>

              </div>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
  export default {
      name:'CourseOutlinePage',
    data () {
      return {
      }
    },
    computed:{
        dialog:function(){
            return this.$store.state.CourseOutlinePageModal;
        }
    }
  }
</script>

<style scoped>
.ref-doc-wrapper{
    width: 50%;
}
.ref-doc{
    width: 50%;
    font-size: 11px;
    color: rgba(0, 0, 0, 0.6);
    padding:5px;
    background:rgba(200, 200, 200, 1);
    font-weight: bold;
}
.list-detail{
    color: rgba(0, 0, 0, 0.6);
    line-height: 1.2;
    font-size: 0.875rem;
}
.download-file{
   text-align: right;
   font-size: 11px;
   padding-left: 10px;
   padding-right: 5px;
}
.mdi-arrow-collapse-down,.mdi-arrow-collapse-down:hover{
   text-align: right;
   cursor: pointer;
   font-size: 15px;
   font-weight: bold;
}
</style>
