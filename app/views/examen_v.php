<div id="examForm">
    <form name="formExamen">
        <script>
            let resps=new Array();
        </script>
    <?php
    
        foreach ($examen as $ind => $quest) {
        ?>
            
            <div>
                <h3>
                    <?php echo 1 + $ind . ". " . $quest['preguntas']; ?>
                </h3>
                </br>
                <input type="hidden" name="<?php echo 'codigo'.$ind ?>" value="<?php echo $quest['codigo']; ?>">
                <?php
                $respuestas = explode("|", $quest['respuestas']);
                foreach ($respuestas as $indice => $resp) {
                ?>
                    <div class="form-check">
                        <label class="form-check-label" for="<?php echo $ind.".".$indice; ?>">
                        <input class="form-check-input" type="radio" required name="<?php echo 'respuestas'.$ind; ?>" id="<?php echo  $ind . "." . $indice; ?>" value="<?php echo $resp; ?>">
                        
                            <h5><?php echo $resp; ?></h5>
                            
                        </label>
                    </div>
                    </br>
                <?php
                }
                
                ?>
                <script>
                            resps.push("<?php echo $quest['res_correcta']?>");
                        </script>
                <input type="hidden" id="respC<?php echo $ind;?>" value="<?php echo $quest['res_correcta']?>">
            </div>

        <?php
        
        }
        ?>

        <div class="alerta"></div>
        <div class="d-flex justify-content-around mb-3">
        <a href="<?php echo BASE_URL.'Inicio/index';?>" class="btn btn-primary">Volver a Inicio</a>
        <div id="boton">
            <input type="button" class="btn btn-success" value="Finalizar Test">
        </div>    
        
        
        </div>
        
    </form>
    <script>
        $("document").ready(function () {
            $("input[type=button]").on("click",function(e){
                e.preventDefault();
                let valRes=new Array;
                let respuestas=new Array;
                let codigos=new Array;
                let cont=0;
                var form =$(this).parent();
                for (let i = 0; i < resps.length; i++) {
                        valRes[i]=$("input[name='respuestas"+i+"']:checked").val();
                        console.log($("input[name='respuestas"+i+"']:checked").val());
                        respuestas[i]="respuestas"+i;
                        codigos[i]="codigo"+i;
                     if(valRes[i]==resps[i]){
                        $("input[name='respuestas"+i+"']:checked").parent().parent().addClass("bg bg-success bg-gradient text-white");
                        cont++;
                    }else{
                        $("input[name='respuestas"+i+"']:checked").parent().parent().addClass("bg bg-danger bg-gradient text-white");
                        } 
                    
                }
                $.post(
                    "<?php echo BASE_URL.'Tests/registrarResultados';?>",
                    {aciertos:cont},
                    function(){
                        $("input[type=button]").addClass("d-none");
                        $("#boton").html("<a href='<?php echo BASE_URL;?>Tests/tipoExamen' class='btn btn-success'>Hacer otro test</a>")
                        if (cont>=7) {
                            $(".alerta").html('<div class="alert alert-success" role="alert">Has aprobado el examen con un total de '+(10-cont)+' fallos. ¡Enhorabuena!</div>')
                        }else{
                            $(".alerta").html('<div class="alert alert-danger" role="alert">Has suspendido el examen con un total de '+(10-cont)+' fallos. ¡Sigue intentandolo!</div>')
                        }
                        
                    }
               );
            } );
        })
        
    </script>
</div>