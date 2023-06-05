<?php
defined("BASEPATH") or die("No se permite la entrada directa a este script");

class Inicio extends Controller
{
    private $profesores_m;
    private $vehiculos_m;
    public function __construct()
    {

        parent::__construct();
        $this->profesores_m = $this->load_model(("Profesores_m"));
        $this->vehiculos_m = $this->load_model(("Vehiculos_m"));

    }
    public function index($parametros = [])
    {
        setcookie('oferta', null, 0, "/");
        setcookie('dni_prof', null, 0, "/");
        $vista = "inicio_v"; 
         //Vista por defecto
        if (isset($_SESSION['usuario'])) {
            $menu = "plantilla/menu_loged"; //Menu por defecto 
        } else {
            $menu = "plantilla/menu"; //Menu por defecto 
        }
        $datos['params'] = $parametros;
        if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {    //Si esta logeado
            $usuarios_m = $this->load_model("Usuarios_m");
            $datos['N_users'] = $usuarios_m->contarTodo();
            $vista = "admin/inicio_v";        //Cargar vista administrador
            $menu = "admin/menuAdmin";     //cargamos el menu de administrador

        }
        $this->load_view("plantilla/cabecera");
        $this->load_view($menu);
        $this->load_view($vista, $datos);
        $this->load_view("plantilla/pie");
    }
    public function genContratacion()
    {
        //obtener todos los datos que se mostrarán
        $profesores = $this->profesores_m->leerProfesores();
        $list = "";
        foreach ($profesores as $prof) {
            if ($prof['dni'] !== "0") {
                $vehiculo = $this->vehiculos_m->leerVehiculo($prof['vehiculo_practica']);
                $list .= '
                <div class="form-check form-check-inline w-25">
                    <input class="form-check-input" type="radio" name="dni_profesor" id="profesor' . $prof['dni'] . '">
                    
                    <label class="form-check-label w-100" for="profesor' . $prof['dni'] . '">
                    <div class="col mb-2 ">
                    <div class="card h-100 ">
                        <img class="card-img-top mx-auto my-2 w-50" src="' . BASE_URL ."app/assets/img/vehiculos/" . $vehiculo["ref_img"] . '" alt="' . BASE_URL."app/assets/img/vehiculos/" . $vehiculo["ref_img"] . '">
                        <div class="card-body d-flex justify-content-center flex-column align-items-center">
                            <h6 class="card-title">Nombre: ' . $prof["nombre"] . '</h6>
                            <p class="card-text">Precio: ' . $prof["precio_practica"] . '€ / práctica</p>
                            <p class="card-text">Tipo de permiso: ' . $prof["tipo_Carnet"] . '</p>
                            <input type="hidden" value="' . $prof["dni"] . '" name="dni_profesor"/>
                    </div>
                </div>
                </div>
                </label>
                </div>';
            }
        }
        return $list;
    }
    public function registro()
    {
        $datos["contrataciones"] = $this->genContratacion();
        //Metodo que me presenta la pantalla de registro al usuario
        $this->load_view("plantilla/cabecera");
        $this->load_view("plantilla/menu");
        $this->load_view("registro_v", $datos);
        $this->load_view("plantilla/pie");
    }
    public function logout()
    {
        session_destroy();
        header("location:" . BASE_URL . "Inicio/index");
    }
    public function insertarUsuario()
    {
        //Este metodo recibe los datos del registro y se los envia al modelo para registrar un nuevo usuario
        $usuarios_m = $this->load_model("Usuarios_m");
        //Antes de enviar el $POST, encriptar la clave con password_hash
        $_POST['contrasena'] = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
        $usuarios_m->insertar($_POST);
        setcookie('oferta', null, 0, "/");
        setcookie('dni_prof', null, 0, "/");
        //Volver al inicio
        header('location:' . BASE_URL);
    }
    public function comprobarLogin()
    {
        //Comprobamos la autenticacion del usuario

        $usuarios_m = $this->load_model("Usuarios_m");
        $usuario = $usuarios_m->leerUsuario($_POST['dni']);

        if ($usuario) {
            //Comprobar la contraseña
            if (password_verify($_POST['contrasena'], $usuario['contrasena'])) {
                //Correcto

                //Crear una variable de sesion con los datos del usuario que nos convengan para usar en cualquier sitio de la aplicacion
                $_SESSION['usuario'] = ["nombre" => $usuario['nombre'], "dni" => $usuario['dni'], "rol" => $usuario["rol"], "dni_profesor" => $usuario['dni_profesor']];

                //Redirigimos de nuevo a Inicio/Index

                header("Location:" . BASE_URL . "Inicio/index/");
            } else {
                //Cargar de nuevo la vista de login e injectar datos con mensaje de error

                $datos['msg'] = "Error. Contraseña no válida";
            }
        } else {
            $datos['msg'] = "Error. Usuario no encontrado";
        }
        $this->load_view("plantilla/cabecera");
        $this->load_view("plantilla/menu");
        $this->load_view("inicio_v", $datos);
        $this->load_view("plantilla/pie");
    }
}
