import StudentDashboard from '../components/StudentPortal/Pages/DashboardComponent';
import Assignment from '../components/StudentPortal/Pages/AssignmentComponent';
import ClassRoutine from '../components/StudentPortal/Pages/ClassRoutineComponent';
import ExamRoutine from '../components/StudentPortal/Pages/ExamRoutineComponent';
import AttendanceSheet from '../components/StudentPortal/Pages/AttendanceComponent';
import ProfileComponent from '../components/StudentPortal/Pages/ProfileComponent';
import Application from '../components/StudentPortal/Pages/ApplicationComponent';
import ApplicationInbox from '../components/StudentPortal/PartialsComponent/ApplicationInboxComponent';
import composeApplication from '../components/StudentPortal/PartialsComponent/ComposeApplication';
import ApplicationSentDetail from '../components/StudentPortal/PartialsComponent/ApplicationSentDetail';
import Notification from '../components/StudentPortal/Pages/NotificationComponent';
import notificationDetail from '../components/StudentPortal/PartialsComponent/NotificationDetail';
import NotificationList from '../components/StudentPortal/PartialsComponent/NotificationListComponent';
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
    },
    {
        path: '/Attendance-Sheet',
        component: AttendanceSheet
    },
    {
        path: '/Exam-Routine',
        component: ExamRoutine
    },
    {
        path: '/Profile-Component',
        component: ProfileComponent
    },
    {

        path: '/application',
        component: Application,
        children: [{
                path: 'inbox',
                component: ApplicationInbox
            },
            {
                path: 'compose',
                component: composeApplication
            }, {

            }
        ]

    }, {
        path: 'compose',
        component: composeApplication
    },
    {
        path: 'sent-detail/:id/:slug',
        component: ApplicationSentDetail
    },
    { path: '/', redirect: 'inbox' },
    { path: '*', redirect: 'inbox' },
    {
        path: '/notification',
        component: Notification,
        children: [{
            path: 'notification-detail/:id',
            component: notificationDetail
        }, {
            path: 'Show-notifications',
            component: NotificationList
        }, {
            path: '/',
            redirect: 'Show-notifications'
        }]
    }

]


export default StudentRoutes;