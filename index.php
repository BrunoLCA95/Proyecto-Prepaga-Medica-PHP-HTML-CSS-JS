<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProyectoPP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet" type="text/css">
    <script async src="https://www.google.com/recaptcha/api.js"></script>

</head>
<body>


<div class="modal modal-signin d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-5 shadow" style="background-color:#ADD8E6">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <!-- <h5 class="modal-title">Modal title</h5> -->
            </div>


            <div class="modal-body p-5 pt-0">
                <form action="index.php" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control rounded-4" name="usuario">
                    <label for="floatingInput">Usuario</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-4" name="contra">
                    <label for="floatingPassword">Contraseña</label>
                </div>

                <?php
                    $contador=1;

                    include_once 'conexion.php';

                    $datos;
                    $captcha=0;
                    if(isset($_POST['datos'])){ 
                    $datos = $_POST['datos'];}	
                    if(isset($_POST['g-recaptcha-response'])){
                    $captcha=$_POST['g-recaptcha-response'];}

                    $secretKey = "6LcqSHocAAAAAA2fMH3GPqlJpaWqtZhNFWiiZeSQ";
                    $ip = $_SERVER['REMOTE_ADDR'];
                    //Chequear captcha con Google
                    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
                    $responseKeys = json_decode($response,true);
                    if(intval($responseKeys["success"]) !== 1) {
                        if ($contador < 1) {
                            echo '<div class="container form-control p divP" style="background-color:#rgba(180, 46, 68, 0.425)">Chequea el captcha</div>';
                        }
                        $contador=$contador+1;               
                        } else {

                        $user=$_POST["usuario"];
                        $pass=$_POST["contra"];

                        $sql_querry= 'select nombre, pass from usuarios where nombre="'.$user.'" and pass="'.$pass.'";';
                        $gsent = $pdo->prepare($sql_querry);
                        $gsent->execute();
                        $salida=$gsent->fetchAll();

                        foreach ($salida as $dato){
                            if (($user === $dato['nombre']) & ($pass === $dato['pass'])) {
                                header("Location: modulos/inicio.php");
                                $contador=1;
                                exit;
                            } else {

                                header("Location: ProyectoPP/");
                                exit;
                            }

                        }   
                    }




                ?>

                <div class="g-recaptcha" data-sitekey="6LcqSHocAAAAABaU6Faw0dmDJDMRdrA5cfm-Wln8">

                </div>
                <br>
                
                <input type="submit" class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" value="Iniciar Sesion" >
                </form>
            </div>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>

<script src="js/nuevo.js"></script>
</body>
</html>