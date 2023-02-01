<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="d.js"></script>
    <title>MODELO</title>
</head>
<body>

    <center>
        <h1 class="Titulo_Mod">
            Modelos de Producto
        </h1>
        
    </center>
    <center>
        <table class="TablaModelo" border="1">
            <tr>
                <td>
                    <center>
                        <fieldset>
                            <img src="images.jpeg" alt="" width="150px" height="150px"> <br>
                            <label for="">Descripcion Modelo</label>
                            <button class="Btn_NModelo" onclick="abrirModal()" >
                                Ver Detalles
                            </button>
                        </fieldset>
                    </center>
                </td> 
                <td>
                    <center>
                        <fieldset>
                            <img src="images.jpeg" alt="" width="150px" height="150px"> <br>
                            <label for="">Descripcion Modelo</label>
                            <button class="Btn_NModelo" onclick="abrirModal()" >
                                Ver Detalles
                            </button>
                        </fieldset>
                    </center>
                </td>
                <td>
                    <center>
                        <fieldset>
                            <img src="images.jpeg" alt="" width="150px" height="150px"> <br>
                            <label for="">Descripcion Modelo</label>
                            <button class="Btn_NModelo" onclick="abrirModal()" >
                                Ver Detalles
                            </button>
                        </fieldset>
                    </center>
                </td>
                <td>
                    <center>
                        <fieldset>
                            <img src="images.jpeg" alt="" width="150px" height="150px"> <br>
                            <label for="">Descripcion Modelo</label>
                            <button class="Btn_NModelo" onclick="abrirModal()" >
                                Ver Detalles
                            </button>
                        </fieldset>
                    </center>
                </td>
                
            </tr>
            <tr>
                <td>
                    <center>
                        <fieldset>
                            <img src="images.jpeg" alt="" width="150px" height="150px"> <br>
                            <label for="">Descripcion Modelo</label>
                            <button class="Btn_NModelo" onclick="abrirModal()" >
                                Ver Detalles
                            </button>
                        </fieldset>
                    </center>
                </td>
                <td>
                    <center>
                        <fieldset>
                            <img src="images.jpeg" alt="" width="150px" height="150px"> <br>
                            <label for="">Descripcion Modelo</label>
                            <button class="Btn_NModelo" onclick="abrirModal()" >
                                Ver Detalles
                            </button>
                        </fieldset>
                    </center>
                </td>
                <td>
                    <center>
                        <fieldset>
                            <img src="images.jpeg" alt="" width="150px" height="150px"> <br>
                            <label for="">Descripcion Modelo</label>
                            <button class="Btn_NModelo" onclick="abrirModal()" >
                                Ver Detalles
                            </button>
                        </fieldset>
                    </center>
                </td>
                <td>
                    <center>
                        <fieldset>
                            <img src="images.jpeg" alt="" width="150px" height="150px"> <br>
                            <label for="">Descripcion Modelo</label>
                            <button class="Btn_NModelo" onclick="abrirModal()" >
                                Ver Detalles
                            </button>
                        </fieldset>
                    </center>
                </td>
                
                
            </tr>
            <tr>
                <td>
                    <center>
                        <fieldset>
                            <img src="images.jpeg" alt="" width="150px" height="150px"> <br>
                            <label for="">Descripcion Modelo</label>
                            <button class="Btn_NModelo" onclick="abrirModal()" >
                                Ver Detalles
                            </button>
                        </fieldset>
                    </center>
                </td>
                <td>
                    <center>
                        <fieldset>
                            <img src="images.jpeg" alt="" width="150px" height="150px"> <br>
                            <label for="">Descripcion Modelo</label>
                            <button class="Btn_NModelo" onclick="abrirModal()" >
                                Ver Detalles
                            </button>
                        </fieldset>
                    </center>
                </td>
                <td>
                    <center>
                        <fieldset>
                            <img src="images.jpeg" alt="" width="150px" height="150px"> <br>
                            <label for="">Descripcion Modelo</label>
                            <button class="Btn_NModelo" onclick="abrirModal()" >
                                Ver Detalles
                            </button>
                        </fieldset>
                    </center>
                </td>
                <td>
                    <center>
                        <fieldset>
                            <img src="images.jpeg" alt="" width="150px" height="150px"> <br>
                            <label for="">Descripcion Modelo</label>
                            <button class="Btn_NModelo" onclick="abrirModal()" >
                                Ver Detalles
                            </button>
                        </fieldset>
                    </center>
                </td>
               
            </tr>
            
        </table>
    </center>

    <section class="modal">
        <div class="modal_contenedor">
            <h2 class="modal_titulo">
                Detalles del Modelo
            </h2>
            
            <hr>
            <img src="img.jpeg" alt="" width="250px" height="250px" style="position: absolute;"> <br>
            <center>
                
                <label for="">Descripcion:</label>
                <input type="text" name="" id="" value="xxxx"><br>
                <label for="">Stock:</label>
                <input type="text" name="" id="" value="10"><br>
                <label for="">Precio:</label>
                <input type="text" name="" id="" value="$20"><br>
                <label for="">Tela:</label>
                <input type="text" name="" id="" value="xxxx"><br>
                <label for="">Talla:</label>
                <input type="text" name="" id="" value="L"><br>
                <label for="">Genero:</label>
                <input type="text" name="" id="" value="Mujer"><br>
                <label for="">Color:</label>
                <input type="text" name="" id="" value="L"><br>

                
            
                <label for="">Cantidad</label>
                <input type="number">
            </center>
            <br> <br>
            <br><br>
            
            <button class="Btn_NModelo" >Ver Carrito</button>
            <button class="Btn_NModelo" >Anadir al carrito</button><br>
            
            <button class="BtnSalir" onclick="cerrarModal()">Salir</button>
        </div>
    </section>

    


    <style type="text/css">
        .Titulo_Mod{
            font-size: 36pt;
            font-weight: bold;
        }

        .BtnsModif{
            font-size: 14pt;
            border-radius: 5px;
            color: white;
            background-color: #049c0c;
            margin: 5px;
        }
        .modal, .modal2{
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #111111bd;
    display: flex;
    opacity: 0;
    pointer-events: none;
    transition: opacity .5s;
}

