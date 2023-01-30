<div class="row text-center py-2">
    <h1>Categorías de Productos</h1>
</div>

<div class="row text-center">
    <div class="col-md-4 text-center">
        <div class="card">
            <img src="img/uniforme.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Descripción Categoría</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Ver Productos</a>
            </div>
        </div>

    </div>

</div>


<!-- VENTANA MODAL INGRESAR -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ingresar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-0">
                <form action="./model/read.php?opcion=login" method="post">
                    <input type="text" name="username" placeholder="Nombre de Usuario" class="form-control">
                    <input type="password" name="password" placeholder="Contraseña" class="form-control">
                    <button type="submit" class="btn btn-primary form-control">Ingresar</button>

                    <input type="hidden" value="login" name="opcion">

                </form>
            </div>
            <div class="modal-footer pt-0">
                <button type="button" class="btn btn-secondary form-control" data-bs-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>