<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Home extends BaseController
{
	protected $helpers = ['url', 'form'];

	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'isi'	=> 'v_home', 
		);
		return view('layout/v_wrapper',$data);
	}

	//--------------------------------------------------------------------

}
 