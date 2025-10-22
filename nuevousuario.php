<?php

require_once __DIR__.'\includes\PageClass.php';



$body='

    
<div class="ps-3">
    <form id="formMascotas" method="post" action="procesonewusuario.php" style="width: 260px;">
        
        <div class="mb-3">
            <label class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
        </div>

        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="contrasenia" name="contrasenia" placeholder="Contraseña">
        </div>
        <button class="btn-hueso-discreto" type="submit">
            Crear Usuario
        </button>
    </form>
</div>

<style>

.mb-3 {
    font-family: Georgia, serif;
    font-style: italic;
}


.btn-hueso-discreto {
    background: #1b8fb2ff;
    color: white;
    border: none;
    padding: 12px 30px;
    font-weight: bold;
    border-radius: 8px;
    cursor: pointer;
    width: 100%;
    font-size: 1.1rem;
    transition: all 0.2s ease;
}

.btn-hueso-discreto:hover {
    background: #157293;
    transform: translateY(-1px);
}
</style>';

$oPage=new PageClass();

  $oPage->setBody($body);

echo $oPage->getHtml();


?>
