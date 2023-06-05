<?php
    class Vehiculos_m extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function leerVehiculos(){
            $cadSQL="SELECT * FROM vehiculos order by 1";
            $this->consultar($cadSQL);
            return $this->resultado();
        }
    
        public function leerVehiculo($id){
            $cadSQL="SELECT * FROM vehiculos WHERE id=:id";
            $this->consultar($cadSQL);
            $this->enlazar(":id",$id);
            return $this->fila();
        }
        
        
        public function insertar($datos){
            // Recibimos los datos del formulario en un array
            // Obtenemos cadena con las columnas desde las claves del array asociativo
            $columnas=implode(",",array_keys($datos)); 
            // Campos de columnas
            $campos=array_map(
                function($col){
                    return ":".$col;
                },array_keys($datos));
            $parametros=implode(",",$campos); // Parametros para enlazar
            $cadSQL="INSERT INTO vehiculos ($columnas) VALUES ($parametros)";
            $this->consultar($cadSQL);   // Preparar sentencia
            for($ind=0;$ind<count($campos);$ind++){    // Enlace de parametros
                $this->enlazar($campos[$ind],$datos[array_keys($datos)[$ind]]);
            }
            try {
                return $this->ejecutar();
            } catch (Exception $e) {
                die("Ya existe una vehículo con ese código");
            }
            
        }
        public function modificar($datos){
            // Recibimos los datos del formulario en un array
            // Obtenemos cadena con las columnas desde las claves del array asociativo
            $columnas=implode(",",array_keys($datos)); 
            // Campos de columnas
            $campos=array_map(
                function($columnas){
                    return ":".$columnas;
                },array_keys($datos));
            $cadSQL="UPDATE vehiculos SET ";
            // Poner todos los campos y parametros
            for($ind=0;$ind<count($campos);$ind++){
                $cadSQL.=array_keys($datos)[$ind]."=".$campos[$ind].",";
            }
            $cadSQL=substr($cadSQL,0,strlen($cadSQL)-1); // quitar la ultima coma
            $cadSQL.=" WHERE id='$datos[id]'"; // Añadir el WHERE
            $this->consultar($cadSQL);   // Preparar sentencia
            for($ind=0;$ind<count($campos);$ind++){    // Enlace de parametros
                $this->enlazar($campos[$ind],$datos[array_keys($datos)[$ind]]);
            }
            return $this->ejecutar();
        }
    }
