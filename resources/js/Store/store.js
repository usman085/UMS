// *** Import Vuex Instant
import Vuex from 'vuex';

// *** Import Vue  Instant
import Vue from 'vue';

// *** Passing Vuex To Vue Constructor
Vue.use(Vuex);

// *** VueX Object
// *** Store Variable

const store = new Vuex.Store({
    // *** State Variables
    state: {
        NotificationPreviewModal: false,
        SubmitAssignmentModal: false,
        ApplicationRequestTimeModal: false,
        AssignmentDetailPageModal: false,
        CourseOutlinePageModal: false,
        BadWordModal: false,
        CreateTimeTableModal: false,
        TimeTableDetailModal: false,
        AddProgramModal: false,
        AddCourseModal: false,
        NotificationEditorModal: false,
        senderSelect: '',
        overlay: false,
        days: [
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday"
        ],
        subjects: ["Eng", "urdu", "Math"],
        teachers: ["ijaz", "usman"],
        classRooms: ["cr2", "cr3"]
    },
    //  *** Mutations Function
    mutations: {
        overlay(state) {
            state.overlay = !state.overlay;
        },
        NotificationPreviewModal(state) {
            state.NotificationPreviewModal = !state.NotificationPreviewModal;
        },
        TimeTableDetailModal(state) {
            state.TimeTableDetailModal = !state.TimeTableDetailModal;
        },
        BadWordModalToggle(state) {
            state.BadWordModal = !state.BadWordModal;
        },
        SubmitAssignmentModalToggle(state) {
            state.SubmitAssignmentModal = !state.SubmitAssignmentModal;
        },
        ApplicationRequestTimeModalToggle(state) {
            state.ApplicationRequestTimeModal = !state.ApplicationRequestTimeModal;
        },
        AssignmentDetailPageModalToggle(state) {
            state.AssignmentDetailPageModal = !state.AssignmentDetailPageModal;
        },
        CourseOutlinePageModalToggle(state) {
            state.CourseOutlinePageModal = !state.CourseOutlinePageModal;
        },
        CreateTimeTableModal(state) {
            state.CreateTimeTableModal = !state.CreateTimeTableModal;
        },
        AddProgramModalToggle(state) {
            state.AddProgramModal = !state.AddProgramModal;
        },
        AddCourseModalToggle(state) {
            state.AddCourseModal = !state.AddCourseModal;
        },
        NotificationEditorModal(state) {
            state.NotificationEditorModal = !state.NotificationEditorModal;
        }
    },
    // *** Action Functions
    actions: {
        overlay(context) {
            context.commit('overlay');
        },
        NotificationPreviewModal(context) {
            context.commit('NotificationPreviewModal');
        },
        NotificationEditorModal(context) {
            context.commit('NotificationEditorModal');
        },
        TimeTableDetailModal(context) {
            context.commit("TimeTableDetailModal");
        },
        CreateTimeTableModal(context) {
            context.commit("CreateTimeTableModal");
        },
        BadWordModalToggle(context) {
            context.commit("BadWordModalToggle");
        },
        SubmitAssignmentModalToggle(context) {
            context.commit("SubmitAssignmentModalToggle");
        },
        ApplicationRequestTimeModalToggle(context) {
            context.commit("ApplicationRequestTimeModalToggle");
        },
        AssignmentDetailPageModalToggle(context) {
            context.commit("AssignmentDetailPageModalToggle");
        },
        CourseOutlinePageModalToggle(context) {
            context.commit("CourseOutlinePageModalToggle");
        },
        AddProgramModalToggle(context) {
            context.commit("AddProgramModalToggle");
        },
        AddCourseModalToggle(context) {
            context.commit("AddCourseModalToggle");
        }


    }
});


// *** Export Store Variable -- Store Object
export default store;