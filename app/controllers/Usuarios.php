<?php
defined("BASEPATH") or die("No se permite la entrada directa a este script");

class Usuarios extends Controller
{
    private $usuarios_m;
    private $vehiculo_m;
    private $profesor_m;
    public function __construct()
    {
        $this->usuarios_m = $this->load_model("Usuarios_m");
        parent::__construct();
    }
    public function index($parametros = [])
    {
        setcookie('oferta', null, 0, "/");
        setcookie('dni_prof', null, 0, "/");
        $vista = "usuarios_v";  //Vista por defecto
        $menu = "plantilla/menu"; //Menu por defecto 
        $datos['params'] = $parametros;
        $datos['Usuarios'] = $this->usuarios_m->leerusuarios();
        foreach ($datos['Usuarios'] as $ind => $user) {
            
        }
        $this->load_view("plantilla/cabecera");
        $this->load_view($menu);
        $this->load_view($vista, $datos);
        $this->load_view("plantilla/pie");
    }
    
}
