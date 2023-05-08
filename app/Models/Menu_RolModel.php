<?php 
namespace App\Models;
use CodeIgniter\Model;

class Menu_RolModel extends Model
{
    protected $table = 'menu_rol';
       
    protected $allowedFields = [ 'id_menu', 'id_rol'];

}