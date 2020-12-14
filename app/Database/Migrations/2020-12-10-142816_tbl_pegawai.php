<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblPegawai extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_user'				=> [
				'type'				=> 'INT',
				'constraint'		=> 11,
				'auto_increment'	=> true,
				'unsigned'			=> true,
			],
			'nip'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 30,
				'null'				=> true,
			],
			'nama_peg'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 60,
				'null'				=> true,
			],
			't'						=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 30,
				'null'				=> true,
			],
			'tl'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 20,
				'null'				=> true,
			],
			'kelamin'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 20,
				'null'				=> true,
			],
			'pendidikan'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 20,
				'null'				=> true,
			],
			'no_hp'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 23,
				'null'				=> true,
			],
			'alamat'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 70,
				'null'				=> true,
			],
			'unit'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 25,
				'null'				=> true,
			],
			'jabatan'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 15,
				'null'				=> true,
			],
			'created_at'				=> [
				'type'				=> 'DATETIME',
				'null'				=> true,
			],
			'updated_at'				=> [
				'type'				=> 'DATETIME',
				'null'				=> true,
			],
			'aktif'				=> [
				'type'				=> 'BOOLEAN',
				'null'				=> true,
			]
		]);
		$this->forge->addPrimaryKey('id_user');
		$this->forge->createTable('tbl_pegawai');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tbl_pegawai');
	}
}
