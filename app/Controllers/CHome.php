<?php

namespace App\Controllers;

use Config\AppConfig;
use App\Models\UsuarioModel;
use App\Models\Usuario_RolModel;
use App\Models\RolModel;

class CHome extends BaseController
{
	protected $helpers = ['html'];

	public function index()
	{
		$config = new AppConfig();

		$dataHeader['str_site_title'] = $config->str_site_title;

		$dataLogin['str_login_titulo'] = $config->str_login_titulo;
		$dataLogin['str_login_username'] =  $config->str_login_username; 
		$dataLogin['str_login_password'] =  $config->str_login_password; 
		$dataLogin['str_login_button_ingresar'] =  $config->str_login_button_ingresar;
		$dataLogin['str_site_copyright'] =  $config->str_site_copyright; 

		return view('templates/header', $dataHeader)
				. view('security/login', $dataLogin)
				. view('templates/footer');
	}

	public function login()
	{
		$config = new AppConfig();

		$dataHeader['str_site_title'] = $config->str_site_title;

		$dataLogin['str_login_titulo'] = $config->str_login_titulo;
		$dataLogin['str_login_username'] =  $config->str_login_username; 
		$dataLogin['str_login_password'] =  $config->str_login_password; 
		$dataLogin['str_login_button_ingresar'] =  $config->str_login_button_ingresar;
		$dataLogin['str_site_copyright'] =  $config->str_site_copyright;  
		
		$rules = [
			'inputLoginUsername' => 'required|min_length[1]',
			'inputLoginPassword' => 'required|min_length[1]',
		];
          
        if($this->validate($rules) && 
		  ($this->loginAuth($this->request->getVar('inputLoginUsername'), $this->request->getVar('inputLoginPassword')))==true){
				return view('templates/header', $dataHeader)
					. view('general/home')
					. view('templates/footer');

        } else {
            $dataLogin['validation'] = $this->validator;

			return view('templates/header', $dataHeader)
			. view('security/login', $dataLogin)
			. view('templates/footer');
        }
	}

	public function loginAuth($usuario, $contrasena)
	{
		$config = new AppConfig();	
		
		$session = \Config\Services::session();

		$usuarioModel = new UsuarioModel();
		$usuarioRolModel = new Usuario_RolModel;
		$rolModel = new RolModel;
			
		$data = $usuarioModel->where('usuario', $usuario)->first();
			
		if($data){
			if($data['activo']==$config->usuario_activo){
				
				$pass = $data['contrasena'];

				//To Do: Mejorar esta verificación.
				if($contrasena == $pass){
					
					$usuarioRol = $usuarioRolModel->where('id_usuario', $data['id'])->first();
					$rol = $rolModel->where('id', $usuarioRol['id_rol'])->first();

					$session_data = [
						'usuario_id' => $data['id'],
						'usuario_apellido' => $data['apellido'],
						'usuario_nombre' => $data['nombre'],
						'usuario_email' => $data['email'],
						'usuario_usuario' => $data['usuario'],
						'usuario_rol_id' => $usuarioRol['id_rol'],
						'usuario_rol' => $rol['descripcion'],
						'usuario_loggedin' => TRUE
					];

					$session->set($session_data);
					
					return true;			
				} else {
					return false;
				}
			}		
		} else {
			return false;
		}
		
	}
}
