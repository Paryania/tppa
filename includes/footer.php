</div>

<footer class="bg-dark text-light mt-5 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5><i class="fas fa-paw me-2"></i>TinPet</h5>
                <p>La red social canina para encontrar el compañero perfecto para tu mascota.</p>
            </div>
            <div class="col-md-4">
                <h5>Enlaces rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="inicio.php" class="text-light">Inicio</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contacto</h5>
                <p class="mb-1"><i class="fas fa-envelope me-2"></i>info@tinpet.com</p>
                <p class="mb-1"><i class="fas fa-phone me-2"></i>+54 343 4684133</p>
                <div class="mt-2">
                    <a href="#" class="text-light me-3"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-light me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-light me-3"><i class="fab fa-twitter fa-lg"></i></a>
                </div>
            </div>
        </div>
        <hr class="bg-light">
        <div class="text-center">
            <p class="mb-0">&copy; 2025 TinPet - Todos los derechos reservados.</p>
        </div>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script>
    
    $(document).ready(function() {
        $('.dog-card').click(function() {
            const dogId = $(this).data('dog-id');
            const dogName = $(this).find('.card-title').text();
            
            
            if(Math.random() > 0.7) {
                alert(`¡Match! ${dogName} también está interesado/a en tu perro.`);
            } else {
                alert(`Has mostrado interés en ${dogName}`);
            }
        });

        
        $('.btn-like').click(function(e) {
            e.stopPropagation();
            const dogName = $(this).closest('.dog-card').find('.card-title').text();
            alert(`¡Like enviado a ${dogName}!`);
        });

        $('.btn-pass').click(function(e) {
            e.stopPropagation();
            const dogName = $(this).closest('.dog-card').find('.card-title').text();
            alert(`Has pasado sobre ${dogName}`);
        });
    });
</script>

</body>
</html>