// *** Import Admin Portal Component 
import AdminPortal from '../components/AdminPortal/AppAdminPortalComponent';
import AdminDashboard from '../components/AdminPortal/Pages/AdminDashboard';
import ManageCourse from '../components/AdminPortal/Pages/ManageCourse';
import ManageProgram from '../components/AdminPortal/Pages/ManageProgram';
import feedback from '../components/CommonGobalComponent/feedbackComponent';
import customSupport from '../components/CommonGobalComponent/customSupport';
import registerStudent from '../components/AdminPortal/Pages/RegisterStudent';
import ExamRoutine from '../components/AdminPortal/Pages/ExamRoutine';
import ExamRoutineBlock from '../components/AdminPortal/PartialComponents/ExamRoutineBlock';
import examRoutinePreview from '../components/AdminPortal/PartialComponents/ExamRoutinePreview';
import AddExamRoutine from '../components/AdminPortal/PartialComponents/AddExamRoutine';
import MangeTimeTable from '../components/AdminPortal/Pages/MangeTimeTable';
import AllTimeTable from '../components/AdminPortal/PartialComponents/AllTimeTable';
import createTimeTable from '../components/AdminPortal/PartialComponents/createTimeTable';
import PreviewTimeTable from '../components/AdminPortal/PartialComponents/PreviewTimeTable';
import EditTimeTable from '../components/AdminPortal/PartialComponents/EditTimeTable';
import EditExamRoutine from '../components/AdminPortal/PartialComponents/EditExamRoutine';
import notificationPage from '../components/AdminPortal/Pages/Notification';
import ManageApplication from '../components/AdminPortal/Pages/ManageApplication';
import ManageApplicationBlock from '../components/AdminPortal/PartialComponents/ManageApplicationBlock';
import ApplicationDetailView from '../components/AdminPortal/PartialComponents/ApplicationDetailView';
import ManageAssigment from '../components/AdminPortal/Pages/ManageAssignment';
import AssignAssignments from '../components/AdminPortal/PartialComponents/AssignedAssignment';
import AssignNewAssignment from '../components/AdminPortal/PartialComponents/newAssignment';
//**** ****  Import Guard Router 
import {guardRouteAdmin} from './RouterGuard';



// **** **** Admin Portal Routes & Child Routes Components Paths

const AdminRoutes = [{
    /* *** Admin Portal Router With Guard Function  *** */
    path: '/admin-portal',
    component: AdminPortal,
    beforeEnter: guardRouteAdmin,
    // **** Root Router End

    //*** Children Routes */
    children: [

        {
            path: 'dash-board',
            component: AdminDashboard,
            name: 'AdminDashboard'

        },

        {
            path: 'register-new-student',
            component: registerStudent,
            name: "RegisterStudent"
        },
        {
            // *** ManageProgram Route

            path: 'exam-routine',
            component: ExamRoutine,
            children: [{
                    path: 'exam-routine-block',
                    component: ExamRoutineBlock,
                    name: 'ExamRoutineBlock'
                },
                {
                    path: 'add-exam-routine',
                    component: AddExamRoutine,
                    name: 'AddExamRoutine'
                },
                {
                    path: 'exam-routine-preview/:id/:slug',
                    component: examRoutinePreview,
                    name: 'ExamRoutinePreview'
                },
                {
                    path: 'EditExamRoutine/:id/:slug',
                    component: EditExamRoutine,
                    name: 'EditExamRoutine'
                },
                {
                    path: '*',
                    redirect: 'exam-routine-block'
                }, {
                    path: '/',
                    redirect: 'exam-routine-block'
                }
            ]
        },
        {
            path: 'manage-program',
            component: ManageProgram,
            name: 'ManageProgram'
        }, {
            path: 'Manage-Application',
            component: ManageApplication,

            children: [{
                    path: 'Application-inbox',
                    component: ManageApplicationBlock,
                    name: 'AdminApplicationInbox'
                },
                {
                    path: 'application-detail-view/:id/:slug',
                    component: ApplicationDetailView,
                    name: 'ViewApplication'
                },
                {
                    path: '',
                    redirect: 'Application-inbox'
                },
                {
                    path: '*',
                    redirect: 'Application-inbox'
                }
            ]
        },

        {
            // *** Customer Support Route
            path: 'customer-support',
            component: customSupport,
            name: 'AdmincustomerSupport'
        },
        {
            // *** Feedback Route
            path: 'feedback',
            component: feedback,
            name: 'Adminfeedback'

        },
        {
            //***  Manage Time Table
            path: 'Mange-Time-Table',
            component: MangeTimeTable,
            children: [{
                    path: 'all-time-table',
                    component: AllTimeTable,
                    name: 'AllTimeTable'
                },
                {
                    path: 'PreviewTimeTable/:id/:slug',
                    component: PreviewTimeTable,
                    name: 'PreviewTimeTable'
                },
                {
                    path: 'EditTimeTable/:id/:slug',
                    component: EditTimeTable,
                    name: 'EditTimeTable'
                },
                {
                    path: 'create-time-table',
                    component: createTimeTable,
                    name: 'createTimeTable'
                },
                {
                    path: '/',
                    redirect: 'all-time-table'
                },
                {
                    path: '*',
                    redirect: 'all-time-table'
                }
            ]

        }, {
            path: 'notification',
            component: notificationPage,
            name: "AdminNotification"
        },
        {
            // *** ManageProgram Route
            path: 'manage-course',
            component: ManageCourse,
            name: 'ManageCourse'
        },
        // Assign assigment Block
        {
            path:"/manage-assignments",
            component: ManageAssigment,
            children:[
                {
                    // *** ManageProgram Route
                    path: 'assigned-assignments',
                    component: AssignAssignments,
                    name: 'AssignedAssignments'
                },
                {
                    // *** ManageProgram Route
                    path: 'assign-assignment-to-students',
                    component: AssignNewAssignment,
                    name: 'AssignNewAssignments'
                },
                {
                    path: '',
                    redirect: 'assigned-assignments'
                },
                {
                    path: '*',
                    redirect: 'assigned-assignments'
                }
            ]
        },
        // children Route End
        {
            path: '/',
            redirect: 'dash-board'
        },
        {
            path: '*',
            redirect: 'dash-board'
        }
    ]

}];



export default AdminRoutes;