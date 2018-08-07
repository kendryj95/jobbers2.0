<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Socialite;
use Redirect;
use DB;
class con_log_social extends Controller
{ 
	
	public function redirectToProvider($proveedor)
		{
		return Socialite::driver($proveedor)->redirect();
		}
 
	public function callback($proveedor)
		{ 
		$token=$this->generateRandomString(74);
		$user = Socialite::driver($proveedor)->stateless()->user();
		$sql="SELECT count(id) as total,correo,token FROM tbl_tokens_social_verification WHERE correo='".$user->email."'";
		 
		$datos=DB::select($sql);
			if($datos[0]->total==0)
			{
				return Redirect('redes_users?token='.$token.'&user='.$user->email.'&name='.$user->name.''); 
			}
			else if($datos[0]->total==1)
			{
				 
				return Redirect('socialmedia?token='.$datos[0]->token.'&user='.$datos[0]->correo.'&secure=1');
			}
		
		} 

	public function add_user()
	{
		$token=$this->generateRandomString(65);
		if(isset($_POST['email']) && isset($_POST['name']) && $_POST['email']!=""  && $_POST['name']!="" && $_POST['tipo_user']!="")
		{
			$sql_general="INSERT INTO tbl_tokens_social_verification VALUES(null,'".$_POST['email']."','".$token."',null);";
			if($_POST['tipo_user']=="1")
			{

				$sql="INSERT INTO tbl_usuarios VALUES(
				null,
				'".$_POST['email']."',
				'',
				'".md5("123654789")."',
				2,
				'".$token."',
				1,
				'".$this->generateRandomString(40)."',
				null
			)";
		 
			try {
				DB::insert($sql);
				DB::insert($sql_general);
				return Redirect('socialmedia?token='.$token.'&user='.$_POST['email'].'&secure=1');
			} catch (Exception $e) {
				
			}
			}
			else if($_POST['tipo_user']=="2")
			{

				$sql="";
				$sql="INSERT INTO tbl_usuarios VALUES(
				null,
				'".$_POST['email']."',
				'',
				'".md5("123654789")."',
				1,
				'".$token."',
				1,
				'".$this->generateRandomString(40)."',
				null
				)";

				try {
					DB::insert($sql);
					DB::insert($sql_general);
					$datos=DB::select("SELECT id FROM tbl_usuarios WHERE correo='".$_POST['email']."'");
					DB::insert("INSERT INTO tbl_empresa (id,id_usuario) VALUES(".$datos[0]->id.",".$datos[0]->id.")");
					DB::insert("INSERT INTO tbl_empresas_planes VALUES(null,".$datos[0]->id.",1,null)");
					return Redirect('socialmedia?token='.$token.'&user='.$_POST['email'].'&secure=1');
				} catch (Exception $e) {
					
				}
			}
		}
		
	}

 

	public function generateRandomString($length) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	} 
	 
}
