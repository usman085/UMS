<template>
<v-row justify="center">
    <v-dialog v-model="$store.state.CourseOutlineView" fullscreen hide-overlay transition="dialog-bottom-transition">
        <v-card>
            <v-toolbar dark color="primary">
                <v-btn icon dark @click="$store.dispatch('CourseOutlineView')">
                    <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Scheme Of Studies</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                    <template v-if="course.course_outline">
                        <v-btn dark text @click="editCourseOutline()">Edit</v-btn>
                    </template>
                    <template v-else>
                        <v-btn dark text @click="$store.dispatch('AssignOutlineModalToggle'),snackbar = true">Add</v-btn>
                    </template>
                </v-toolbar-items>
            </v-toolbar>
            <template v-if="course.course_outline">
                <v-list>
                    <v-list-item>
                        <v-list-item-content>
                            <v-list-item-title>
                                <span>Course Name</span>: {{course.course_title}}
                            </v-list-item-title>
                            <v-list-item-title>
                                <span>Structure: Lectures: {{courseDetailToOutline.lectures}}, Labs: {{courseDetailToOutline.labs}} Credit Hours: {{course.credit_hours}}</span>
                            </v-list-item-title>

                            <v-list-item-title>Prerequisites: {{courseDetailToOutline.prerequisite}}} </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>

                <v-divider></v-divider>
                <div class="outline-wraper" v-html="courseDetailToOutline.course_outline"></div>
            </template>

            <template v-else>
                <div class="add-outline-block">
                    <h4 class="text-center">Still No any </h4>
                </div>
            </template>
        </v-card>
        <AssignOutlineModal :course="course" :courseDetail="courseDetailToOutline" />
    </v-dialog>
</v-row>
</template>

<script>
// *** AssignOutlineModal
import AssignOutlineModal from "./AssignOutlineModal";
export default {
    props: ['course', 'courseDetailToOutline'],
    name: "CourseOutlineViewModal",
    components: {
        AssignOutlineModal
    },
    methods:{
        editCourseOutline:function(){
            this.courseDetail.prerequisite=this.courseDetailToOutline.prerequisite;
            this.courseDetail.lectures=this.courseDetailToOutline.lectures;
                 this.courseDetail.labs=this.courseDetailToOutline.labs,
                this.courseDetail.course_outline=this.courseDetailToOutline.course_outline,
                this.courseDetail.id=this.courseDetailToOutline.id;
            $store.dispatch('AssignOutlineModalToggle');
            
            }
    },
    data() {
        return {
            courseDetail: {
                prerequisite: '',
                lectures: '',
                labs: '',
                course_outline: '',
                //   course_id:this.course.id,
                id: ''
            },
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

.outline-wraper {
    padding: 18px;
}

.add-outline-block {
    position: absolute;
    left: 0;
    right: 0;
    top: 50%;
}
</style>
