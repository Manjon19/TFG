<?php
class Profesores_m extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function leerProfesores()
    {
        $cadSQL = "SELECT * FROM profesores order by 1";
        $this->consultar($cadSQL);
        return $this->resultado();
    }

    public function leerProfesor($dni)
    {
        $cadSQL = "SELECT * FROM profesores WHERE dni=:dni";
        $this->consultar($cadSQL);
        $this->enlazar(":dni", $dni);
        return $this->fila();
    }
    public function ProfesorOferta($dni_prof){
        $cadSQL="SELECT * FROM profesores LEFT JOIN t_ofertas ON t_ofertas.dni_prof=profesores.dni where t_ofertas.dni_prof=:dni_prof";
        $this->consultar($cadSQL);
        $this->enlazar(":dni_prof",$dni_prof);
        return $this->fila();
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
        $cadSQL = "INSERT INTO profesores ($columnas) VALUES ($parametros)";
        $this->consultar($cadSQL);   // Preparar sentencia
        for ($ind = 0; $ind < count($campos); $ind++) {    // Enlace de parametros
            $this->enlazar($campos[$ind], $datos[array_keys($datos)[$ind]]);
        }
        try {
            return $this->ejecutar();
        } catch (Exception $e) {
            die("Ya existe un profesor con ese dni");
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
        $cadSQL = "UPDATE profesores SET ";
        // Poner todos los campos y parametros
        for ($ind = 0; $ind < count($campos); $ind++) {
            $cadSQL .= array_keys($datos)[$ind] . "=" . $campos[$ind] . ",";
        }
        $cadSQL = substr($cadSQL, 0, strlen($cadSQL) - 1); // quitar la ultima coma
        $cadSQL .= " WHERE dni='$datos[dni]'"; // Añadir el WHERE
        $this->consultar($cadSQL);   // Preparar sentencia
        for ($ind = 0; $ind < count($campos); $ind++) {    // Enlace de parametros
            $this->enlazar($campos[$ind], $datos[array_keys($datos)[$ind]]);
        }
        return $this->ejecutar();
    }
}
