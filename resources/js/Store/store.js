import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        SubmitAssignmentModal: false
    },
    mutations: {
        SubmitAssignmentModalToggle(state) {
            state.SubmitAssignmentModal = !state.SubmitAssignmentModal;
        }
    },
    actions: {
        SubmitAssignmentModalToggle(context) {
            context.commit('SubmitAssignmentModalToggle');
        }
    }
})

export default store;