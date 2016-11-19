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
		$this->db->insert('usuarios', array(
				'nick' => $this->input->post('nick', TRUE),
				'password' => $this->input->post('password', TRUE),
		        'email' => $this->input->post('email', TRUE)));
	}
	function iniciar_sesion()
	{
		$consulta = $this->db->get_where('usuarios', 
			array('email'=>$this->input->post('email', TRUE),
			      'password'=>$this->input->post('password', TRUE)));
		if($consulta->num_rows() == 1)
		{
			return true;
		}else
		{
			return false;
		}
	}


}
?>