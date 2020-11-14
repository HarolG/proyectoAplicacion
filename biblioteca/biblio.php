<?php
    require_once("../php/connecion.php");
    $usuario = $_GET["usuario"];

    if(isset($_FILES['file'])) {
        $directorio = "../uploads/" . $usuario;
        
        if (!file_exists($directorio)) {
            mkdir($directorio, 0777, true);
        }

        $directorio = $directorio . "/";

        $archivo = $directorio . basename($_FILES["file"]["name"]); // uploads/carta.pdf
        $nombreArchivo = $_FILES["file"]["name"];
        $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
        $tamañoArchivo = $_FILES["file"]["size"];

        
            if ($tamañoArchivo <= 209715200) {

                if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                    echo "<script>alert('El archivo se subió correctamente')</script>";
                    
                    $sql = "UPDATE usuario SET firma = '$archivo' WHERE usuario.documento = '$usuario'";
                    $consultarSql = mysqli_query($connection,$sql);
                    
                } else {
                    echo "<script>alert('Ha ocurrido un error al subir el archivo')</script>";
                }

            } else {
                echo "<script>alert('El peso del archivo es superior a 200MB')</script>";
            }   
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="biblio.css">
    <link rel="stylesheet" href="../paz_y_salvo/pazysalvo.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body>

    <header class="header">

        <div class="encabezado">
            <div class="foto-encabezado">
                <img class="foto_perfil-encabezado" src="../imagenes/Imagen2.png" alt="Foto de perfil" width="90" height="90">
            </div>

            <div class="datos-encabezado">
                <h2>BIBLIOTECA</h2>
                <a href="#">CERRAR SESIÓN</a>
            </div>
            <img class="logo-sena" src="../imagenes/naranja.png" alt="" width="226" height="220">
        </div>

        <div class="menu">
            <div class="contenedor_paz">
                <a id="btn_pazysalvo">PAZ Y SALVO</a>
                <div class="cuadro" id="cuadro">
                    <form action="../paz_y_salvo/pazysalvo.php" method="POST" id="frm_1">
                        <label for="documento">Documento de identidad</label>
                        <input class="input" type="number" name="documento" id="documento" placeholder="Ingrese el documento">
                        <input class="submit" type="submit" value="Buscar">
                    </form>
                </div>
            </div>
            <a href="#"><img src="../imagenes/Imagen6.png" alt="" width="39" height="30">APRENDIZ</a>
        </div>

    </header>
    
    <div class="main">

        <div class="fondo-biblioteca">
            <!-- Para el que lea, el fondo del instructor lo puse por css mediante un background -->
            <img class="foto-perfil" src="../imagenes/PERFIL.jpg" alt="">
        </div>

        <div class="datos_biblioteca">
            <div class="caja_datos"> 
                <h4>Soy una persona empendedora que mira hacia adelante y siempre intenta ser mejor cada dia</h4>
                <p>NOMBRE:</p>
                <p>EDAD:</p>
                <p>TELEFONO:</p>
                <p>EMAIL:</p>
            </div>
        </div>

        <div class="caja_btn">
            <a href="#">EDITAR</a>
        </div>

        <div class="opciones_biblioteca">
            <a href="#">PAZ Y SALVO</a>
            <a href="#">APRENDICES</a>
        </div>

        <div class="caja_form">
            <form method="post" enctype="multipart/form-data" class="form_2" id="form_2">
                <h3>Subir Firma</h3>
                <input type="file" name="file">
                <p class="center"><input id="btn_subirfirma" type="submit" value="Subir Archivo"></p>
            </form>
        </div>
    </div>

    <footer class="footer">
        <img src="../imagenes/logo blanco.jpg" alt="Logo SENA Blanco" width="70" height="70">

        <div class="info">
            <p>© Servicio Nacional de Aprendizaje SENA</p>
            <p>Centro de Industria y Construccion- Ibague-Tolima</p>
            <p>Direccion: 141- Sector, Cra. 45 Sur #1255</p>
        </div>
        
    </footer>
    <script src="script/biblio.js"></script>
    <script src="script/submenu.js"></script>
</body>
</html>