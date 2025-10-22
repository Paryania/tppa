<?php
require_once __DIR__.'/includes/PageClass.php';

session_start();

$usuarioCorrecto = 'fcytuader';
$contraseniaCorrecta = 'programacionavanzada';

// Verificación de CAPTCHA 
if (!empty($_POST['rand_code'])) {
    if ($_POST['rand_code'] == $_SESSION['rand_code']) {
        
        
        // Validación de usuario y contraseña 
        if (isset($_POST['usuario']) && isset($_POST['contrasenia'])) {
            
            $usuarioIngresado = trim($_POST['usuario']);
            $contraseniaIngresada = trim($_POST['contrasenia']);
            
            if ($usuarioIngresado === $usuarioCorrecto && $contraseniaIngresada === $contraseniaCorrecta) {
                $_SESSION['usuario'] = $usuarioIngresado;
                $_SESSION['login_time'] = time();
                header('Location: inicio.php');
                exit();
            } else {
                $body = '
                    <div class="container mt-5">
                        <div class="alert alert-danger text-center" role="alert">
                             ERROR EN LOS DATOS<br>
                            Serás redirigido al formulario en 5 segundos...
                        </div>
                    </div>
                    <script>
                        setTimeout(function() {
                            window.history.back(); 
                        }, 5000);
                    </script>';
            }
                
        } else {
            $body = '
                <div class="container mt-5">
                    <div class="alert alert-danger text-center" role="alert">
                         ERROR: No se recibieron datos del formulario<br>
                        Serás redirigido al formulario en 5 segundos...
                    </div>
                </div>
                <script>
                    setTimeout(function() {
                        window.history.back(); 
                    }, 5000);
                </script>';
        }
        
    } else {
        // Captcha incorrecto 
        $body = '
            <div class="container mt-5">
                <div class="alert alert-danger text-center" role="alert">
                     ERROR EN LOS DATOS<br>
                    Serás redirigido al formulario en 5 segundos...
                </div>
            </div>
            <script>
                setTimeout(function() {
                    window.history.back(); 
                }, 5000);
            </script>';
    }
} else {
    // No se envia Captcha
    $body = '
        <div class="container mt-5">
            <div class="alert alert-danger text-center" role="alert">
                 ERROR EN LOS DATOS<br>
                Serás redirigido al formulario en 5 segundos...
            </div>
        </div>
        <script>
            setTimeout(function() {
                window.history.back(); 
            }, 5000);
        </script>';
}

$oPage = new PageClass();
$oPage->setBody($body);
echo $oPage->getHtml();
?>