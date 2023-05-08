<?php
 
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UsuarioModel;
use Config\AppConfig;

class CApi extends ResourceController
{
    
    public function index(){
        $model = new UsuarioModel();
        $data['usuario'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    public function show($id = null){
        $model = new UsuarioModel();
        $data = $model->where('id', $id)->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No se encontraron datos.');
        }
    } 

    public function create() {
        $model = new UsuarioModel();
        $data = [
            'apellido' => $this->request->getVar('apellido'),
            'nombre' => $this->request->getVar('nombre'),
            'email' => $this->request->getVar('email'),
            'usuario' => $this->request->getVar('usuario'),
            'contrasena' => $this->request->getVar('contrasena'),
            'activo' => $this->request->getVar('activo')
        ];
        $model->insert($data);
        $response = [
          'status'   => 201,
          'error'    => null,
          'messages' => [
              'success' => 'Usuario creado correctamente.'
          ]
      ];
      return $this->respondCreated($response);
    }


    // show users list
    public function apiGet(){
        
        $client = \Config\Services::curlrequest();
                
        $response = $client->request('GET', 'https://restcountries.com/v2/name/argentina');
        echo $response->getStatusCode();
        echo '<br>';
        echo $response->getBody();


        // usando baseURI para todos los requests.
        /*
        $client2 = \Config\Services::curlrequest([
            'baseURI' => 'https://restcountries.com/v2/',
        ]);
        $client2->get('all');

        echo $response2->getStatusCode();
        */ 

    }

}

?>

