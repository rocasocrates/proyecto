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

    function descargar()
    {
        //$query = $this->db->select("email");
        //$query = $this->db->get("usuarios");
        //$filename = base_url('extensiones/pruebasJSON.zip');
       // $str = "$query";
       // $bz = bzopen($filename, "w");
       // bzwrite($bz, $str);
      //  bzclose($bz);
       // $sesion = $_SESSION['minick'];
        //file_put_contents('', print_r("", true));

        /*Aqui empiezo a comprimir los archivos*/
        /*$zip = new ZipArchive();
        $exten = '/home/roca/web/publicidad/application/extensiones/plugin.zip';
        if($zip->open($exten,ZIPARCHIVE::CREATE)===true) {
            $zip->addFile('/home/roca/web/publicidad/application/extensiones/pruebasJSON/icono.png');
            $zip->addFile('/home/roca/web/publicidad/application/extensiones/pruebasJSON/jquery-1.12.1.min.js');
            $zip->addFile('/home/roca/web/publicidad/application/extensiones/pruebasJSON/manifest.json');
            $zip->addFile('/home/roca/web/publicidad/application/extensiones/pruebasJSON/popup.js');
            $zip->addFile('/home/roca/web/publicidad/application/extensiones/pruebasJSON/send_losiframe.js');
            $zip->close();

        }
        else {
            echo 'Error creando '.$exten;
        }*/
        /*Aqui se realiza la descarga*/

        $file = file(base_url('extensiones/pruebasJSON.zip'));
        $file2 = implode("", $file);
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename= pruebasJSON.zip");

        echo $file2;

    }

    function publicidad_consumida()
    {
       //  if(isset($_SESSION['minick'])) {
        if(isset($_POST["accion"])) {
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
           // file_put_contents(__DIR__ .'/errores.txt', print_r(($query), true));
            $laurl = $iframes[1]['url']['href'];
            unset($iframes[0]);
            unset($iframes[1]);
            file_put_contents(__DIR__ .'/errores.txt', print_r(($iframes), true));
            //$prueba = $_SESSION['minick'];//$this->session->userdata('minick');
            $contador = count($iframes);
            $data = array(
                'nick_usuarios' =>$usuario,
                'contador' => $contador,
                'url' => $laurl
            );



            $this->db->insert('iframes', $data);
        }else {
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
        header ( 'Access-Control-Allow-Origin: *' );
        header ( 'Access-Control-Allow-Methods: GET, POST' );
        echo (json_encode($nombre));
        // }



    }

}
?>