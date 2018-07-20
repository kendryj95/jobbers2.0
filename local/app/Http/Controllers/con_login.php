<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Mail;
use View;

class con_login extends Controller
{
    public function log(Request $request)
    {

        $this->limpiarVariablesSession($request);

        $sql = "
        SELECT t1.*,count(t1.id) as cantidad,t3.nombre_aleatorio as imagen,t1.token FROM tbl_usuarios t1
        LEFT JOIN tbl_usuarios_foto_perfil t2 ON t1.id = t2.id_usuario
        LEFT JOIN tbl_archivos t3 ON t3.id = t2.id_foto WHERE t1.correo=? AND t1.clave=?";

        try {
            $datos = DB::select($sql, [strtolower($_POST['correo']), md5($_POST['pass'])]);
            if ($datos[0]->cantidad) {
                $prefijo = "";
                $sufijo  = "";
                $ruta    = "";
                if ($datos[0]->tipo_usuario == 1) {
                    $prefijo = "empresa";
                    $sufijo  = "emp_";
                    $ruta    = "empresa/ofertas"; //Ruta del panel de arministracion de empresas

                    $sql = "SELECT
                            e.id AS id_empresa,
                            a.nombre_aleatorio AS imagen,
                            e.nombre AS nombre_empresa,
                            ep.id_plan
                            FROM tbl_empresa e
                            LEFT JOIN tbl_archivos a ON e.id_imagen=a.id
                            LEFT JOIN tbl_empresas_planes ep ON e.id=ep.id_empresa
                            WHERE e.id_usuario=?";

                    $datos_emp = DB::select($sql, [$datos[0]->id]);

                    if ($datos_emp) {
                        /** VARIABLES DE SESSION ESPECIFICAS PARA EMPRESA **/

                        $request->session()->set($prefijo, $datos[0]->correo);
                        $request->session()->set($sufijo . 'ide', $datos_emp[0]->id_empresa);
                        $request->session()->set($sufijo . 'imagen', $datos_emp[0]->imagen);
                        $request->session()->set($sufijo . 'nombre_empresa', $datos_emp[0]->nombre_empresa);

                        $plan = DB::select("SELECT tbl_empresas_planes.*, tbl_planes.descripcion AS nombre FROM tbl_empresas_planes INNER JOIN tbl_planes ON tbl_planes.id=tbl_empresas_planes.id_plan WHERE tbl_empresas_planes.id_empresa=?", [$datos_emp[0]->id_empresa]);

                        if ($plan) {
                            switch ($plan[0]->id_plan) {
                                case 2:
                                    $timestamp_today = strtotime(date("Y-m-d H:i:s"));
                                    $timestamp_vencimiento = strtotime("+35 day", strtotime($plan[0]->tmp));

                                    if ($timestamp_today >= $timestamp_vencimiento) {
                                        $db->query("UPDATE tbl_empresas_planes SET id_plan=1, tmp=".date("Y-m-d H:i:s")." WHERE id_empresa=".$datos_emp[0]->id_empresa);
                                        $plan = DB::select("SELECT tbl_empresas_planes.*, tbl_planes.descripcion AS nombre FROM tbl_empresas_planes INNER JOIN tbl_planes ON tbl_planes.id=tbl_empresas_planes.id_plan WHERE tbl_empresas_planes.id_empresa=".$datos_emp[0]->id_empresa);
                                        $request->session()->set($sufijo . 'plan', $plan);
                                    } else {
                                        $request->session()->set($sufijo . 'plan', $plan);
                                    }
                                    break;
                                
                                default:

                                    $request->session()->set($sufijo . 'plan', $plan);

                                    break;
                            }
                        } else {
                            return Redirect("login?error=Ha ocurrido un error inesperado, intentelo de nuevo por favor");
                        }

                    } else {
                        return Redirect("login?error=Ha ocurrido un error inesperado, intentelo de nuevo por favor");
                    }

                } else if ($datos[0]->tipo_usuario == 2) {
                    $prefijo = "candidato";
                    $sufijo  = "cand_";
                    $ruta    = "candidashboard";
                }
                
                $request->session()->set($prefijo, $datos[0]->correo);
                $request->session()->set($sufijo . 'id', $datos[0]->id);
                $request->session()->set($sufijo . 'img', $datos[0]->imagen);
                $request->session()->set($sufijo . 'token', $datos[0]->token);
                $request->session()->set('tipo_usuario', $datos[0]->tipo_usuario);
                return Redirect($ruta);
            } else {
                return Redirect("login?error=Clave o correo incorrectos");
            }
        } catch (Exception $e) {

        }
    }

