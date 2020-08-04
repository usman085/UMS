require('./bootstrap');
// *** Import Vue Instance
import Vue from 'vue';

// *** Import Vuetify
import vuetify from './vuetify';

// *** Import Root Router
import router from './router/router';

// *** Import Vuex Store
import store from './Store/store';

import Chart from './chart/chart';


// *** Import Root Component
// *** *** This Component Is responsible For All Components Rendering


import MainAppComponent from './components/MainComponent';

import './filters/filters';
import axios from 'axios';

axios.interceptors.response.use(
    response => response,
    (error) => {
        if (error.response.status == 401) {
            localStorage.removeItem('adminLogin');
            localStorage.removeItem('token');
            router.push({ name: 'login' }).catch(() => {});
        }
        return Promise.reject(error);
    },
);



// *** Create Vue Instant
new Vue({
    el: '#app', // *** Root Element
    vuetify, // *** Passing Vuetify Object
    store, // *** Store Object --- Vuex
    router, // *** All Routers Pass
    Chart,
    // **** *** Root Components
    components: {
        // *** AppComponent Root Component
        'appcomponent': MainAppComponent
    }

});