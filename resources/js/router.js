import Vue from 'vue';
import VueRouter from 'vue-router';
import login from './components/StudentComponents/LoginComponent/LoginComponent';
import StudentDashboard from './components/StudentComponents/DashboardComponent/DashboardComponent';
Vue.use(VueRouter)


const routes = [{
        path: '/',
        component: login
    },
    {

        path: '/dash-board',
        component: StudentDashboard
    },
]


export default new VueRouter({
    routes
})