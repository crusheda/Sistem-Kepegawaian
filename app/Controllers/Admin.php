<?php

namespace App\Controllers;
use App\Models\Model_Admin;
use Carbon\Carbon;

class Admin extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Model_Admin = new Model_Admin();
    }

    public function dashadmin()
	{
		$data = array(
			'title' => 'Dashboard',
        );
        // print_r($data['datakepeg']);
        // die();
		return view('admin/va_dash',$data);
    }

	public function datakepeg()
	{
        if (session()->get('level') <> 1) {
            return redirect()->to(base_url('admin'));
        }
        
		$data = array(
			'title' => 'Data Kepegawaian',
			'datakepeg'	=> $this->Model_Admin->tampilpegawai(), 
        );
        // print_r($data['datakepeg']);
        // die();
		return view('admin/va_datakepeg',$data);
    }

    public function formpegawai()
    {
        $data = array(
            'title' => 'Tambah Data Pegawai',
        );
        return view('admin/va_tambahdatakepeg', $data);
    }
    
    public function simpanpegawai()
	{
        if ($this->validate([
            'nip' => [
                'label'  => 'NIP',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'nama_peg' => [
                'label'  => 'Nama Lengkap',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            't' => [
                'label'  => 'Tempat Lahir',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'tl' => [
                'label'  => 'Tanggal Lahir',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'kelamin' => [
                'label'  => 'Jenis Kelamin',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'pendidikan' => [
                'label'  => 'Pendidikan Terakhir',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'no_hp' => [
                'label'  => 'Nomer Handphone',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'alamat' => [
                'label'  => 'alamat',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'unit' => [
                'label'  => 'unit',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'jabatan' => [
                'label'  => 'jabatan',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
        ])) {
            # Jika Valid
            $date = Carbon::now()->timezone('Asia/Jakarta');
            $data = array(
                'nip' => $this->request->getPost('nip'),
                'nama_peg' => $this->request->getPost('nama_peg'),
                't' => $this->request->getPost('t'),
                'tl' => $this->request->getPost('tl'),
                'kelamin' => $this->request->getPost('kelamin'),
                'pendidikan' => $this->request->getPost('pendidikan'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
                'unit' => $this->request->getPost('unit'),
                'jabatan' => $this->request->getPost('jabatan'),
                'created_at' => $date,
                'aktif' => '1',
            );
            $nip = array(
                'nip' => $this->request->getPost('nip'),
                'aktif' => '1',
            );
            $parse = [$data, $nip];
            $this->Model_Admin->simpanpegawai($parse);
            // print_r($parse[0]);
            // die();
            // $this->Model_Admin->simpanpegawai($nip);
            session()->setFlashdata('pesan', 'Tambah Data Pegawai Berhasil.');
            return redirect()->to(base_url('admin/datakepeg'));
        } else {
            # Jika Tidak Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('admin/datakepeg/tambah'));
        }
    }

    public function updatepegawai()
	{
        if ($this->validate([
            'nip' => [
                'label'  => 'NIP / NIK',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'nama_peg' => [
                'label'  => 'Nama Lengkap',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            't' => [
                'label'  => 'Tempat Lahir',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'tl' => [
                'label'  => 'Tanggal Lahir',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'kelamin' => [
                'label'  => 'Jenis Kelamin',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'pendidikan' => [
                'label'  => 'Pendidikan Terakhir',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'no_hp' => [
                'label'  => 'Nomer Handphone',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'alamat' => [
                'label'  => 'Alamat',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'unit' => [
                'label'  => 'Unit',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'jabatan' => [
                'label'  => 'Jabatan',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
        ])) {
            # Jika Valid
            $date = Carbon::now()->timezone('Asia/Jakarta');
            $data = array(
                'id_user' => $this->request->getPost('id_user'),
                'nip' => $this->request->getPost('nip'),
                'nama_peg' => $this->request->getPost('nama_peg'),
                't' => $this->request->getPost('t'),
                'tl' => $this->request->getPost('tl'),
                'kelamin' => $this->request->getPost('kelamin'),
                'pendidikan' => $this->request->getPost('pendidikan'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
                'unit' => $this->request->getPost('unit'),
                'jabatan' => $this->request->getPost('jabatan'),
                'updated_at' => $date
            );
            $this->Model_Admin->updatepegawai($data);
            // print_r($data['nama_peg']);
            // die();
            // $this->Model_Admin->simpanpegawai($nip);
            session()->setFlashdata('pesan', 'Ubah Data Pegawai Berhasil.');
            return redirect()->to(base_url('admin/datakepeg'));
        } else {
            # Jika Tidak Valid
            $getid = $this->request->getPost('id_user');
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('admin/ubahpeg/'.$getid));
        }
    }

    public function ubahpeg($id)
    {
        $data = array(
			'title' => 'Ubah Data Kepegawaian',
			'datakepeg'	=> $this->Model_Admin->ubahpeg($id), 
        );
        return view('admin/va_ubahdatakepeg', $data);
    }

    public function hapuspeg($id)
    {
        $this->Model_Admin->hapuspeg($id);
        return redirect()->to(base_url('admin/datakepeg'));
    }
}
