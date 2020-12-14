<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblExpired extends Migration
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
			'no_sip'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 30,
				'null'				=> true,
			],
			'exp_sip'				=> [
				'type'				=> 'DATE',
				'null'				=> true,
			],
			'created_at'			=> [
				'type'				=> 'DATETIME',
				'null'				=> true,
			],
			'updated_at'			=> [
				'type'				=> 'DATETIME',
				'null'				=> true,
			],
			'aktif'					=> [
				'type'				=> 'BOOLEAN',
				'null'				=> true,
			]
		]);
		$this->forge->addPrimaryKey('id_user');
		$this->forge->createTable('tbl_expired');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tbl_expired');
	}
}
