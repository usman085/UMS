import Vue from 'vue';
import VueRouter from 'vue-router';

// **** ****  Login Component Import **** **** ****

import login from '../components/LoginComponent/LoginComponent';


// **** ****  Portal Router Import **** **** **** ****

import AdminRoutes from './AdminRouter';
import StudentRoutes from './StudentRouter';
import TeacherRoutes from './TeacherRouter';

//**** **** Guard Router Import

import { checkCurrentLogin } from './RouterGuard';


//**** **** Vue Router Instance Use by Vue

Vue.use(VueRouter);


// **** **** Root Components Paths

const routes = [
    /* *** Login Router With Guard Function  *** */
    // path: '/login',
    // component: login,
    // name: 'login',
    // beforeEnter: checkCurrentLogin

    // **** Main Root Wild Card
    {

        path: '/',
        redirect: '/student-portal/dash-board'
    },
    {
        path: '*',
        redirect: '/student-portal/dash-board'
    }
];

// *** Merege All Imported Routes from different file
// *** Merege Route In routes Variable

// *** Push Student Routes To Main Routes
Array.prototype.push.apply(routes, StudentRoutes);

// *** Push Admin Routes To Main Routes
Array.prototype.push.apply(routes, AdminRoutes);

// *** Push Teacher Routes To Main Routes
Array.prototype.push.apply(routes, TeacherRoutes);



//****  Pass routes to Vue Router  ****/
// **** Use History Mode
const router = new VueRouter({
    mode: 'history',
    routes
});


// *** Export Router Object
export default router;