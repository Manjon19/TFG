<?php
class Usuarios_m extends Model
{

  public function __construct()
  {
    parent::__construct();
  }
  public function leerTodos()
  {
    $cadSQL = "SELECT * FROM usuarios order by 1";
    $this->consultar($cadSQL);
    return $this->resultado();
  }

  public function leerUsuario($dni)
  {
    $cadSQL = "SELECT * FROM usuarios WHERE dni=:dni";
    $this->consultar($cadSQL);
    $this->enlazar(":dni", $dni);
    return $this->fila();
  }
  public function contarTodo()
  {
    $cadSQL = "select * from usuarios where rol =" . 0;
    $this->consultar($cadSQL);
    $num['usuarios'] = count($this->resultado());
    $cadSQL = "select * from vehiculos where id not like " . 0;
    $this->consultar($cadSQL);
    $num['vehiculos'] = count($this->resultado());
    $cadSQL = "select * from profesores where dni not like " . 0;
    $this->consultar($cadSQL);
    $num['profes'] = count($this->resultado());
    $cadSQL = "select * from t_ofertas where cod_oferta not like " . 0;
    $this->consultar($cadSQL);
    $num['ofertas'] = count($this->resultado());
    return $num;
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
    $cadSQL = "INSERT INTO usuarios ($columnas) VALUES ($parametros)";
    $this->consultar($cadSQL); // Preparar sentencia
    for ($ind = 0; $ind < count($campos); $ind++) { // Enlace de parametros
      $this->enlazar($campos[$ind], $datos[array_keys($datos)[$ind]]);
    }
    try {
      return $this->ejecutar();
    } catch (Exception $e) {
      echo "<script>
      alert('Ya existe un usuario con ese dni');
      window.location.href='./registro'
      </script>";
      //header("refresh:0.5; url=./registro");
      exit();
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
    $cadSQL = "UPDATE usuarios SET ";
    // Poner todos los campos y parametros
    for ($ind = 0; $ind < count($campos); $ind++) {
      $cadSQL .= array_keys($datos)[$ind] . "=" . $campos[$ind] . ",";
    }
    $cadSQL = substr($cadSQL, 0, strlen($cadSQL) - 1); // quitar la ultima coma
    $cadSQL .= " WHERE dni='$datos[dni]'"; // Añadir el WHERE
    $this->consultar($cadSQL); // Preparar sentencia
    for ($ind = 0; $ind < count($campos); $ind++) { // Enlace de parametros
      $this->enlazar($campos[$ind], $datos[array_keys($datos)[$ind]]);
    }
    return $this->ejecutar();
  }
}
