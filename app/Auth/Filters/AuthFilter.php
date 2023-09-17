<?php
namespace App\Auth\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
     
    public function before(RequestInterface $request, $arguments = null)
    {
      
        $session = session();
        // Check if the user is authenticated
        if (!$session->get('logged_in')) {
            return redirect()->to(base_url('creative/login'));
        }
        // Check user's role and restrict access based on roles
        
        $role = session('role'); 
        if ($role === "SUPER_ADMIN") {
            // Allow access for super admin
        } elseif ($role === "ADMIN") {
            // Allow access for regular admins
            if (!$this->checkAllowedRoutes($request->uri->getPath())) {
                return redirect()->to(base_url('creative/unAuthorized'));
            }
        } else {
            // Restrict access for other roles
            return redirect()->to(base_url('creative/unAuthorized'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after processing the request
    }

    // Check if the current route is allowed for the admin role
    private function checkAllowedRoutes($path)
    {
        $allowedRoutesForAdmin = [
            'admin/dashboard',
            // 'admin/addBanner',
            // 'admin/addBanners',
            // 'admin/view_banners',
            // 'admin/deleteBanners',
            // 'admin/editBanner/(:num)',
            // 'admin/editBannerFunction',
            // 'admin/logOut',
            'admin/unAuthorized',
            // 'admin/view_products',
            // 'admin/deleteProducts',
            // 'admin/product_addition_page',
            // 'admin/productAddFunction',
            // 'admin/editProduct/(:num)',
            // 'admin/productUpdateFunction'

        ];

        return in_array($path, $allowedRoutesForAdmin);
    }
}