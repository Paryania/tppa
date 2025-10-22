<?php
if((!isset($_POST))||(!isset($_POST['usuario']))||(!isset($_POST['contrasenia']))){
    die ("No se recibieron los datos correctamente");
} else{
    require_once('C:/xampp/htdocs/TinPet/dueñoclass.php');
    
    $oDueño=new DueñoClass();

    if (ctype_alpha($_POST['usuario'])){
        $oDueño->setnombre(htmlspecialchars($_POST['usuario']));
    }
    
    if (ctype_alnum($_POST['contrasenia'])){
        $oDueño->setcontraseña(htmlspecialchars($_POST['contrasenia'])); 
    }
    
    if($oDueño->addDueño()){
        $msj="Usuario creado con éxito";
        // Redirigir al formulario de login para que el usuario pueda iniciar sesión
        header('Location: formMascotas.php');
        exit();
    } else {
        $msj="Error al crear el usuario";

    }
}
?>