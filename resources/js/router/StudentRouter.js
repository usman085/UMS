import StudentDashboard from '../components/StudentPortal/Pages/DashboardComponent';
import Assignment from '../components/StudentPortal/Pages/AssignmentComponent';
import AcademicSyllabus from '../components/StudentPortal/Pages/AcademicSyllabusComponent';
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
import feedback from '../components/CommonGobalComponent/feedbackComponent';
import customSupport from '../components/CommonGobalComponent/customSupport'
import AppStudent from '../components/StudentPortal/AppStudentComponent';
const StudentRoutes = [{
    path: '/student-portal',
    component: AppStudent,
    children: [{
            path: 'dash-board',
            component: StudentDashboard
        },
        {
            path: 'Academic-syllabus',
            component: AcademicSyllabus
        },
        {
            path: 'Assignments',
            component: Assignment
        },
        {
            path: 'Class-Routine',
            component: ClassRoutine
        },
        {
            path: 'Attendance-Sheet',
            component: AttendanceSheet
        },
        {
            path: 'Exam-Routine',
            component: ExamRoutine
        },
        {
            path: 'Profile-Component',
            component: ProfileComponent,
            name: 'ProfileComponent'
        },
        {
            path: 'customer-support',
            component: customSupport,
            name: 'customerSupport'
        },
        {
            path: 'feedback',
            component: feedback,
            name: 'feedback'
        },
        {

            path: 'application',
            component: Application,
            children: [{
                    path: 'inbox',
                    component: ApplicationInbox,
                    name: 'ApplicationInbox'
                },
                {
                    path: 'compose',
                    component: composeApplication,
                    name: 'applicationCompose'
                }, {
                    path: 'sent-detail/:id',
                    component: ApplicationSentDetail,
                    name: 'ApplicationDetail'
                },
                { path: '/', redirect: 'inbox' },
                { path: '*', redirect: 'inbox' },
            ]

        },
        {
            path: 'notification',
            component: Notification,
            children: [{
                path: 'notification-detail/:id',
                component: notificationDetail,
                name: 'notificationDetail'
            }, {
                path: 'Show-notifications',
                component: NotificationList,
                name: 'ShowAllNotification'
            }, {
                path: '/',
                redirect: 'Show-notifications'
            }]
        },


        { path: '/', redirect: 'dash-board' },
        { path: '*', redirect: 'dash-board' },

        // root children end
    ]
}]


export default StudentRoutes;