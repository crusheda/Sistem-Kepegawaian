<?php

namespace App\Controllers;
use App\Models\Model_Auth;

class Auth extends BaseController
{
    
    public function __construct()
    {
        helper('form');
        $this->Model_Auth = new Model_Auth();
    }

    public function register()
    {
        $data = array(
            'title' => 'Register',
        );
        return view('layout\v_register', $data);
    }
    
    public function simpan_user()
    {
        if ($this->validate([
            'nama_user' => [
                'label'  => 'Nama User',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'email' => [
                'label'  => 'E-Mail',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
        ])) {
            # Jika Valid
            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'email'     => $this->request->getPost('email'),
                'password'  => $this->request->getPost('password'),
                'level'     => 3
            );
            $this->Model_Auth->simpan_user($data);
            session()->setFlashdata('pesan', 'Daftar User Berhasil.');
            return redirect()->to(base_url('auth/register'));
        } else {
            # Jika Tidak Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/register'));
        }
    }
    
    public function login()
    {
        $data = array(
            'title' => 'Login',
        );
        return view('layout\v_login', $data);
    }

    public function cek_login()
    {
        if ($this->validate([
            'email' => [
                'label'  => 'E-Mail',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ]
        ])) {
            // Jika Valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $cek = $this->Model_Auth->login($email,$password);
            if ($cek) {
                # Jika datane cocok
                session()->set('log', true);
                session()->set('nama_user', $cek['nama_user']);
                session()->set('email', $cek['email']);
                session()->set('level', $cek['level']);

                return redirect()->to(base_url('admin/'));
            }else {
                # Misalkan datane salah
                session()->setFlashdata('pesan','Login Gagal, Coba lagi.');
                return redirect()->to(base_url('auth/login'));
            }
        }else {
            //Jika Tidak Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/login'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('level');

        session()->setFlashdata('pesan','Logout Sukses.');
        return redirect()->to(base_url('auth/login'));
    }
}