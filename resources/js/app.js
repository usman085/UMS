require('./bootstrap');
import Vue from 'vue';
import vuetify from './vuetify';
import router from './router/router';
import store from './Store/store';
//


import Main from './components/MainComponent';

Vue.component('appstudentportal', require('./components/StudentPortal/AppStudentComponent').default); //Root Component



new Vue({
    el: '#app',
    vuetify,
    store,
    router,
    components: {
        Main,
    }

});