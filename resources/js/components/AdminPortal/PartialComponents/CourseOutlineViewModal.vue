<template>
  <div>
    <v-row justify="center">
      <v-dialog
        v-model="$store.state.CourseOutlineView"
        fullscreen
        hide-overlay
        transition="dialog-bottom-transition"
      >
        <v-card>
          <v-toolbar dark color="primary">
            <v-btn icon dark @click="$store.dispatch('CourseOutlineView')">
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title>Scheme Of Studies</v-toolbar-title>
            <v-spacer></v-spacer>
            <div>
              <v-btn @click="editCourseOutline()">Edit Course Outline</v-btn>
            </div>
          </v-toolbar>
          <template v-if="course.course_outline">
            <v-list>
              <v-list-item>
                <v-list-item-content>
                  <v-list-item-title>
                    <span>Course Name</span>
                    : {{course.course_title}}
                  </v-list-item-title>
                  <v-list-item-title>
                    <span>Structure: Lectures: {{ courseDetailOutline.lectures }}, Labs: {{ courseDetailOutline.labs }} Credit Hours: {{course.credit_hours}}</span>
                  </v-list-item-title>

                  <v-list-item-title>Prerequisites: {{ courseDetailOutline.prerequisite }}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-list>

            <v-divider></v-divider>
            <div class="outline-wraper" v-html="courseDetailOutline.course_outline"></div>
          </template>

          <template v-else>
            <div class="add-outline-block">
              <h4 class="text-center">Still No any</h4>
            </div>
          </template>
        </v-card>
      </v-dialog>
    </v-row>

    <EditCourseOutlineModal :courseDetailOutline="courseDetailOutline" :course="course"></EditCourseOutlineModal>
  </div>
</template>

<script>
import EditCourseOutlineModal from "./EditCourseOutlineModal";

export default {
  props: ["course", "courseDetailOutline"],
  name: "CourseOutlineViewModal",
  components: {
    EditCourseOutlineModal
  },
  methods: {
    editCourseOutline() {
      this.$store.dispatch("EditCourseOutlineModalToggle");
    }
  },
  data() {
    return {};
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