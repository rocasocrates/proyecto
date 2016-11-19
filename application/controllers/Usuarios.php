<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	
	function __construct() {
       parent::__construct();
       $this->load->library('form_validation');
       $this->load->library('session');
       $this->load->model('Usuario');
   }

	function index()
	{
      // $n = $_SESSION['nick'];
        //var_dump($nick);die;

           if(isset($_SESSION['minick']))
            {
                $this->load->view('inicio/misitio');

            }else
            {
                $this->load->view('inicio/index');
            }

	}


	function login()
	{
     //  $msj = $this->session->flashdata('mensaje');
        //print_r($msj);
       // if($msj != NULL)
       // {
         //   $this->load->view('inicio/index', $msj);
      //  }else {
            if ($this->input->post('submit')) {
                //primero guardo en la variable la respuesta del modelo
                //Usuario al pulsar el boton submit
                $variable = $this->Usuario->iniciar_sesion();
                if ($variable) {

                    $this->db->select("nick");
                    $this->db->from("usuarios");
                   $this->db->where('email', $this->input->post('email'));
                    $query = $this->db->get();
                    foreach ($query->result() as $row)
                    {
                        $nombre =  $row->nick;
                    }
                   $this->session->set_userdata('minick', $nombre);
                    //setcookie("name", $nombre, time()+3600);
                }

                    redirect('Usuarios/index');


            } else {
                redirect('Usuarios/index');
            }
        }
	//}

    /**
     *
     */
    public function registrar()
	{
		
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('nick', 
				'Nick', 'required|trim|callback_existe_nick');
			$this->form_validation->set_rules('email', 
				'Email',
				'required|trim|valid_email|callback_existe_email');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			$this->form_validation->set_rules('repassword', 'RePassword', 'required|trim|matches[password]');
			$this->form_validation->set_message('required', 'El campo %s Es obligatorio');
			$this->form_validation->set_message('existe_nick', 'El  %s Ya existe');
			$this->form_validation->set_message('valid_email', 'El  %s no es valido');
			$this->form_validation->set_message('existe_email', 'El  %s Ya existe');
			$this->form_validation->set_message('matches', 'El  %s no coincide');
			
			if ($this->form_validation->run() !== FALSE)
			{
                $this->Usuario->add_user();
                redirect('Usuarios/index');
			}
			else
			{
                //$data = array('error' => 'Errorrrrrr');
				$this->load->view('usuarios/registrar');
			}

			
		}


	}
	function existe_email($usuario)
	{
		$variable = $this->Usuario->existe_email($usuario);
		if($variable)
		{
			return false;
		}else
		{
			return true;
		}
	}
	function existe_nick($usuario)
	{
		$variable = $this->Usuario->existe_nick($usuario);
		if($variable)
		{
			return false;
		}else
		{
			return true;
		}
	}
	function registro_usuario()
    {
        $this->load->view("usuarios/registrar");
    }
    function cerrar_session()
    {
        $this->session->sess_destroy();
        redirect('usuarios/login');
    }
}
?>