// *** Import Admin Portal Component 
import AdminPortal from '../components/AdminPortal/AppAdminPortalComponent';
import AdminDashboard from '../components/AdminPortal/Pages/AdminDashboard';
import ManageCourse from '../components/AdminPortal/Pages/ManageCourse';
import ManageProgram from '../components/AdminPortal/Pages/ManageProgram';
import feedback from '../components/CommonGobalComponent/feedbackComponent';
import customSupport from '../components/CommonGobalComponent/customSupport';
import registerStudent from '../components/AdminPortal/Pages/RegisterStudent';
import MangeTimeTable from '../components/AdminPortal/Pages/MangeTimeTable';
import AllTimeTable from '../components/AdminPortal/PartialComponents/AllTimeTable';
import createTimeTable from '../components/AdminPortal/PartialComponents/createTimeTable';

//**** ****  Import Guard Router 
import {
    guardRouteAdmin
} from './RouterGuard';


// **** **** Admin Portal Routes & Child Routes Components Paths

const AdminRoutes = [{
    /* *** Admin Portal Router With Guard Function  *** */
    path: '/admin-portal',
    component: AdminPortal,
    name: 'adminPortal',
    beforeEnter: guardRouteAdmin,
    // **** Root Router End

    //*** Children Routes */
    children: [

        {
            path: 'dash-board',
            component: AdminDashboard

        },

        {
            path: 'register-new-student',
            component: registerStudent

        },
        {
            // *** ManageProgram Route
            path: 'manage-program',
            component: ManageProgram,
            name: 'ManageProgram'
        },
        {
            // *** ManageProgram Route
            path: 'manage-course',
            component: ManageCourse,
            name: 'ManageCourse'
        },
        {
            // *** Customer Support Route
            path: 'customer-support',
            component: customSupport,
            name: 'customerSupport'
        },
        {
            // *** Feedback Route
            path: 'feedback',
            component: feedback,
            name: 'feedback'
        },
        {
            //***  Manage Time Table
            path: 'Mange-Time-Table',
            component: MangeTimeTable,
            children: [{
                    path: 'all-time-table',
                    component: AllTimeTable
                },
                {
                    path: 'create-time-table',
                    component: createTimeTable,
                    name: 'createTimeTable'
                },
                {
                    path: '/',
                    redirect: 'all-time-table'
                }
            ]

        }
        // children Route End
    ]

}];



export default AdminRoutes;