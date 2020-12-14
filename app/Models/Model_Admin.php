<?php namespace App\Models;

use CodeIgniter\Model;

class Model_Admin extends Model
{
    public function simpanpegawai($parse)
    {
        $this->db->table('tbl_pegawai')->insert($parse[0]);
        $this->db->table('tbl_expired')->insert($parse[1]);
        $this->db->table('tbl_upload')->insert($parse[1]);
    }

    public function updatepegawai($data)
    {
        // $this->db->table('tbl_pegawai')->insert($data);
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_pegawai');
        $builder2 = $db->table('tbl_expired');
        $builder3 = $db->table('tbl_upload');
        
        $ubahnip = [
            'nip' => $data['nip'],
        ];
        // print_r($query);
        // die();
        $builder->update($data, ['id_user' => $data['id_user']]);
        $builder2->update($ubahnip, ['id_user' => $data['id_user']]);
        $builder3->update($ubahnip, ['id_user' => $data['id_user']]);
    }

    public function tampilpegawai()
    {
        // return $this->db->table('tbl_pegawai')->get()->getRowArray(); 
        $query = $this->db->query('SELECT * FROM tbl_pegawai WHERE aktif = 1');
        $results = $query->getResult();

        return $results;
    }

    public function ubahpeg($id)
    {
        $query = $this->db->query('SELECT * FROM tbl_pegawai WHERE id_user = '.$id.' AND aktif = 1');
        $results = $query->getResult();

        return $results;
    }

    public function hapuspeg($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_pegawai');

        $data = [
            'aktif' => 0
        ];
        
        $builder->where('id_user', $id);
        $builder->update($data);
    }

}