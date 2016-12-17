<?php
/**
 * Created by PhpStorm.
 * User: roca
 * Date: 3/11/16
 * Time: 17:29
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/*class Usuario{
    public $categorias;

}*/

class Extensiones extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Usuario');
    }

    function comprobarurlyfecha($url, $fecha)
    {
        $consulta = $this->db->get_where('iframes',
            array('url'=>$url,
                'fecha'=>$fecha));
        if($consulta->num_rows() > 0)
        {
            return false;
        }else
        {
            return true;
        }
    }
    function publicidad_consumida()
    {
        //  if(isset($_SESSION['minick'])) {
        if (isset($_POST["accion"])) {
            $resul = $_POST["accion"];
            //$user = $_POST["lala"];

            $iframes = json_decode($resul, true);
            $user = $iframes[0]['nick_usuario'];
            $this->db->select("nick");
            $this->db->from("usuarios");
            $this->db->where('token', $user);
            $query = $this->db->get();
            foreach ($query->result() as $row) {
                $usuario = $row->nick;
            }
            //file_put_contents(__DIR__ .'/errores.txt', print_r(($user), true));
            $laurl = $iframes[1]['url']['href'];
            unset($iframes[0]);
            unset($iframes[1]);

            //$prueba = $_SESSION['minick'];//$this->session->userdata('minick');
            $iframes = array_unique($iframes);
           // file_put_contents(__DIR__ . '/errores.txt', print_r(($iframes), true));
            $contador = count($iframes);
            $data = array(
                'nick_usuarios' => $usuario,
                'contador' => $contador,
                'url' => $laurl
            );
            $com = comprobarurlyfecha($laurl, date("Y/m/d"));
             file_put_contents(__DIR__ . '/errores.txt', print_r(($com), true));

                 if ($data['contador'] != 0)
                     $this->db->insert('iframes', $data);

        } else {
            $correo = $_POST["c"];
            $pass = $_POST["p"];
            $variable = $this->Usuario->iniciar_sesion($correo, $pass);
            if ($variable) {

                $this->db->select("token");
                $this->db->from("usuarios");
                $this->db->where('email', $correo);
                $query = $this->db->get();
                foreach ($query->result() as $row) {
                    $nombre = $row->token;
                }

            }
        }
        //file_put_contents(__DIR__ .'/errores.txt', print_r(($correo), true));
        //file_put_contents(__DIR__ .'/errores.txt', print_r(($iframes), true));

        header('Content-type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        echo(json_encode($nombre));
        // }


    }

}

?>