    public function salir(Request $request)
    {
        $this->limpiarVariablesSession($request);
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

    public function enviar() //Envia el correo con la nueva clave

    {
        if (isset($_POST['correo']) && $_POST['correo'] != "") {
            $sql = "SELECT count(*) as cantidad FROM tbl_usuarios WHERE correo ='" . $_POST['correo'] . "'";
            try {
                $datos = DB::select($sql);
                if ($datos[0]->cantidad) {
                    $clave = $this->aleatorio(10);
                    $sql   = "UPDATE tbl_usuarios SET clave='" . md5($clave) . "' WHERE correo = '" . $_POST['correo'] . "'";
                    try {

                        DB::update($sql);
                        $data = [
                            'clave' => $clave,
                        ];
                        Mail::send("email.recuperar", $data, function ($message) {
                            $message->to($_POST['correo']);
                            $message->from("no-reply@jobbers.com");
                            $message->subject("no-reply@jobbers.com");
                        });
                        return redirect("login?info=La clave ha sido enviada a su correo.");
                    } catch (Exception $e) {
                        return redirect("recuperarclave?info=Ha ocurrido un error");
                    }
                } else {
                    return redirect("recuperarclave?info=Este correo no se encuentra registrado.");
                }
            } catch (Exception $e) {

            }
        } else {
            return redirect("login?info=Debe completar el campo de correo.");
        }

    }

    public function aleatorio($length)
    {
        $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function limpiarVariablesSession(Request $request)
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
        $request->session()->forget('adm_token');
        $request->session()->forget('emp_token');
        $request->session()->forget('cand_token');
        $request->session()->forget('tipo_usuario');
        $request->session()->flush();
    }

    public function vregreferidos($token, $tipo)
    {
        $vista        = View::make("register_referido");
        $vista->token = $token;
        $vista->tipo  = $tipo;
        return $vista;
    }
    public function register()
    {
        $correo = trim(strtolower($_POST['correo']));
        
        $sql = "INSERT INTO tbl_usuarios(correo,usuario,clave,tipo_usuario,token,id_estatus,token_referido)VALUES(?,'',?,?,?,1,'')";

        try {
            DB::insert($sql, [$correo, md5($_POST['clave']), $_POST['tipo'], $this->aleatorio(45)]);

            if ($_POST['tipo'] == 1) {
                $id_usuario = DB::getPdo()->lastInsertId();
                $sql1 = "INSERT INTO tbl_empresa(id_usuario,nombre,responsable,razon_social,cuit,telefono,id_imagen) VALUES(?,'','','','','',1)";
                DB::insert($sql1, [$id_usuario]);

                $sql2 = "INSERT INTO tbl_empresas_planes(id_empresa,id_plan) VALUES (?,1)";
                $id_empresa = DB::getPdo()->lastInsertId();
                DB::insert($sql2, [$id_empresa]);
            }
            return Redirect("login?success=Registrado satisfactoriamente");
        } catch (Exception $e) {

        }
    }

    public function regReferido()
    {
        $sql = "
        INSERT INTO tbl_usuarios
        VALUES(null,'" . $_POST['correo'] . "','','" . md5($_POST['clave']) . "'," . $_POST['tipo'] . ",'" . $this->aleatorio(45) . "',1,'" . $_POST['token'] . "',null)";
        try {
            DB::insert($sql);
            $this->addPuntos($_POST['token']);
            return Redirect("login");
        } catch (Exception $e) {

        }
    }

    public function addPuntos($token)
    {

        $sql_id = "SELECT id FROM tbl_usuarios WHERE token='" . $token . "'";
        try {
            $datos = DB::select($sql_id);
            $sql   = "INSERT INTO tbl_puntos VALUES(null," . $datos[0]->id . ",5,null)";
            try {
                DB::insert($sql);
            } catch (Exception $e) {

            }
        } catch (Exception $e) {

        }
    }
}
