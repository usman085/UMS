import StudentDashboard from '../components/StudentPortal/Pages/DashboardComponent';
import Assignment from '../components/StudentPortal/Pages/AssignmentComponent';
import ClassRoutine from '../components/StudentPortal/Pages/ClassRoutineComponent';



const StudentRoutes = [{
        path: '/dash-board',
        component: StudentDashboard
    },
    {
        path: '/Assignments',
        component: Assignment
    },
    {
        path: '/Class-Routine',
        component: ClassRoutine
    }
]


export default StudentRoutes;