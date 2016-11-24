<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model {

	
	function __construct() {
       parent::__construct();
       
   }
	function existe_nick($usuario)
	{
		$consulta = $this->db->get_where('usuarios', array('nick'=>$usuario));
		if($consulta->num_rows() == 1)
		{
			return true;
		}else
		{
			return false;
		}
	}
	function existe_email($usuario)
	{
		$consulta = $this->db->get_where('usuarios', array('email'=>$usuario));
		if($consulta->num_rows() == 1)
		{
			return true;
		}else
		{
			return false;
		}
	}
	function add_user()
	{
        $eltoken = $this->generarRandomString(64, false);
        $comprobartoken = $this->db->get_where('usuarios', array('token'=>$eltoken));
        if($comprobartoken->num_rows() == 0)
        {
            $this->db->insert('usuarios', array(
                'nick' => $this->input->post('nick', TRUE),
                'password' => $this->input->post('password', TRUE),
                'email' => $this->input->post('email', TRUE),
                'token' => $eltoken));
        }else
        {
           $this->add_user();
        }


	}
	function iniciar_sesion($correo, $pass)
	{
		//$consulta = $this->db->get_where('usuarios',
			//array('email'=>$this->input->post('email', TRUE),
			  //    'password'=>$this->input->post('password', TRUE)));
        $consulta = $this->db->get_where('usuarios',
            array('email'=>$correo,
                'password'=>$pass));
		if($consulta->num_rows() == 1)
		{
			return true;
		}else
		{
			return false;
		}
	}
  public  function generarRandomString($length = 64, $soloNumeros = false) {

        $characters = !$soloNumeros ? '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-' : '0123456789';
        $characterslen = strlen($characters);
        $string = '';

        for ($p = 0; $p < $length; $p++) {
            $string .= $characters[mt_rand(0,$characterslen - 1)];
        }

        return $string;
    }
}
?>