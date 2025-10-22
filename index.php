<?php

require_once __DIR__.'\includes\PageClass.php';

$body = '
<div style="background-color: #f9fcfcff; padding: 60px 20px; font-family: Georgia, serif;">

    <!-- Texto principal -->
    <div style="text-align: center; margin-bottom: 40px;">
        <p style="font-style: italic; font-size: 1.3rem; margin-bottom: 5px;">Elegí la mejor</p>
        <h1 style="font-weight: bold; font-size: 2.8rem; margin-bottom: 10px;">pareja para tu mascota</h1>
        <p style="color: #666; font-size: 1rem;">Fácil, rápido y seguro para encontrar el compañero perfecto.</p>
    </div>

    <!-- Contenedor principal de tarjetas -->
    <div style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">

        <div style="background: white; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.07); max-width: 450px; 
        height: 280px; display: flex; overflow: hidden; position: absolute; top: 400px; left: 50px;">
    <img src="imgs/imagen1.png" style="width: 200px; object-fit: cover;" alt="Imagen 1">
    <div style="padding: 20px;">
        <p style="font-style: italic; margin-bottom: 5px;">Encuentro Tu</p>
        <h3 style="font-weight: bold; margin-bottom: 10px;">Pareja Ideal</h3>
        <p style="font-size: 0.9rem; color: #333;">
            Conecta con compañeros caninos. Explora perfiles, razas y encuentra amigos para siempre. Tu perro merece una mascota.
        </p>
    </div>
</div>

        <!-- Tarjeta Central -->
        <div style="background: white; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.07); max-width: 380px; text-align: center; padding: 20px;">
            <img src="imgs/imagen2.png" style="width: 100%; border-radius: 15px; margin-bottom: 20px;" alt="Imagen 2">
            <a href="nuevousuario.php" style="margin-top: 15px; display: inline-block; background-color: #1b8fb2ff; 
            color: white; padding: 12px 30px; border-radius: 12px; text-decoration: none; font-weight: bold; font-size: 1.1rem;">¡Empezar ahora!</a>
        </div>

        <!-- Tarjeta Derecha -->
        <div style="background: white; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.07); max-width: 450px; 
        height: 280px; display: flex; overflow: hidden; position: absolute; top: 400px; right: 50px;">
            <img src="imgs/imagen3.png" style="width: 200px; object-fit: cover;" alt="Imagen 3">
            <div style="padding: 20px;">
                <p style="font-style: italic; margin-bottom: 5px;">Conecta con</p>
                <h3 style="font-weight: bold; margin-bottom: 10px;">dueños responsables</h3>
                <p style="font-size: 0.9rem; color: #333;">
                    Filtra por preferencias, ubicación y únete a la comunidad de amantes de los perros que buscan lo mejor.
                </p>
                <a href="masinfo.php" style="display: inline-block; margin-top: 10px; padding: 8px 16px; background: #d9f2f4; 
                color: #067; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.9rem;">Más información</a>
            </div>
        </div>

    </div>
</div>';

$oPage = new PageClass();
$oPage->setBody($body);
echo $oPage->getHtmlINICIO();

