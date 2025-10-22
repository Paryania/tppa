<?php

class PageClass
{
    private $header;
    private $navbar;
    private $body;
    private $js;
    private $footer;
    private $footer2;


    function __construct()
    {
       $this->setHeader();
       $this->setNavBar();
       $this->setJs();
       $this->setFooter();
       $this->setFooter2();

    }


 private function setHeader()
{
   $this->header='<!DOCTYPE html>
            <html lang="es">
             <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title>TINPET</title>
                <link rel="icon" href="/imgs/favicon.ico" type="image/x-icon">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            </head>
            <body class="">
           <style>
body {
    background-image: url("imgs/fondologin.png");
    background-size: cover;
    background-position:100px -150px;
    background-repeat: no-repeat;
    background-attachment: fixed;
    min-height: 100vh;
}
.card-img-top {
    object-fit: cover;
    height: 100px;
}

/* Opcional: agregar overlay para mejor legibilidad */
body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.1);
    z-index: -1;
}
</style>
                <div>';
                
}


   private function setNavBar()
{
    $this->navbar = '
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="imgs/tinpetlogo.png" width="50" height="50" class="d-inline-block align-top">
                TINPET
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="formMascotas.php">Acceder</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>';
}



    public function setBody($body)
    {
        $this->body=$body;
        $this->body.='</div>';
    }


    private function setJs()
    {
        $this->js='<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
                   <script src="js/formMascotas.js"></script>';
    }

    
private function setFooter()
{
    $this->footer = '
        <footer style="background-color: #1b8fb2ff; color: white; padding: 1rem 0; margin-top: 5rem;">
                  <div class="container">
                <div class="row">
                    <div class="col text-start">
                        <a href="index.php" class="text-decoration-none text-white">Volver</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>';

}
private function setFooter2()
{
    $this->footer2 = '
       <!-- Pie de página -->
<footer class="bg-dark text-light mt-5 py-4">
   
        <hr class="bg-light">
        <div class="text-center">
            <p class="mb-0">&copy; 2025 TinPet - Todos los derechos reservados.</p>
        </div>
   
</footer>
</body>
</html>';

}

    public function getHtml()
    {
        $Pagina=$this->header;
        $Pagina.=$this->navbar;
        $Pagina.=$this->body;
        $Pagina.=$this->js;
        $Pagina.=$this->footer;
        return $Pagina;
    }
    public function getHtmlINICIO()
    {
        $Pagina=$this->header;
        $Pagina.=$this->navbar;
        $Pagina.=$this->body;
        $Pagina.=$this->js;
        $Pagina.=$this->footer2;
        return $Pagina;
    }


}