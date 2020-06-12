import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        SubmitAssignmentModal: false,
        ApplicationRequestTimeModal: false,
        AssignmentDetailPageModal: false,
        BadWordModal: false
    },
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
        }
    },
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
        }
    }
})

export default store;