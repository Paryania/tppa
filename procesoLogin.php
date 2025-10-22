<?php
require_once __DIR__.'/includes/PageClass.php';

session_start();

// Verificación de CAPTCHA 
if (!empty($_POST['rand_code'])) {
    if ($_POST['rand_code'] == $_SESSION['rand_code']) {
        
        // Validación de usuario y contraseña 
        if (isset($_POST['usuario']) && isset($_POST['contrasenia'])) {
            
            $usuarioIngresado = trim($_POST['usuario']);
            $contraseniaIngresada = trim($_POST['contrasenia']);
            
            // Conectar a la DB usando el ManagerMysqli incluido en el proyecto
            require_once __DIR__ . '/includes/mysqliConn.php';
            $mgr = new ManagerMysqli();
            $mysqli = $mgr->getConnection();

            $loginOk = false;
            if ($stmt = $mysqli->prepare("SELECT contraseña FROM dueños WHERE nombre = ? LIMIT 1")) {
                $stmt->bind_param("s", $usuarioIngresado);
                $stmt->execute();
                $stmt->bind_result($pass_db);
                if ($stmt->fetch()) {
                    // Comparación directa (sin hash) para compatibilidad con el esquema actual
                    if ($pass_db === $contraseniaIngresada) {
                        $loginOk = true;
                    }
                }
                $stmt->close();
            }
            $mysqli->close();

            if ($loginOk) {
                $_SESSION['usuario'] = $usuarioIngresado;
                $_SESSION['login_time'] = time();
                header('Location: inicio.php');
                exit();
            } else {
                $body = '\n                    <div class="container mt-5">\n                        <div class="alert alert-danger text-center" role="alert">\n                             ERROR EN LOS DATOS<br>\n                            Serás redirigido al formulario en 5 segundos...\n                        </div>\n                    </div>\n                    <script>\n                        setTimeout(function() {\n                            window.history.back(); \n                        }, 5000);\n                    </script>';
            }
                
        } else {
            $body = '\n                <div class="container mt-5">\n                    <div class="alert alert-danger text-center" role="alert">\n                         ERROR: No se recibieron datos del formulario<br>\n                        Serás redirigido al formulario en 5 segundos...\n                    </div>\n                </div>\n                <script>\n                    setTimeout(function() {\n                        window.history.back(); \n                    }, 5000);\n                </script>';
        }
        
    } else {
        // Captcha incorrecto 
        $body = '\n            <div class="container mt-5">\n                <div class="alert alert-danger text-center" role="alert">\n                     ERROR EN LOS DATOS<br>\n                    Serás redirigido al formulario en 5 segundos...\n                </div>\n            </div>\n            <script>\n                setTimeout(function() {\n                    window.history.back(); \n                }, 5000);\n            </script>';
    }
} else {
    // No se envia Captcha
    $body = '\n        <div class="container mt-5">\n            <div class="alert alert-danger text-center" role="alert">\n                 ERROR EN LOS DATOS<br>\n                Serás redirigido al formulario en 5 segundos...\n            </div>\n        </div>\n        <script>\n            setTimeout(function() {\n                window.history.back(); \n            }, 5000);\n        </script>';
}

oPage = new PageClass();
oPage->setBody($body);
echo $oPage->getHtml();
?>