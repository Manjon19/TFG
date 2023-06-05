<?php
    class View{

        protected $template;
        protected $vista;
        protected $params;

        public function __construct($vista="",$params=array()){
            
            $this->vista=$vista;    //Vista a visualizar
            $this->params=$params;  //Datos que se pasan a la vista
            $this->render();        //Visualizar la vista
        }

        protected function render(){
            //Metodo que llama a otro metodo (getContentTemplate) y que envia la vista a la salida
            $this->template=$this->getContentTemplate($this->vista);
            echo $this->template;
        }
        protected function getContentTemplate($file){
            //Generar la plantilla y extraer los datos pasados para que sean utilizados por la vista
            $file_path=ROOT.PATH_VIEWS.$file.".php";
            if(is_file($file_path)){
                //Extraer los parametros
                extract($this->params);
                //Capturar buffer de salida
                ob_start();
                require $file_path; //Incluimos el fichero fisico de la vista
                $plantilla=ob_get_contents();   //Pasamos todo a una variable
                ob_end_clean();        //Finalizamos captura de buffer
                return $plantilla;     //Retornamos plantilla

            }else{
                throw new Exception("Error. No existe la vista ".$file_path);
            }
        }

    }