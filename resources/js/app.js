require('./bootstrap');
import Vue from 'vue';
import vuetify from './vuetify';
import router from './router/router';
import store from './Store/store';
//


import MainAppComponent from './components/MainComponent';

Vue.component('appstudentportal', require('./components/StudentPortal/AppStudentComponent').default); //Root Component

Vue.filter('capitalize', function(value) {
    if (!value) return ''
    value = value.toString()
    return value.charAt(0).toUpperCase() + value.slice(1)
})

new Vue({
    el: '#app',
    vuetify,
    store,
    router,
    components: {
        'appcomponent': MainAppComponent
    }

});