<?php
namespace App\Auth\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\URI;
use SebastianBergmann\RecursionContext\Context;

class AuthFilter implements FilterInterface
{
 
    public function before(RequestInterface $request, $arguments = null)
    {
      
        $session = session();
        // Check if the user is authenticated
        if (!$session->get('logged_in')) {
            return redirect()->to(base_url('creative/admin/index/key/login'));
        }
        // Check user's role and restrict access based on roles
        
        $role = session('role'); 
        if ($role === "SUPER_ADMIN") {
            //Full Access
        }
        elseif ($role === "ADMIN") {
            log_message('debug', $this->checkAllowed(($request->getUri()->getPath())));
            
            if (!$this->checkAllowed($request->getUri()->getPath())) {
                return redirect()->to(base_url('creative/admin/index/key/unAuthorized'));
            }
        } else {
            // Restrict access for other roles
            return redirect()->to(base_url('creative/admin/index/key/unAuthorized'));
        }
    }
        // Check if the current route is allowed for the admin role
        private function checkAllowed($path)
        {
            $allowedRoutesForAdmin = [
                'creative',
                'creative/dashboard',
                'creative/addAdminForm',
                'creative/addAdminAction',
                'creative/deleteBanners',
                'creative/logOut',

            ];

            return in_array($path, $allowedRoutesForAdmin);
        }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after processing the request
    }

    
}