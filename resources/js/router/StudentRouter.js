import StudentDashboard from '../components/StudentPortal/Pages/DashboardComponent';
import Assignment from '../components/StudentPortal/Pages/AssignmentComponent';



const StudentRoutes = [{
        path: '/dash-board',
        component: StudentDashboard
    },
    {
        path: '/Assignments',
        component: Assignment
    }
]


export default StudentRoutes;