<?php

defined('BASEPATH') or exit('Ação não permitida');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

//		Existe uma sessão?
	}

	public function index()
	{
		$this->load->view('restrita/layout/header');
		$this->load->view('restrita/home/index');
		$this->load->view('restrita/layout/footer');

//		Vamos agora criar a pasta e o arquivo index na pasta restrita dentro da pasta view
	}

}
