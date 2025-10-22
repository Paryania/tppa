<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header('Location: procesoLogin.php');
    exit();
}
?>

<?php require_once 'includes/head.php'; ?>

<br />

<h4 class="text-center">TinPet - Tinder para Perros</h4>

<div class="alert alert-info text-center">
    <i class="fas fa-bone me-2"></i>Hola <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>, encuentra compañeros para tu mascota
</div>

<br />

<div class="row mb-4">
    <div class="col-12">
        <div class="search-box p-4 shadow">
            <h2 class="text-center mb-3">Encuentra el compañero perfecto para tu perro</h2>
            <form class="row g-3">
                <div class="col-md-3">
                    <select class="form-select">
                        <option selected>Raza...</option>
                        <option>Golden Retriever</option>
                        <option>Husky Siberiano</option>
                        <option>Bulldog Francés</option>
                        <option>Border Collie</option>
                        <option>Labrador</option>
                        <option>Poodle</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option selected>Edad...</option>
                        <option>Cachorro (0-1 año)</option>
                        <option>Joven (1-3 años)</option>
                        <option>Adulto (3-8 años)</option>
                        <option>Senior (8+ años)</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option selected>Ubicación...</option>
                        <option>Buenos Aires</option>
                        <option>Córdoba</option>
                        <option>Mendoza</option>
                        <option>Rosario</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-light w-100">
                        <i class="fas fa-search me-2"></i>Buscar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<h3 class="mb-4"><i class="fas fa-heart heart-icon me-2"></i>Perfiles Recomendados</h3>

<div class="row">
    <?php
    // Datos de ejemplo de perros
    $perros = [
        [
            'id' => 1,
            'nombre' => 'Max',
            'raza' => 'Golden Retriever',
            'edad' => '3 años',
            'ubicacion' => 'Buenos Aires',
            'foto' => 'https://images.unsplash.com/photo-1552053831-71594a27632d?w=300',
            'descripcion' => 'Juguetón y amigable, le encanta correr en el parque'
        ],
        [
            'id' => 2,
            'nombre' => 'Luna',
            'raza' => 'Husky Siberiano',
            'edad' => '2 años',
            'ubicacion' => 'Córdoba',
            'foto' => 'https://images.unsplash.com/photo-1568572933382-74d440642117?w=300',
            'descripcion' => 'Energética y curiosa, adora la nieve y los paseos largos'
        ],
        [
            'id' => 3,
            'nombre' => 'Rocky',
            'raza' => 'Bulldog Francés',
            'edad' => '4 años',
            'ubicacion' => 'Mendoza',
            'foto' => 'https://http2.mlstatic.com/D_NQ_NP_2X_642132-MLA89081587972_082025-T.webp',
            'descripcion' => 'Tranquilo y cariñoso, perfecto para apartamentos'
        ],
        [
            'id' => 4,
            'nombre' => 'Bella',
            'raza' => 'Border Collie',
            'edad' => '1.5 años',
            'ubicacion' => 'Rosario',
            'foto' => 'https://maikaipets.com/wp-content/uploads/Mesa-de-trabajo-5-100-1.jpg',
            'descripcion' => 'Inteligente y activa, necesita mucho ejercicio'
        ],
        [
            'id' => 5,
            'nombre' => 'Toby',
            'raza' => 'Labrador',
            'edad' => '2 años',
            'ubicacion' => 'Mar del Plata',
            'foto' => 'https://images.unsplash.com/photo-1537204696486-967f1b7198c8?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bGFicmFkb3IlMjByZXRyaWV2ZXJ8ZW58MHx8MHx8fDA%3D',
            'descripcion' => 'Amigable con todos, le encanta nadar'
        ],
        [
            'id' => 6,
            'nombre' => 'Maya',
            'raza' => 'Poodle',
            'edad' => '5 años',
            'ubicacion' => 'Salta',
            'foto' => 'https://thumbs.dreamstime.com/b/perro-de-caniche-42882116.jpg',
            'descripcion' => 'Elegante y tranquila, ideal para familias'
        ]
    ];

    foreach($perros as $perro): 
    ?>
    <div class="col-md-4 col-lg-3 mb-4">
        <div class="card dog-card shadow" data-dog-id="<?php echo $perro['id']; ?>">
            <img src="<?php echo $perro['foto']; ?>" class="card-img-top" alt="<?php echo $perro['nombre']; ?>" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $perro['nombre']; ?></h5>
                <p class="card-text mb-1">
                    <i class="fas fa-dog text-muted me-2"></i><?php echo $perro['raza']; ?>
                </p>
                <p class="card-text mb-1">
                    <i class="fas fa-birthday-cake text-muted me-2"></i><?php echo $perro['edad']; ?>
                </p>
                <p class="card-text mb-2">
                    <i class="fas fa-map-marker-alt text-muted me-2"></i><?php echo $perro['ubicacion']; ?>
                </p>
                <p class="card-text small text-muted"><?php echo $perro['descripcion']; ?></p>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-outline-danger btn-sm btn-pass">
                        <i class="fas fa-times"></i> Pass
                    </button>
                    <button class="btn btn-outline-success btn-sm btn-like">
                        <i class="fas fa-heart"></i> Like
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>


<?php require_once 'includes/footer.php'; ?>
