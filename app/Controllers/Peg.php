<?php

namespace App\Controllers;
use App\Models\Model_Peg;
use Carbon\Carbon;

class Peg extends BaseController
{
	public function __construct()
    {
        helper('form');
        $this->Model_Peg = new Model_Peg();
    }

    public function dashpeg()
	{
		$data = array(
			'title' => 'Dashboard',
        );
        // print_r($data);
        // die();
		return view('peg/vp_dash',$data);
    }

    public function datakepeg()
	{
        $date = Carbon::now()->timezone('Asia/Jakarta');
		$data = array(
			'title' => 'Arsip File Pegawai',
            'show'	=> $this->Model_Peg->tampilfile(),
            'now'   => $date
        );
        // print_r($data['show']);
        // die();
		return view('peg/vp_datakepeg',$data);
    }

    public function uploadfile($id)
    {
        $data = array(
            'title'         => 'Penambahan File Pegawai',
            'validation'    => $this->validator,
			'show'	        => $this->Model_Peg->tambahfile($id), 
        );

        // print_r($data['show']);
        // die();
        return view('peg/vp_upload', $data);
    }

    public function showerror()
    {
        $date = Carbon::now()->timezone('Asia/Jakarta');
        $data = array(
            'title'         => 'Arsip File Pegawai',
            'validation'    => $this->validator,
            'show'      	=> $this->Model_Peg->tampilfile(),
            'now'           => $date
        );

        // print_r($data['show']);
        // die();
        return view('peg/vp_datakepeg', $data);
    }

    public function upload()
	{
        $date = Carbon::now()->timezone('Asia/Jakarta');

        if ($this->request->getMethod() !== 'post') {
            # code...
            return redirect()->to(base_url('peg/datakepeg'));
        }

        $validated = $this->validate([
            'file_upload' => 'uploaded[file_upload]|max_size[file_upload,10000]' // 2000 dalam satuan KiloByte
        ]);

        if ($validated == FALSE) {
            # code...
            return redirect()->to(base_url('peg/datakepeg'));
        }else {
            # code...
            $files = $this->request->getFiles();

            // print_r($files);
            // die();

            if ($files) {
                $random = rand(000,999);
                
                $data_upload = [
                    'id_user'       => $this->request->getPost('id_user'),
                    'id_upload'     => $random,
                    'nip'           => $this->request->getPost('nip'),
                    'judul'         => $this->request->getPost('judul'),
                    'keterangan'    => $this->request->getPost('keterangan'),
                    'created_at'    => $date,
                    'aktif'         => 1,
                ];
                $this->Model_Peg->insert_upload($data_upload);

                foreach ($files['file_upload'] as $key => $value){
                    $data_galeri = [
                        'id_upload'     => $data_upload['id_upload'],
                        'file'          => $value->getRandomName(),
                        'created_at'    => $date
                    ];
                    $this->Model_Peg->insert_galeri($data_galeri);
                    $value->move(ROOTPATH.'public/upload', $value->getRandomName());
                }

            }

            return redirect()->to(base_url('peg/datakepeg'))->with('success','Dokumen Berhasil Di Upload');
        }
    }

    public function lihat($id)
    {
        $data = array(
            'title'         => 'Arsip : ID Upload ',
            'show'      	=> $this->Model_Peg->lihatfile($id),
        );

        // print_r($data);
        // die();
        return view('peg/vp_lihatupload', $data);
    }
}
