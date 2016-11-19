<?php
/**
 * Created by PhpStorm.
 * User: roca
 * Date: 3/11/16
 * Time: 17:29
 */

defined('BASEPATH') OR exit('No direct script access allowed');

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
             $resul = $_POST["accion"];
             $papa = $_POST["lala"];
            // $papi = json_decode($papa, true);
             $iframes = json_decode($resul, true);
        file_put_contents(__DIR__ .'/errores.txt', print_r(gettype($papa), true));
             $laurl = $iframes[0]['url']['href'];
                unset($iframes[0]);
             //$prueba = $_SESSION['minick'];//$this->session->userdata('minick');
             $contador = count($iframes);
             $data = array(
                 'nick_usuarios' =>$papa,
                 'contador' => $contador,
                 'url' => $laurl
             );
             $this->db->insert('iframes', $data);

        // }



    }

}
?>