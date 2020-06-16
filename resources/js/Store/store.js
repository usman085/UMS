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
        SubmitAssignmentModal: false,
        ApplicationRequestTimeModal: false,
        AssignmentDetailPageModal: false,
        CourseOutlinePageModal: false,
        BadWordModal: false
    },
    //  *** Mutations Function
    mutations: {
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
        }

    },
    // *** Action Functions
    actions: {
        BadWordModalToggle(context) {
            context.commit('BadWordModalToggle');
        },
        SubmitAssignmentModalToggle(context) {
            context.commit('SubmitAssignmentModalToggle');
        },
        ApplicationRequestTimeModalToggle(context) {
            context.commit('ApplicationRequestTimeModalToggle');
        },
        AssignmentDetailPageModalToggle(context) {
            context.commit('AssignmentDetailPageModalToggle');
        },
        CourseOutlinePageModalToggle(context) {
            context.commit('CourseOutlinePageModalToggle');
        }
    }
})


// *** Export Store Variable -- Store Object
export default store;