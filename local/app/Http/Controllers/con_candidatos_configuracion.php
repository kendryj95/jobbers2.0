<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use View;
class con_candidatos_configuracion extends Controller
{
    public function index()
    {
        $vista=View::make("candidatos_configuracion");

        $sql="SELECT correo FROM tbl_usuarios WHERE id = ".session()->get('cand_id')."";
        $sql_imagen="SELECT * FROM tbl_archivos 
        WHERE id_usuario = ".session()->get("cand_id").""; 
        $sql_pic="SELECT count(t1.id) as cantidad,t2.nombre_aleatorio FROM tbl_candidato_foto_perfil t1
        LEFT JOIN tbl_archivos t2 ON t2.id = t1.id_foto WHERE t1.id_usuario=".session()->get("cand_id")."";
        $con_imagen=0;
            try {
                $datos=DB::select($sql);
                $imagen=DB::select($sql_imagen);
                $pic=DB::select($sql_pic);
                $vista->datos=$datos;
                $vista->imagen=$imagen;

                if($pic[0]->cantidad==1)
                {   
                    $con_imagen=1;                   
                }
                $vista->con_imagen=$con_imagen;
                $vista->pic=$pic;
                return $vista;
            } catch (Exception $e) {
                
            }
    } 

    public function set_profile_pic()
    {
        $sql="SELECT count(*) as cantidad FROM tbl_candidato_foto_perfil WHERE id_usuario = ".session()->get("cand_id")."";
        $sql_agregar="INSERT INTO tbl_candidato_foto_perfil
        VALUES(null,".session()->get("cand_id").",".$_POST['id_imagen'].",null)";        
        $sql_act="UPDATE tbl_candidato_foto_perfil 
        SET id_foto = ".$_POST['id_imagen']." WHERE id_usuario = ".session()->get("cand_id")."";
        try {
            $datos=DB::select($sql);
            if($datos[0]->cantidad)
            {
                DB::update($sql_act);
                return Redirect("candiconfiguracion?info=Imagen actualizada con extito.");
            }
            else
            {
                DB::insert($sql_agregar);
                return Redirect("candiconfiguracion?info=Imagen actualizada con extito.");
            }
        } catch (Exception $e) {
            
        }
    } 


     public function actualizardatos()
    {
    	if(isset($_POST['correo']) && isset($_POST['clave']) && $_POST['correo']!="" && $_POST['clave']!="")
        {
            $sql="SELECT count(*) as cantidad FROM tbl_usuarios WHERE correo='".$_POST['correo']."'";
            try {
                $datos=DB::select($sql);
                if($datos[0]->cantidad)
                {
                    return Redirect("candiconfiguracion?info=Este correo ya se encuentra en uso.");
                }
                else
                {

                     $sql="UPDATE tbl_usuarios SET correo='".$_POST['correo']."',clave='".md5($_POST['clave'])."' WHERE id=".session()->get("cand_id")."" ;
                    try {
                        DB::update($sql);
                        return Redirect("candiconfiguracion");
                    } catch (Exception $e) {
                        
                    } 
                }
            } catch (Exception $e) {
                
            } 
        }
        else 
        {
            return Redirect("candiconfiguracion?info=Debe colocar correo y clave para la actualización en sistema.");
        }
    } 
 
}
