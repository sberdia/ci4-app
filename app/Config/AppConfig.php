<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class AppConfig extends BaseConfig
{

    public $str_site_title = 'CI4-APP';
    public $str_site_copyright = 'Pince 2022';

    /* Config Values */
    public $usuario_activo = 1;

    /* Login Form */
    public $str_login_titulo = 'Bienvenido';
    public $str_login_username = 'Usuario';
    public $str_login_password = 'Contraseña';
    public $str_login_button_ingresar = 'Ingresar';

}