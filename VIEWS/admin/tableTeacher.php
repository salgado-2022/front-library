<?php include_once '../partials/head.php' ?>

<?php include_once '../partials/sidebar.php' ?>
<?php
if (!tienePermiso('Usuarios', $permisos)) {
    echo '<script>window.location.href = "http://librarysoft.site/LIBRARYSOFTT/FRONT-END/VIEWS/404.php";</script>';
    exit;
}
?>


<!--CONTENIDO DE LA PAGINA-->
<div class="content-wrapper" id="contenido">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1 class="text-center d-flex justify-content-start"><i class="fa-solid fa-user iconsTitle"></i>
                                Usuarios </h1>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-end">
                            <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Inicio</a> /</li>
                                    <li class="breadcrumb-item active" aria-current="page">Listado de Profesores</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content ">
        <div class="container-fluid card p-3">

                    <table id="tablaProfesor" class="table table-striped nowrap dt-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Rol</th>
                                <th scope="col">Documento</th>
                                <th scope="col" class="show-on-desktop">Correo</th>
                                <th scope="col" class="show-on-desktop">Nombres</th>
                                <th scope="col" class="show-on-desktop">Apellidos</th>
                                <th class="show-on-desktop">Estado</th>
                                <th style="text-align: center;" class="show-on-desktop">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>



        </div>

</div>

</div>


<!-- Modal Actualizar Usuario-->
<div class="modal fade" id="modalUpdateUsers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">EDITAR </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrar"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 formularior" action="usuarios.html" id="formulari">

                    <!-- Grupo: id -->

                    <input type="hidden" class="formulario__input" name="idBeneficiario" id="idBeneficiario">




                    <!-- Grupo: Rol -->
                    <div class="col-md-6 formulario__grupo" id="grupo__rol">
                        <label for="nombreRol" class="formulario__label">Rol</label>
                        <div class="formulario__grupo-input">
                            <select class="form-control form-select" id="nombrerol" name="nombreRol">

                            </select>
                        </div>
                    </div>

                    <!-- Grupo: Documento -->
                    <div class="col-md-6 formulario__grupo" id="grupo__documento">
                        <label for="documento" class="formulario__label">Documento</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" autocomplete="off" name="documento" id="documento" onkeypress="return solonumeros(event)">
                            <div class="invalid-feedback">
                                Por favor, ingrese solo números en este campo.
                            </div>
                        </div>
                    </div>

                    <!-- Grupo: Nombres -->
                    <div class="col-md-6 formulario__grupo" id="grupo__nombres">
                        <label for="nombres" class="formulario__label">Nombres</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" autocomplete="off" name="nombres" id="nombres" onkeypress="return sololetras(event)">
                            <div class="invalid-feedback">
                                Por favor, ingrese solo letras en este campo.
                            </div>
                        </div>
                    </div>

                    <!-- Grupo: Apellidos-->
                    <div class="col-md-6 formulario__grupo" id="grupo__apellidos">
                        <label for="apellidos" class="formulario__label">Apellidos</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" autocomplete="off" name="apellidos" id="apellidos" onkeypress="return sololetras(event)">
                            <div class="invalid-feedback">
                                Por favor, ingrese solo letras en este campo.
                            </div>
                        </div>
                    </div>
                    <!-- Grupo: Correo Electrónico -->
                    <div class="col-md-6 formulario__grupo" id="grupo__correo">
                        <label for="correo" class="formulario__label">Correo Electrónico</label>
                        <div class="input-group has-validation">
                            <input type="email" class="form-control" autocomplete="off" name="correo" id="correo">
                            <div class="invalid-feedback">
                                Por favor, ingrese un correo electrónico válido.
                            </div>
                        </div>
                    </div>
        
                    <div class="modal-footer">
                        <button type="button" id="actualiza" class="btn btn-library">Editar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</section>
</div>


<script>
    $(document).ready(() => {
        listarUsuariosT();

        $('#tablaProfesor').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            dom: 'Bfrtp',
            responsive: true, // Enable responsive behavior
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });




    });
</script>



<script src="../../SRC/usuarios/listTeacher.js"></script>
<script src="../../assets/js/validacionCampos.js"></script>
<script src="../../assets/js/validarUser.js"></script>
<script src="../../SRC/usuarios/add.js"></script>
<script src="../../SRC/usuarios/updateTeacher.js"></script>
<script src="../../SRC/usuarios/update2.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--PIE DE PAGINA-->


<?php
include_once '../partials/footer.php' ?>
