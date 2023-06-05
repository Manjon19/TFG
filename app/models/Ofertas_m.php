<?php
    class Ofertas_m extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function leerOfertas(){
            $cadSQL="SELECT * FROM t_ofertas order by 1";
            $this->consultar($cadSQL);
            return $this->resultado();
        }
    
        public function leerOferta($cod_oferta){
            $cadSQL="SELECT * FROM t_ofertas WHERE cod_oferta=:cod_oferta";
            $this->consultar($cadSQL);
            $this->enlazar(":cod_oferta",$cod_oferta);
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
            $cadSQL="INSERT INTO t_ofertas ($columnas) VALUES ($parametros)";
            $this->consultar($cadSQL);   // Preparar sentencia
            for($ind=0;$ind<count($campos);$ind++){    // Enlace de parametros
                $this->enlazar($campos[$ind],$datos[array_keys($datos)[$ind]]);
            }
            try {
                return $this->ejecutar();
            } catch (Exception $e) {
                die("Ya existe una oferta con ese código");
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
            $cadSQL="UPDATE t_ofertas SET ";
            // Poner todos los campos y parametros
            for($ind=0;$ind<count($campos);$ind++){
                $cadSQL.=array_keys($datos)[$ind]."=".$campos[$ind].",";
            }
            $cadSQL=substr($cadSQL,0,strlen($cadSQL)-1); // quitar la ultima coma
            $cadSQL.=" WHERE cod_oferta='$datos[cod_oferta]'"; // Añadir el WHERE
            $this->consultar($cadSQL);   // Preparar sentencia
            for($ind=0;$ind<count($campos);$ind++){    // Enlace de parametros
                $this->enlazar($campos[$ind],$datos[array_keys($datos)[$ind]]);
            }
            return $this->ejecutar();
        }
        
    }
