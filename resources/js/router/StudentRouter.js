import StudentDashboard from '../components/StudentPortal/Pages/DashboardComponent';
import Assignment from '../components/StudentPortal/Pages/AssignmentComponent';
import Application from '../components/StudentPortal/Pages/ApplicationComponent';
import ApplicationInbox from '../components/StudentPortal/PartialsComponent/ApplicationInboxComponent';
import composeApplication from '../components/StudentPortal/PartialsComponent/ComposeApplication';
import ApplicationSentbox from '../components/StudentPortal/PartialsComponent/ApplicationSentbox';
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
        }, {
            path: 'sentBox',
            component: ApplicationSentbox
        }]

    }
]


export default StudentRoutes;