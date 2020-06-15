import AdminPortal from '../components/AdminPortal/AppAdminPortalComponent';


function gurdRouteAdmin(to, from, next) {

    if (localStorage.getItem('adminLogin'))
        next()
    else

        next('/login'); // go to '/login';
}


const AdminRoutes = [{

    path: '/admin-portal',
    component: AdminPortal,
    name: 'adminPortal',
    beforeEnter: gurdRouteAdmin





    //Root Router End
}];



export default AdminRoutes;