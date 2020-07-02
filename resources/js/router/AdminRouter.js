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
import PreviewTimeTable from '../components/AdminPortal/PartialComponents/PreviewTimeTable';
import EditTimeTable from '../components/AdminPortal/PartialComponents/EditTimeTable';
import notificationPage from '../components/AdminPortal/Pages/Notification';
import ManageApplication from '../components/AdminPortal/Pages/ManageApplication';
import ManageApplicationBlock from '../components/AdminPortal/PartialComponents/ManageApplicationBlock';
import ApplicationDetailView from '../components/AdminPortal/PartialComponents/ApplicationDetailView';
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
            path: 'Manage-Application',
            component: ManageApplication,
            name: 'ManageApplication',
            children: [{
                    path: 'Application-inbox',
                    component: ManageApplicationBlock,
                    name: 'AdminApplicationInbox'
                },
                {
                    path: 'application-detail-view/:id/:slug',
                    component: ApplicationDetailView,
                    name: 'ViewApplication'
                },
                {
                    path: '',
                    redirect: 'Application-inbox'
                },
                {
                    path: '*',
                    redirect: 'Application-inbox'
                }
            ]
        },
        {
            path: 'notification',
            component: notificationPage,
            name: "AdminNotification"
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
                    component: AllTimeTable,
                    name: 'AllTimeTable'
                },
                {
                    path: 'PreviewTimeTable',
                    component: PreviewTimeTable,
                    name: 'PreviewTimeTable'
                },
                {
                    path: 'EditTimeTable',
                    component: EditTimeTable,
                    name: 'EditTimeTable'
                },
                {
                    path: 'create-time-table',
                    component: createTimeTable,
                    name: 'createTimeTable'
                },
                {
                    path: '/',
                    redirect: 'all-time-table'
                },
                {
                    path: '*',
                    redirect: 'all-time-table'
                }
            ]

        },
        // children Route End
        {
            path: '/',
            redirect: 'dash-board'
        },
        {
            path: '*',
            redirect: 'dash-board'
        }
    ]

}];



export default AdminRoutes;