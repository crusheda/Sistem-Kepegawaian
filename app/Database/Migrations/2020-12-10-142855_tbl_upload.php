<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblUpload extends Migration
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
			'id_upload'					=> [
				'type'				=> 'INT',
				'constraint'		=> 30,
				'null'				=> true,
			],
			'nip'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 30,
				'null'				=> true,
			],
			'judul'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 50,
				'null'				=> true,
			],
			'keterangan'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 60,
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
		$this->forge->createTable('tbl_upload');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tbl_upload');
	}
}
