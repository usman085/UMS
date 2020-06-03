require('./bootstrap');
import Vue from 'vue';
import vuetify from './vuetify';
import router from './router';

//


import Main from './components/MainComponent';


new Vue({
    el: '#app',
    vuetify,
    router,
    components: {
        'main-component': Main
    }

});