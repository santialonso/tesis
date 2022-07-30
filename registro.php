<?php
$seccion = "registro";
?>

<main>
   
<div class="bak2">
    <div class="row justify-content-center registro">
        <div class="col-auto">
        <?php
              if(!empty($_GET["estado"])):
                    $estado = $_GET["estado"];
                  if($estado == "error"):
                        $error = $_GET["error"];
                        
        ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>¡Error!</strong><br><?= mal($error) ?>.
                </div>
        <?php  
                  endif;
            endif;  
        ?>   
        
    
        <div class="register_card">
                <div class="form_container">
                    <form action="procesar-registro.php" method="POST">
                        <div class="form-row">
                            <div class="input-group mb-3 col-6">
                                <input type="text" name="nombre" class="form-control input_user"
                                        placeholder="Nombre">
                            </div>
                            <div class="input-group mb-3 col-6">
                                <input type="text" name="apellido" class="form-control input_pass"
                                        placeholder="Apellido">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="input-group mb-3 col-12">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control input_user"
                                        placeholder="Email">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="input-group mb-3 col-6">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="usuario" class="form-control input_user"
                                        placeholder="Usuario">
                            </div>
                            <div class="input-group mb-3 col-6">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control input_pass"
                                        placeholder="password">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" class="btn login_btn btn-primary">Registrarse</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

</div>

</main>
