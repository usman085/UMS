import StudentDashboard from '../components/StudentPortal/Pages/DashboardComponent';
import Assignment from '../components/StudentPortal/Pages/AssignmentComponent';
import Application from '../components/StudentPortal/Pages/ApplicationComponent';
import ApplicationInbox from '../components/StudentPortal/PartialsComponent/ApplicationInboxComponent';
import composeApplication from '../components/StudentPortal/PartialsComponent/ComposeApplication';
import ApplicationSentDetail from '../components/StudentPortal/PartialsComponent/ApplicationSentDetail';
import Notification from '../components/StudentPortal/Pages/NotificationComponent';
import notificationDetail from '../components/StudentPortal/PartialsComponent/NotificationDetail';
import NotificationList from '../components/StudentPortal/PartialsComponent/NotificationListComponent';
import feedback from '../components/StudentPortal/Pages/feedbackComponent';
const StudentRoutes = [{
        path: '/dash-board',
        component: StudentDashboard
    },
    {
        path: '/Assignments',
        component: Assignment
    },
    {
        path: '/application',
        component: Application,
        children: [{
                path: 'inbox',
                component: ApplicationInbox
            }, {
                path: 'compose',
                component: composeApplication
            },
            {
                path: 'sent-detail/:id/:slug',
                component: ApplicationSentDetail
            },
            { path: '/', redirect: 'inbox' },
            { path: '*', redirect: 'inbox' }
        ]

    },
    {
        path: '/feedback',
        component: feedback
    },
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