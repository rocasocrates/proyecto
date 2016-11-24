<?php
/**
 * Created by PhpStorm.
 * User: roca
 * Date: 17/11/16
 * Time: 23:40
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Recuento extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Usuario');
        $this->load->library('table');
    }

    function recuento()
    {
         $this->load->view('inicio/recuento');
       // $data['publicidad'] = $this->db->get('iframes');
    }
}
?>