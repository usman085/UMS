<template>
<v-row justify="center">
    <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
        
            <v-card>
        
                <v-toolbar dark color="primary">
                    <v-btn icon dark @click="$store.dispatch('CourseOutlinePageModalToggle')">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                    <v-toolbar-title>Scheme Of Studies</v-toolbar-title>
                    <v-spacer></v-spacer>
                </v-toolbar>
                    <div v-if="outlineData != null ">
                <v-list subheader>
                    <v-list-item>
                        <v-list-item-content class="text-center">
                            <v-list-item-title>Semester 1</v-list-item-title>
                            <v-list-item-subtitle>BSSE-Fall-17</v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>
            <v-item-group>
            <v-list>
              <v-list-item>
                <v-list-item-content>
                  <v-list-item-title class=" mb-3">
                    <span class="mr-2">Course Name :</span>
                    {{courseDetail.course_title}}
                  </v-list-item-title>
                    <v-list-item-title  class=" mb-3">   
                    <span class="mr-2">Prerequisites: </span>
                    {{ outlineData.prerequisite }}
                    </v-list-item-title>  
                  <v-list-item-title class=" mb-3">
                    <span class="mr-2">Credit Hours: </span>
                   {{courseDetail.course_code}}
                  </v-list-item-title>
                  <v-list-item-title class=" mb-3">
                    <span class="mr-2 ">Lectures:</span>
                    {{ outlineData.lectures }}
                  </v-list-item-title>

                   <v-list-item-title class=" mb-3">
                    <span class="mr-2 "> Labs:</span>
                    {{ outlineData.labs }} 
                  </v-list-item-title>
 

                
                </v-list-item-content>
              </v-list-item>
            </v-list>
            </v-item-group>
                </v-list>

                <v-divider></v-divider>
                <v-list three-line subheader>
                    <v-list-item>
                        <v-list-item-content>
                       <div class="outline-wraper" v-html="outlineData.course_outline"></div> 
                        </v-list-item-content>
                    </v-list-item>
                 
                </v-list>
                </div>
        <div v-else>
            <span>No Data</span>
        </div>
            </v-card>
        
   
    </v-dialog>
</v-row>
</template>

<script>
export default {
    name: "CourseOutlinePage",
    props: ['outlineData','courseDetail'],
    data() {
        return {

        };
    },
    computed: {
        dialog: function () {
            return this.$store.state.CourseOutlinePageModal;
        }
    }
};
</script>

<style scoped>
.v-list--three-line .v-list-item .v-list-item__subtitle,
.v-list-item--three-line .v-list-item__subtitle {
    white-space: initial;
    -webkit-line-clamp: unset !important;
    -webkit-box-orient: vertical;
    display: -webkit-box;
}

.v-list-item__title,
.v-list-item__subtitle {
    flex: 1 1 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: unset !important;
}
</style>
