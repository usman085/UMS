import Vue from 'vue';
import VueRouter from 'vue-router';
import login from '../components/LoginComponent/LoginComponent';

import StudentRoutes from './StudentRouter';

Vue.use(VueRouter)


const routes = [{
        path: '/login',
        component: login,
        name: 'login'
    },

    {
        path: '/',
        redirect: '/login'
    },
    {
        path: '*',
        redirect: '/login'
    }
];

Array.prototype.push.apply(routes, StudentRoutes); //Push Student Routes To main Routes
console.log(routes);
const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;