<?php
namespace App\Auth\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilters implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to(base_url('creative/admin/login/index/key'));
        }
        $role = session('role');
        if ($role === 'SUPER_ADMIN') {
            //Full Access
        }
        elseif ($role === 'ADMIN') {

            if (!$this->checkAllowed($request->uri->getPath())) {
                return redirect()->to(base_url('creative/admin/unAuthorized/index/key/'.$session->get('session_key')));
            }
        } else {
            return redirect()->to(base_url('creative/admin/unAuthorized/index/key/'.$session->get('session_key')));
        }
    }
        public function checkAllowed($path)
        {
            $allowedRoutesForAdmin = [
                'creative/admin/dashboard/index/key(:segment)',
                'creative/admin/addAdminForm/index/key(:segment)',
                'creative/admin/addAdminAction/index/key(:segment)',
                'creative/admin/deleteBanners/index/key(:segment)',
                'creative/admin/logOut/index/key(:segment)',

            ];

           return in_array($path, $allowedRoutesForAdmin);
        }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after processing the request
    }

    
}