.modal_contenedor{
    margin: auto;
    width: 100%;
    max-width: 800px;
    background-color: white;
    max-height: 100%;
    border-radius: 6px;
    padding: 3em 2.5em;
    display:flow-root;
    gap: 1em;
    
    place-items: center;
    grid-template-columns: 100%;
}

hr{
    border: 2px solid;
    width: 100%;
}

.modal_titulo{
    font-size: 2.8rem;
}

.modal_parrafo{
    margin-bottom: 10px;
}

.BtnSalir{
    font-size: 18px;
    border-radius: 6px;
    height: 50px;
    width: 250px;
    color: white;
    background-color: red;
}

.BtnGuardar{
    font-size: 18px;
    border-radius: 6px;
    height: 50px;
    width: 250px;
    color: white;
    background-color: blue;
}

.BtnSalir:hover{
    background-color: white;
    color: red;
}

.BtnGuardar:hover{
    background-color: white;
    color: blue;
}

.IngresoModelo{
    font-size: 20px;
    text-align: center;
    padding: 1rem 3rem;
    border: 1px solid;
    border-radius: 6px;
    display: relative;
    font-weight: 300;
}

.modal--mostrar{
    opacity: 1;
    pointer-events: unset;
    transition: opacity .5s;
}
        .BtnsModif:hover{
            color: black;
            cursor: pointer;
        }

        .BtnsElim{
            font-size: 14pt;
            border-radius: 5px;
            color: white;
            background-color: #ff0000;
            margin: 5px;
        }

        .BtnsElim:hover{
            cursor: pointer;
            color: black;
        }
        
        .TablaModelo{
            width: 450px;
            font-size: 16pt;
            border-color: black;
        }

        .Btn_NModelo {
            border-radius: 10px;
            font-size: 20pt;
            color: rgb(255, 255, 255);
            background-color:  #2c7ce3 ;
            height: 50px;
            width: 250px;
            margin-bottom: 20px;
        }

        .Btn_NModelo:hover{
            color: rgb(0, 0, 0);
            cursor: pointer;
            /*background-color:  #99bded ;*/
        }

        .Btn_ADatos {
            border-radius: 10px;
            font-size: 20pt;
            color: rgb(255, 255, 255);
            background-color: #049c0c;
            height: 50px;
            width: 250px;
            margin-bottom: 20px;
        }
        
        .Btn_ADatos:hover{
            cursor: pointer;
            color: rgb(0, 0, 0);
            /*background-color:  #84fa8a ;*/
        }
    </style>
</body>
<footer>

</footer>
</html>