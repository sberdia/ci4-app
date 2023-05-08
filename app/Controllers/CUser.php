<?php 
namespace App\Controllers;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;
use Config\AppConfig;

class CUser extends Controller
{
    // show users list
    public function index(){
        $UsuarioModel = new UsuarioModel();
        $config = new AppConfig();
        $data['users'] = $UsuarioModel->orderBy('id', 'DESC')->findAll();
        $data['site_title'] = $config->site_title; 
        return view('user_view', $data);
    }
    // add user form
    public function create(){
        return view('add_user');
    }
 
    // insert data
    public function store() {
        $UsuarioModel = new UsuarioModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $UsuarioModel->insert($data);
        return $this->response->redirect(site_url('/users-list'));
    }
    // show single user
    public function singleUser($id = null){
        $UsuarioModel = new UsuarioModel();
        $data['user_obj'] = $UsuarioModel->where('id', $id)->first();
        return view('edit_view', $data);
    }
    // update user data
    public function update(){
        $UsuarioModel = new UsuarioModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $UsuarioModel->update($id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }
 
    // delete user
    public function delete($id = null){
        $UsuarioModel = new UsuarioModel();
        $data['user'] = $UsuarioModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users-list'));
    }    
}