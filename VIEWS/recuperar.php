<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/estiloRecuperar.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../assets/img/ien.ico" type="image/x-icon">
    <style>
        .recuperar {
            margin-top: 50px;
            ;
        }

        .con {
            margin-top: 55px;
            ;
        }


        .container {
            /* Estilos para el div container */
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Alineamos el contenido verticalmente en el centro */
        }


        /* Estilos para el icono de salida */
        .icono-salir {
            position: absolute;
            /* Posiciona el icono de salida de manera absoluta */
            top: 10px;
            /* Ajusta la posición vertical */
            right: 10px;
            /* Ajusta la posición horizontal para que esté en la parte derecha */
            font-size: 24px;
            /* Ajusta el tamaño del icono según tus preferencias */
            cursor: pointer;
            /* Cambia el cursor al estilo puntero */
        }

        /* Agrega un contenedor relativo para el formulario para que el icono de salida sea absoluto en relación a él */
        .contact-form {
            position: relative;
        }


        .recuperar-container ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }


        .info {
            margin-top: 49px;

        }

        .social-media {
            margin-top: 55px;
        }


        /* Estilos para el icono de salida en pantallas grandes */
        /* Estilos para el icono de salida en todas las resoluciones */
        .icono-salir {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;

            color: white;
        }

        .icono-salir:hover {

            color: #808080 !important;

        }


        /* Opcional: ajusta el tamaño del icono para pantallas muy pequeñas si es necesario */
        @media only screen and (max-width: 480px) {
            .icono-salir {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">


        <span class="big-circle"></span>
        <img src="../assets/img/shape.png" class="square" alt="" />
        <div class="form">
            <div class="contact-info">
                <div class="info">
                    <img src="../assets/img/logo2.png" alt="185px" width="250px">
                </div>
                <div class="social-media">
                    <p>Redes sociales :</p>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/ienuevohorizonte.medellin" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://ienuevohorizontemedellin.edu.co" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://ienuevohorizontemedellin.edu.co" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://ienuevohorizontemedellin.edu.co" target="_blank">
                            <i class="fa-brands fa-google"></i>
                        </a>
                    </div>
                </div>
            </div>



            <!-- ... (código previo) ... -->

            <div class="contact-form">


                <button> <a href="login.php">
                        
                        <i class="fa-solid fa-right-to-bracket icono-salir"></i>
                    
                </a>
            </button>
                        



                <form action="">
                    <h1 class="title" style="margin-top: 40px;">Recuperar Contraseña </h1>
                    <div class="con">
                        <div class="input-container">
                            <input type="number" id="documento" autocomplete="off" class="input" placeholder="Ingrese su documento" style="margin-bottom: 35px;" />
                        </div>
                    </div>
                    <button type="submit" id="recuperar" class="btn recuperar" style="margin-top: 10px;">RECUPERAR</button>
                </form>
            </div>

            <!-- ... (código posterior) ... -->

        </div>
    </div>


    <script src="../SRC/login/recover.js"></script>
    <!--Scripts Iconos -->
    <script src="https://kit.fontawesome.com/f669cfd668.js" crossorigin="anonymous"></script>

    <!--CDN SWEETALERT2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>