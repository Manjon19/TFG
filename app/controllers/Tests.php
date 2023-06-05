<?php
defined("BASEPATH") or die("No se permite la entrada directa a este script");

class Tests extends Controller
{

    public function __construct()
    {

        parent::__construct();
    }
    public function index($parametros = [])
    {
        $vista = "tests_v";  //Vista por defecto
        $menu = "plantilla/menu_loged"; //Menu por defecto 
        $datos['params'] = $parametros;
        $this->load_view("plantilla/cabecera");
        $this->load_view($menu);
        $this->load_view($vista, $datos);
        $this->load_view("plantilla/pie");
    }
    public function tipoExamen()
    {
        //Metodo que me presenta la pantalla de preguntas de tipo test
        $vista = "examen_v";
        $tests_m = $this->load_model("Tests_m");
        $profe_m=$this->load_model("Profesores_m");
        $profe=$profe_m->leerProfesor($_SESSION["usuario"]['dni_profesor']);
        $menu = "plantilla/menu_loged"; //Menu por defecto 
        $datos['examen'] = $tests_m->crearExamen($profe['tipo_Carnet'],1);
        $this->load_view("plantilla/cabecera");
        $this->load_view($menu);
        $this->load_view($vista, $datos);
        $this->load_view("plantilla/pie");
    }
    public function registrarResultados()
    {
        $test_m = $this->load_model("Tests_m");
        $test_m->insertResult($_POST['aciertos']);
    }
}
