<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'nama_user'		=>	'Administrator',
				'email'			=>	'admin@rsudskh.com',
				'password'		=>	'admin',
				'level'			=>	'1',
			],
			[
				'nama_user'		=>	'Petugas Kepegawaian',
				'email'			=>	'kepeg@rsudskh.com',
				'password'		=>	'kepeg',
				'level'			=>	'2',
			],
			[
				'nama_user'		=>	'Pegawai',
				'email'			=>	'peg@rsudskh.com',
				'password'		=>	'peg',
				'level'			=>	'3',
			],
		];
		$this->db->table('tbl_user')->insertBatch($data);
	}
}
