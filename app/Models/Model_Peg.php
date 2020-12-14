<?php namespace App\Models;

use CodeIgniter\Model;
use Carbon\Carbon;

class Model_Peg extends Model
{
    public function tampilfile()
    {
        $query = $this->db->query('SELECT * FROM tbl_upload t1 JOIN tbl_pegawai t2 ON t2.id_user = t1.id_user WHERE t1.aktif = 1');
        $result = $query->getResult();

        return $result;
    }

    public function tambahfile($id)
    {
        $query = $this->db->query('SELECT * FROM tbl_upload t1 JOIN tbl_pegawai t2 ON t2.id_user = t1.id_user WHERE t1.id_user = '.$id.' AND t1.aktif = 1');
        $results = $query->getResult();


        return $results;
    }

    public function lihatfile($id)
    {
        $query = $this->db->query('SELECT * FROM tbl_upload t1 JOIN tbl_pegawai t2 ON t2.id_user = t1.id_user JOIN tbl_galeri t3 ON t3.id_upload = t1.id_upload WHERE t1.id_user = '.$id.' AND t3.id_upload');
        $results = $query->getResult();

        return $results;
    }

    public function insert_upload($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_upload');
        
        // print_r($query);
        // die();
        $builder->update($data, ['id_user' => $data['id_user']]);
    }
    
    public function insert_galeri($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_galeri');
        
        // print_r($query);
        // die();
        $builder->insert($data);
    }
}