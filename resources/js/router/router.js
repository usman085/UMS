import Vue from 'vue';
import VueRouter from 'vue-router';
// import login from './components/StudentComponents/LoginComponent/LoginComponent';

import StudentRoutes from './StudentRouter';

Vue.use(VueRouter)


const routes = [];

Array.prototype.push.apply(routes, StudentRoutes); //Push Student Routes To main Routes

const router = new VueRouter({
    routes
});

export default router;