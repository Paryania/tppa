<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TinPet - Tinder para Perros</title>

   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .dog-card {
            transition: transform 0.3s;
            cursor: pointer;
        }
        .dog-card:hover {
            transform: scale(1.05);
        }
        .heart-icon {
            color: #ff4b6e;
        }
        .search-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
        }
        .navbar-brand {
            font-weight: bold;
            color: #ff4b6e !important;
        }
        .user-welcome {
            color: #6c757d;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-light">

<div class="container">
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="inicio.php">
            <i class="fas fa-paw me-2"></i>TinPet
        </a>
        
       
        <?php if(isset($_SESSION['usuario'])): ?>
        <div class="user-welcome mx-auto">
            <i class="fas fa-user me-1"></i>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>
        </div>
        <?php endif; ?>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="inicio.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <?php if(isset($_SESSION['usuario'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="mi_perfil.php"><i class="fas fa-user me-1"></i>Mi Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cerrarsesion.php"><i class="fas fa-sign-out-alt me-1"></i>Cerrar Sesión</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="procesoLogin.php"><i class="fas fa-sign-in-alt me-1"></i>Iniciar Sesión</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>