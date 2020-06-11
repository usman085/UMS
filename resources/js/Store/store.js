import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        SubmitAssignmentModal: false,
        ApplicationRequestTimeModal: false,
        AssignmentDetailPageModal: false
    },
    mutations: {
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