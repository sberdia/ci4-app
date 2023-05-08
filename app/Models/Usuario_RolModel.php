<?php 
namespace App\Models;
use CodeIgniter\Model;

class Usuario_RolModel extends Model
{
    protected $table = 'usuario_rol';
       
    protected $allowedFields = [ 'id_usuario', 'id_rol'];

}