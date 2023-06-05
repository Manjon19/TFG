<?php
class Tests_m extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function leerTests()
    {
        $cadSQL = "SELECT * FROM tests order by 1";
        $this->consultar($cadSQL);
        return $this->resultado();
    }

    public function leerTest($codigo)
    {
        $cadSQL = "SELECT * FROM tests WHERE codigo=:codigo";
        $this->consultar($cadSQL);
        $this->enlazar(":codigo", $codigo);
        return $this->fila();
    }
    public function crearExamen($tipoCarnet,$numExam)
    {
        $cadSQL = "SELECT * FROM tests where tipoCarnet=:tipoCarnet AND numExam=:numExam LIMIT 10";
        $this->consultar($cadSQL);
        $this->enlazar(":tipoCarnet", $tipoCarnet);
        $this->enlazar(":numExam", $numExam);
        return $this->resultado();
    }
   /*  public function numExams($tipoCarnet){
        
    } */
    public function insertResult($aciertos){
        $cadSQL = "INSERT INTO resultados_test (aciertos,usuario_dni) VALUES (:aciertos,:usuario_dni)";
        $this->consultar($cadSQL);   // Preparar sentencia
        $this->enlazar(":aciertos",$aciertos);
        $this->enlazar(":usuario_dni",$_SESSION['usuario']['dni']);
        try {
            return $this->ejecutar();
        } catch (Exception $e) {
            die("Error");
        }
    }
    public function insertar($datos)
    {
        // Recibimos los datos del formulario en un array
        // Obtenemos cadena con las columnas desde las claves del array asociativo
        $columnas = implode(",", array_keys($datos));
        // Campos de columnas
        $campos = array_map(
            function ($col) {
                return ":" . $col;
            },
            array_keys($datos)
        );
        $parametros = implode(",", $campos); // Parametros para enlazar
        $cadSQL = "INSERT INTO tests ($columnas) VALUES ($parametros)";
        $this->consultar($cadSQL);   // Preparar sentencia
        for ($ind = 0; $ind < count($campos); $ind++) {    // Enlace de parametros
            $this->enlazar($campos[$ind], $datos[array_keys($datos)[$ind]]);
        }
        try {
            return $this->ejecutar();
        } catch (Exception $e) {
            die("Ya existe un Test con ese codigo");
        }
    }
    public function modificar($datos)
    {
        // Recibimos los datos del formulario en un array
        // Obtenemos cadena con las columnas desde las claves del array asociativo
        $columnas = implode(",", array_keys($datos));
        // Campos de columnas
        $campos = array_map(
            function ($columnas) {
                return ":" . $columnas;
            },
            array_keys($datos)
        );
        $cadSQL = "UPDATE tests SET ";
        // Poner todos los campos y parametros
        for ($ind = 0; $ind < count($campos); $ind++) {
            $cadSQL .= array_keys($datos)[$ind] . "=" . $campos[$ind] . ",";
        }
        $cadSQL = substr($cadSQL, 0, strlen($cadSQL) - 1); // quitar la ultima coma
        $cadSQL .= " WHERE codigo='$datos[codigo]'"; // Añadir el WHERE
        $this->consultar($cadSQL);   // Preparar sentencia
        for ($ind = 0; $ind < count($campos); $ind++) {    // Enlace de parametros
            $this->enlazar($campos[$ind], $datos[array_keys($datos)[$ind]]);
        }
        return $this->ejecutar();
    }
}
