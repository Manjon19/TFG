<?php
defined("BASEPATH") or die("No se permite la entrada directa a este script");

class Vehiculos extends Controller{
    private $vehiculos_m,$profesores_m;
    public function __construct()
    {
        parent::__construct();
        $this->vehiculos_m=$this->load_model("Vehiculos_m");
        $this->profesores_m=$this->load_model(("Profesores_m"));
    }
    public function index($parametros = [])
    {
        setcookie('oferta', null, 0, "/");
        setcookie('dni_prof', null, 0, "/");
        $datos['vehiculos']=$this->vehiculos_m->leerVehiculos();
        $vista = "vehiculos_v";  //Vista por defecto
        $menu = "plantilla/menu"; //Menu por defecto 
        if(isset($_SESSION['usuario'])){
            $menu = "plantilla/menu_loged";
        if ($_SESSION['usuario']['rol']==1) {
            $menu = "admin/menuAdmin";
        }
    }
        $datos["listado"]=$this->genListado();
        $datos['params'] = $parametros;
        $this->load_view("plantilla/cabecera");
        $this->load_view($menu);
        $this->load_view($vista, $datos);
        $this->load_view("plantilla/pie");
    }
  public function genListado()
  {
      //obtener todos los datos que se mostrarán
      $profesores=$this->profesores_m->leerProfesores();
      $list="";
      foreach($profesores as $prof){
          if ($prof['dni']!=="0") {
          $vehiculo=$this->vehiculos_m->leerVehiculo($prof['vehiculo_practica']);
            $list.='<div class="col-4 mb-2 ">
             <div class="card h-100 ">
                 <img class="card-img-top mx-auto w-50" src="'.BASE_URL."app/assets/img/vehiculos/".$vehiculo["ref_img"].'" alt="'.BASE_URL."app/assets/img/vehiculos/".$vehiculo["ref_img"].'">
                 <div class="card-body d-flex justify-content-center flex-column align-items-center">
                     <h6 class="card-title">Nombre: '.$prof["nombre"].'</h6>
                     <p class="card-text">Precio: '.$prof["precio_practica"].'€ / práctica</p>
                     <p class="card-text">Tipo de permiso: '.$prof["tipo_Carnet"].'</p>
                 </div>
             </div>
         </div>';
           
          }
      }
      return $list;
  }

}
