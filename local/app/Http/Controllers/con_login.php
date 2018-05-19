<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use View;
use DB;
class con_login extends Controller
{
    public function log(Request $request)
    {
    	$sql="
        SELECT t1.*,count(t1.id) as cantidad,t3.nombre_aleatorio as imagen FROM tbl_usuarios t1
        LEFT JOIN tbl_usuarios_foto_perfil t2 ON t1.id = t2.id_usuario
        LEFT JOIN tbl_archivos t3 ON t3.id = t2.id WHERE t1.correo='".$_POST['correo']."' AND t1.clave= '".$_POST['pass']."'";  
    	try {
    		$datos=DB::select($sql);
    		if($datos[0]->cantidad)
    		{
    			$prefijo="";
    			$sufijo="";
    			$ruta="";
    			if($datos[0]->tipo_usuario==1)
    			{	
    				$prefijo="empresa";
    				$sufijo="emp_";
    				$ruta="";//Ruta del panel de arministracion de empresas
    				 
    			}
    			else if($datos[0]->tipo_usuario==2)
    			{
    				$prefijo="candidato";
    				$sufijo="cand_";
    				$ruta="candidashboard";
    			}
                $this->limpiar_variables_session($request);
    			$request->session()->set($prefijo, $datos[0]->correo); 
                $request->session()->set($sufijo.'id', $datos[0]->id);
                $request->session()->set($sufijo.'img', $datos[0]->imagen);
                $request->session()->set('tipo_usuario',$datos[0]->tipo_usuario);
    			return Redirect($ruta);
    		}
    		else
    		{
    			return Redirect("login?error=Clave o correo incorrectos.");
    		}
    	} catch (Exception $e) {
    		
    	}
    }

    public function salir(Request $request)
	{
		$request->session()->forget('candidato'); 
		$request->session()->forget('empresa'); 
        return redirect('inicio');
	}
 
    public function logincandidato()
    {
        return View("candidato_login");
    }

     public function recuperar()
    {
        return View("recuperar_clave");
    }

     public function enviar()//Envia el correo con la nueva clave
    {
        if(isset($_POST['correo']) && $_POST['correo']!="")
        {
            $sql="SELECT count(*) as cantidad FROM tbl_usuarios WHERE correo ='".$_POST['correo']."'";
            try {
                $datos=DB::select($sql);
                if($datos[0]->cantidad)
                {
                        $clave=$this->aleatorio(10);
                        $sql="UPDATE tbl_usuarios SET clave='".md5($clave)."' WHERE correo = '".$_POST['correo']."'";
                        try {

                            DB::update($sql);
                             $data=[ 
                            'clave'=>$clave
                            ];
                            Mail::send("email.recuperar", $data, function ($message){
                            $message->to($_POST['correo']);
                            $message->from("no-reply@jobbers.com");
                            $message->subject("no-reply@jobbers.com"); 
                            }); 
                            return redirect("login?info=La clave ha sido enviada a su correo.");
                        } catch (Exception $e) {
                            return redirect("login?info=Ha ocurrido un error");  
                        }
                }
                else
                {
                    return redirect("login?info=Este correo no se encuentra registrado.");  
                }
            } catch (Exception $e) {
                
            } 
        }
        else
        {
            return redirect("login?info=Debe completar el campo de correo."); 
        }
        
    }

    function aleatorio($length) 
    {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    } 

     function limpiar_variables_session(Request $request)
    {
        $request->session()->forget('candidato'); 
        $request->session()->forget('empresa');
        $request->session()->forget('cand_id'); 
        $request->session()->forget('emp_id');
        $request->session()->forget('admin');
        $request->session()->forget('adm_id'); 
        $request->session()->forget('adm_nombre');
        $request->session()->forget('adm_img');
        $request->session()->forget('emp_img');
        $request->session()->forget('cand_img');  
        $request->session()->forget('tipo_usuario'); 
        $request->session()->flush();
    }

}
