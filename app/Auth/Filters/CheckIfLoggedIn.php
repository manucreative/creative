<?php
namespace App\Auth\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class CheckIfLoggedIn implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = Services::session();
        if ($session->get('logged_in')) {
            // $myKey = bin2hex(random_bytes(32));
            $myKey = session()->get('session_key');
            return redirect()->to(base_url('creative/admin/dashboard/index/key/'.$myKey));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after request
    }
}