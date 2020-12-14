<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblGaleri extends Migration
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
			'id_upload'				=> [
				'type'				=> 'INT',
				'constraint'		=> 30,
				'null'				=> true,
			],
			'file'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 50,
				'null'				=> true,
			],
			'created_at'			=> [
				'type'				=> 'DATETIME',
				'null'				=> true,
			],
			'updated_at'				=> [
				'type'				=> 'DATETIME',
				'null'				=> true,
			],
		]);
		$this->forge->addPrimaryKey('id_user');
		$this->forge->createTable('tbl_galeri');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tbl_galeri');
	}
}
