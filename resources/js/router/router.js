import Vue from 'vue';
import VueRouter from 'vue-router';
import login from '../components/LoginComponent/LoginComponent';


import AdminRoutes from './AdminRouter';
import StudentRoutes from './StudentRouter';
import TeacherRoutes from './TeacherRouter';

Vue.use(VueRouter);

function checkCurrentLogin(to, from, next) {
    console.log(localStorage.getItem('adminLogin'));
    //this is just an example. You will have to find a better or 
    // centralised way to handle you localstorage data handling 
    if (localStorage.getItem('adminLogin'))
        next('/admin-portal');
    else if (localStorage.getItem('studentLogin'))
        next('/student-portal');
    else
        next();

}
const routes = [{
        path: '/login',
        component: login,
        name: 'login',
        beforeEnter: checkCurrentLogin
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

Array.prototype.push.apply(routes, StudentRoutes); //Push Student Routes To Main Routes
Array.prototype.push.apply(routes, AdminRoutes); //Push Admin Routes To Main Routes
Array.prototype.push.apply(routes, TeacherRoutes); //Push Teacher Routes To Main Routes

console.log(routes);

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;