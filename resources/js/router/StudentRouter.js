import StudentDashboard from '../components/StudentPortal/Pages/DashboardComponent';
import Main from '../components/MainComponent';


const StudentRoutes = [{
        path: '/',
        component: Main
    },
    {
        path: '/dash-board',
        component: StudentDashboard
    },
]


export default StudentRoutes;