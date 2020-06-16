// *** Import Admin Portal Component 
import AdminPortal from '../components/AdminPortal/AppAdminPortalComponent';

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
    //children:[]

}];



export default AdminRoutes;