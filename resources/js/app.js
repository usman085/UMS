require('./bootstrap');
// *** Import Vue Instance 
import Vue from 'vue';

// *** Import Vuetify 
import vuetify from './vuetify';

// *** Import Root Router 
import router from './router/router';

// *** Import Vuex Store
import store from './Store/store';

// *** Import Root Component
// *** *** This Component Is responsible For All Components Rendering

import MainAppComponent from './components/MainComponent';


// *** Vue Global Filter
//  *** Capitalize the String
Vue.filter('capitalize', function(value) {
    if (!value) return ''
    value = value.toString()
    return value.charAt(0).toUpperCase() + value.slice(1)
})


// *** Create Vue Instant
new Vue({
    el: '#app', // *** Root Element
    vuetify, // *** Passing Vuetify Object
    store, // *** Store Object --- Vuex
    router, // *** All Routers Pass 
    // **** *** Root Components  
    components: {
        // *** AppComponent Root Component
        'appcomponent': MainAppComponent
    }

});