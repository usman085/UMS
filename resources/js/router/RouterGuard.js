/**
 * 
 * @param {*} to 
 * @param {*} from 
 * @param {*} next  to Move on Next Route
 * 
 * GuardRouteStudent Check if Student is login then Move on Futher Routes
 * IF Student is not login Then Move Login Route
 */
export function guardRouteStudent(to, from, next) {
    if (localStorage.getItem('studentLogin'))
        next();
    else
        next('/login');
}
// *** GuardRouteStudent End 


/**
 * 
 * @param {*} to 
 * @param {*} from 
 * @param {*} next  to Move on Next Route
 * 
 * GuardRouteAdmin Check if Admin is login then Move on Futher Routes
 * IF Admin is not login Then Move Login Route
 */
export function guardRouteAdmin(to, from, next) {
    if (localStorage.getItem('adminLogin'))
        next();
    else
        next('/login');
}
// *** GuardRouteAdmin End 

/**
 * 
 * @param {*} to 
 * @param {*} from 
 * @param {*} next To Move next
 * 
 * Check if Any Session Set is set then move Back
 * If Session is not Set then Move To Login
 */
export function checkCurrentLogin(to, from, next) {
    if (localStorage.getItem('adminLogin'))
        next('/admin-portal');
    else if (localStorage.getItem('studentLogin'))
        next('/student-portal');
    else
        next();
}
// *** CheckCurrentLogin End

// **** Export All Functions
export default {
    guardRouteStudent,
    guardRouteAdmin,
    checkCurrentLogin
}