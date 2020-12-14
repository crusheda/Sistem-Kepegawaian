<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblUser extends Migration
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
			'nama_user'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 20,
				'null'				=> true,
			],
			'email'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 60,
				'null'				=> true,
			],
			'password'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 40,
				'null'				=> true,
			],
			'level'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 3,
				'null'				=> true,
			]
		]);
		$this->forge->addPrimaryKey('id_user');
		$this->forge->createTable('tbl_user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tbl_user');
	}
}
