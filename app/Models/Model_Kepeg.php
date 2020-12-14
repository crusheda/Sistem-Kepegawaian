<?php namespace App\Models;

use CodeIgniter\Model;
use Carbon\Carbon;

class Model_Kepeg extends Model
{
    public function tampilpegawai() // yang belum
    {
        $query = $this->db->query('SELECT t1.id_user, t1.nip, t2.nama_peg, t1.no_sip, t1.exp_sip, t1.created_at,
                                   CASE WHEN t1.exp_sip >= curdate() THEN FALSE ELSE TRUE END AS exp_status 
                                   FROM tbl_expired t1 
                                   JOIN tbl_pegawai t2 ON t2.id_user = t1.id_user 
                                   WHERE t1.aktif = 1');
        $result = $query->getResult();

        // print_r($result);
        // die();
        return $result;
    }
    
    public function tampilubahsip($id)
    {
        $query = $this->db->query('SELECT * FROM tbl_expired t1 JOIN tbl_pegawai t2 ON t2.id_user = t1.id_user WHERE t1.id_user = '.$id.' AND t1.aktif = 1');
        $results = $query->getResult();

        return $results;
    }

    public function updatepegawai($data)
    {
        // $this->db->table('tbl_pegawai')->insert($data);
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_expired');
        
        // print_r($query);
        // die();
        $builder->update($data, ['id_user' => $data['id_user']]);
    }
}