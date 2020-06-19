// *** Import Admin Portal Component 
import AdminPortal from '../components/AdminPortal/AppAdminPortalComponent';
import feedback from '../components/CommonGobalComponent/feedbackComponent';
import customSupport from '../components/CommonGobalComponent/customSupport';
import registerStudent from '../components/AdminPortal/Pages/RegisterStudent';

//**** ****  Import Guard Router 
import { guardRouteAdmin } from './RouterGuard';


// **** **** Admin Portal Routes & Child Routes Components Paths

const AdminRoutes = [{
    /* *** Admin Portal Router With Guard Function  *** */
    path: '/admin-portal',
    component: AdminPortal,
    name: 'adminPortal',
    beforeEnter: guardRouteAdmin,
    // **** Root Router End

    //*** Children Routes */
    children: [{
            path: 'register-new-student',
            component: registerStudent

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
        // children Route End
    ]

}];



export default AdminRoutes;