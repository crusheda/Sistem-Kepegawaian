<?php

namespace App\Controllers;
use App\Models\Model_Kepeg;
use Carbon\Carbon;

class Kepeg extends BaseController
{
	public function __construct()
    {
        helper('form');
        $this->Model_Kepeg = new Model_Kepeg();
    }

    public function dashkepeg()
	{
		$data = array(
			'title' => 'Dashboard',
        );
        // print_r($data['datakepeg']);
        // die();
		return view('kepeg/vk_dash',$data);
    }

    public function datakepeg()
	{
        $date = Carbon::now()->timezone('Asia/Jakarta');
		$data = array(
			'title' => 'Data Kepegawaian',
            'show'	=> $this->Model_Kepeg->tampilpegawai(),
            'now'   => $date
        );
        // print_r($data);
        // die();
		return view('kepeg/vk_datakepeg',$data);
    }

    public function ubahpeg($id)
    {
        $data = array(
			'title' => 'Perubahan SIP/SIK Pegawai',
			'show'	=> $this->Model_Kepeg->tampilubahsip($id), 
        );

        // print_r($data['show']);
        // die();
        return view('kepeg/vk_ubahdatakepeg', $data);
    }

    public function updatepegawai()
	{
        if ($this->validate([
            'no_sip' => [
                'label'  => 'Nomer SIK / SIP',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'exp_sip' => [
                'label'  => 'Masa Berlaku SIK / SIP',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
        ])) {
            # Jika Valid
            $date = Carbon::now()->timezone('Asia/Jakarta');
            $exp = Carbon::parse($this->request->getPost('exp_sip'));

            $data = array(
                'id_user' => $this->request->getPost('id_user'),
                'no_sip' => $this->request->getPost('no_sip'),
                'exp_sip' => $exp,
                'created_at' => $date
            );
            $this->Model_Kepeg->updatepegawai($data);
            // print_r($exp);
            // die();
            // $this->Model_Admin->simpanpegawai($nip);
            session()->setFlashdata('pesan', 'Simpan Data Pegawai Berhasil.');
            return redirect()->to(base_url('kepeg/datakepeg'));
        } else {
            # Jika Tidak Valid
            $getid = $this->request->getPost('id_user');
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kepeg/ubahpeg/'.$getid));
        }
    }
}
