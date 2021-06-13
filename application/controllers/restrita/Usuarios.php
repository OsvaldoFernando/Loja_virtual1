<?php

defined('BASEPATH') or exit('Ação não permitida');

class Usuarios extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

//		Sessão válida?
	}

	public function index()
	{
		$data = array(

			'titulo' => 'Usuários cadastrados',

			'styles' => array(
				'bundles/datatables/datatables.min.css',
				'bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css',

			),

			'scripts' => array(
				'bundles/datatables/datatables.min.js',
				'bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js',
				'bundles/jquery-ui/jquery-ui.min.js',
				'js/page/datatables.js',

			),

			'usuarios' => $users = $this->ion_auth->users()->result(), // get all users
		);

//		Debugamos
//		echo '<pre>';
//		print_r($data['usuarios']);
//		exit();


		$this->load->view('restrita/layout/header', $data);
		$this->load->view('restrita/usuarios/index');
		$this->load->view('restrita/layout/footer');

	}

	public function core($usuario_id = null)
	{

		if (!$usuario_id) {

			//Cadastrar usuário
			exit('Cadastrar usuários');

		} else {
			//Se veio estou cadastrando

			if (!$usuario = $this->ion_auth->user($usuario_id)->row()) { //Negando se não foi passado

//				exit('Não existe');

				$this->session->set_flashdata('erro', 'Usuário não foi encontrado');
				redirect('restrita/usuarios');

			} else {

				//Se existir podemos começar a preparar a edição do usuário e chamar as minhas view

				$this->form_validation->set_rules('first_name', 'Nome', 'trim|required');

				if ($this->form_validation->run()) {

					echo '<pre>';
					print_r($this->input->post());
//					echo '</pre>';
					exit();

				} else {

					//Erro de validação e volta a mostrar a view novamente

					$data = array(
						'titulo' => 'Editar usuário',
						'usuario' => $usuario,
						'perfil' => $this->ion_auth->get_users_groups($usuario_id)->row(), //Trago a penas um grupo
						'grupos' => $this->ion_auth->groups()->result(),

					);

					$this->load->view('restrita/layout/header', $data);
					$this->load->view('restrita/usuarios/core'); //Nome da view
					$this->load->view('restrita/layout/footer');
				}
			}
		}
	}
}
