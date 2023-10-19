<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class AuthFilter implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        $session = Services::session();
        if (!$session->get('logged_in')) {
            return redirect()->to(base_url('creative/admin/login/index/key'));
        }

        $role = session('role');
        if ($role === "super_admin") {
            // Full Access
        } elseif ($role === "admin") {
            if (!$this->checkAllowed($request->getUri()->getPath())) {
                return redirect()->to(base_url('creative/admin/unAuthorized/index/key/'.$session->get('session_key')));
            }
        } else {
            return redirect()->to(base_url('creative/admin/unAuthorized/index/key/'.$session->get('session_key')));
        }
    }

    public function checkAllowed($currentPath)
    {
        $allowedRoutesForAdmin = [
            'creative/admin/dashboard/index/key',
            'creative/admin/addServiceForm/index/key',
            'creative/admin/addService/index/key',
            'creative/admin/deleteServices/index/key',
            'creative/admin/updateServiceForm/index/key',
            'creative/admin/updateService/index/key',
            'creative/admin/viewOwnerService/index/key',
            'creative/admin/configurations/index/key',
            'creative/admin/socialMediaUpdates/index/key',
            //profile update rights
            'creative/admin/profileUpdateForm/index/key',
            'creative/admin/updateProfile/index/key',
        ];

        foreach ($allowedRoutesForAdmin as $route) {
            if (strpos($currentPath, $route) !== false) {
                return true;
            }
        }

        return false;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after processing the request
    }
}