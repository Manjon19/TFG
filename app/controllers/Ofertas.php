<?php
defined("BASEPATH") or die("No se permite la entrada directa a este script");

class Ofertas extends Controller
{
    private $ofertas_m;
    private $vehiculo_m;
    private $profesor_m;
    public function __construct()
    {
        $this->vehiculo_m = $this->load_model("Vehiculos_m");
        $this->ofertas_m = $this->load_model("Ofertas_m");
        $this->profesor_m = $this->load_model("Profesores_m");
        parent::__construct();
    }
    public function index($parametros = [])
    {
        setcookie('oferta', null, 0, "/");
        setcookie('dni_prof', null, 0, "/");
        $vista = "ofertas_v";  //Vista por defecto
        $menu = "plantilla/menu"; //Menu por defecto 
        $datos['params'] = $parametros;
        $datos['Ofertas'] = $this->ofertas_m->leerOfertas();
        foreach ($datos['Ofertas'] as $ind => $oferta) {
            if ($oferta != $datos['Ofertas'][0]) {
                $datos['imagenes'][$ind] = $this->imgOferta($oferta['cod_oferta']);
            }
        }
        $this->load_view("plantilla/cabecera");
        $this->load_view($menu);
        $this->load_view($vista, $datos);
        $this->load_view("plantilla/pie");
    }
    public function imgOferta($cod_oferta)
    {

        $ofer = $this->ofertas_m->leerOferta($cod_oferta);
        $profe = $this->profesor_m->ProfesorOferta($ofer['dni_prof']);
        return $this->vehiculo_m->leerVehiculo($profe['vehiculo_practica']);
    }
}
