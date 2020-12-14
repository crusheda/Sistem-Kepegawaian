<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (session()->get('level') == "") {
            # code...
            session()->setFlashdata('pesan', 'Anda Belum Login, Silakan Login Terlebih Dahulu.');
            return redirect()->to(base_url('auth/login'));
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if (session()->get('level') == 1) {
            # code...
            return redirect()->to(base_url('admin'));
        }
    }
}