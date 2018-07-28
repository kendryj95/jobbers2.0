<?php

namespace App\Http\Controllers;

use View;
use DB;
class con_administrator_noticias extends Controller
{
    public function index()
    {
        return view('administrator_noticias');
    }

     public function publicar()
    {
       $vista = View::make("administrator_noticias_publicar");
        $vista->titulo="Nueva publicación";
        
        return $vista;
    }

      public function editar()
    {
        $vista = View::make("administrator_noticias_publicar");
        $vista->titulo="Editar publicación";
        
        return $vista;
    }

     public function categorias()
    {
        return view('administrator_noticias_categorias');
    }

 
     public function redactores()
    {
        $vista=View::make("administrator_redactores");
        $sql="SELECT * FROM tbl_usuarios_noticias;";
        try {
            $datos=DB::select($sql);
            $vista->datos=$datos;
            return $vista;
        } catch (Exception $e) {
            
        } 
    }

    public function redactores_nuevo()
    {
        return view('administrator_redactores_nuevo');
    }

    public function nuevo_redactor()
    {
        $sql="INSERT INTO tbl_usuarios_noticias VALUES(null,'".$_POST['nombre']."','".$_POST['correo']."','".$_POST['clave']."','".$_POST['funcion']."',1,null);";
        try {
            DB::insert($sql);
             return Redirect("administracion/redactores?result=Redactor agregado con éxito.");
        } catch (Exception $e) {
            
        }
    }

    public function redactores_editar($id)
    {
        $sql="SELECT * FROM tbl_usuarios_noticias WHERE id = $id;";
        try {
            $vista=View::make('administrator_redactores_editar');
            $datos=DB::select($sql);
            $vista->datos=$datos;
            return $vista;
        } catch (Exception $e) {
            
        } 
    }
    public function actualizar_redactores()
    {
        $sql="UPDATE tbl_usuarios_noticias SET
        nombre='".$_POST['nombre']."',
        correo='".$_POST['correo']."',
        funcion='".$_POST['funcion']."',
        clave='".$_POST['clave']."' 
        WHERE id= ".$_POST['id']."
        "; 
        try {
            DB::update($sql);
            return Redirect("administracion/redactores/".$_POST['id']."/?result=Redactor actualizado con éxito.");
        } catch (Exception $e) {
            
        }
        
    }
    public function redactores_bloquear($id)
    {
        $sql="UPDATE tbl_usuarios_noticias SET estatus = 0 WHERE id=".$id.";";
        try {
            DB::update($sql);
            return Redirect("administracion/redactores?result=Redactor bloqueado con éxito.");
        } catch (Exception $e) {
            
        }
        return view('administrator_redactores_editar');
    }

     public function redactores_desbloquear($id)
    {
        $sql="UPDATE tbl_usuarios_noticias SET estatus = 1 WHERE id=".$id.";";
        try {
            DB::update($sql);
            return Redirect("administracion/redactores?result=Redactor desbloqueado con éxito.");
        } catch (Exception $e) {
            
        }
        return view('administrator_redactores_editar');
    }
}
