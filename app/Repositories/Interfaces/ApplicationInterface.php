<?php


namespace App\Repositories\Interfaces;

interface ApplicationInterface{

    /**
     * Get Applications
     *
     * @param Request $request
     * @return Response & All applications
     */


    public function getApplications();

    /**
     * Submit Application
     *
     * @param Request $request
     * @return Response & Genter Notifications
     */

    public function submitApplication($request);

    /**
     * GEt Application Detail
     *
     * @param Request $request
     * @return response Applicants Sent Detail
     */
    
    public function getApplicationDetail($id);

    /**
     * Get Admin Application
     *
     * @param Request $request
     * @return Response & All Application Regarding Admins
     */

    public function getAdminApplication();

    /**
     * Get Admin Application Detail
     *
     * @param Request $request
     * @return Response with Applicant detail
     */

    public function getAdminApplicationDetail($id);

    /**
     * Update Application Status and genrate notification
     *
     * @param Request $request
     * 
     * @return Response Message
     */

    public function updateStatus($data);
}