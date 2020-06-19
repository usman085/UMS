import StudentDashboard from '../components/StudentPortal/Pages/DashboardComponent';
import Assignment from '../components/StudentPortal/Pages/AssignmentComponent';
import AssignmentCollector from '../components/StudentPortal/Pages/AssignmentCollectorComponent';
import AssignmentFiles from '../components/StudentPortal/PartialsComponent/AssignmentCollectorFiles';
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
import customSupport from '../components/CommonGobalComponent/customSupport';
import AppStudent from '../components/StudentPortal/AppStudentComponent';

//**** ****  Import Guard Router
import { guardRouteStudent } from './RouterGuard'; //Student Route Guard

// **** **** Student Portal Routes & Child Routes Components Paths
const StudentRoutes = [{
    /* *** Admin Portal Router With Guard Function  *** */
    path: '/student-portal',
    component: AppStudent,
    name: 'studentPortal',
    beforeEnter: guardRouteStudent,

    // ***Children Routes
    children: [{
            // *** Dash Board Route
            path: 'dash-board',
            component: StudentDashboard
        },
        {
            // *** Academic Syllabus Route
            path: 'Academic-syllabus',
            component: AcademicSyllabus
        },
        {
            // *** Academic Syllabus Route
            path: 'Assignments',
            component: Assignment
        },
        {
            // *** Assignment Collector Route
            path: 'Assignment-collector',
            component: AssignmentCollector,
        },
        {
            // Assignments files
            path: 'files',
            component: AssignmentFiles,
            name: 'AssignmentFiles'
        },
        {
            // *** Class Routine Route
            path: 'Class-Routine',
            component: ClassRoutine
        },
        {
            // *** Attendance Sheet Route
            path: 'Attendance-Sheet',
            component: AttendanceSheet
        },
        {
            // *** Exam Routine Route
            path: 'Exam-Routine',
            component: ExamRoutine
        },
        {
            // *** Profile Route
            path: 'Profile-Component',
            component: ProfileComponent,
            name: 'ProfileComponent'
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
        {
            // *** Application Route
            path: 'application',
            component: Application,
            // **** Aplication Children Route
            children: [{
                    // *** Application Inbox Route
                    path: 'inbox',
                    component: ApplicationInbox,
                    name: 'ApplicationInbox'
                },
                {
                    // *** Application Compose Route
                    path: 'compose',
                    component: composeApplication,
                    name: 'applicationCompose'
                },
                {
                    // *** Application Detail Page Route
                    path: 'sent-detail/:id',
                    component: ApplicationSentDetail,
                    name: 'ApplicationDetail'
                },
                // *** Application Route Wild Card
                { path: '/', redirect: 'inbox' },
                { path: '*', redirect: 'inbox' },
            ]

        },
        {
            // *** Notification Route
            path: 'notification',
            component: Notification,
            // *** Notification Children Route
            children: [{
                    // *** Notification Detail Route
                    path: 'notification-detail/:id',
                    component: notificationDetail,
                    name: 'notificationDetail'
                },
                {
                    // *** Show All Notification Route
                    path: 'Show-notifications',
                    component: NotificationList,
                    name: 'ShowAllNotification'
                },
                {
                    // *** Wild Card Route
                    path: '/',
                    redirect: 'Show-notifications'
                }
            ]
        },

        //    **** Wild Cards
        { path: '/', redirect: 'dash-board' },
        { path: '*', redirect: 'dash-board' },

        // root children end
    ]
}]

// *** Export All Student Routes
export default StudentRoutes;
