<?php

require_once("../php/connecion.php");

if(isset($_POST)){

    if(isset($_POST['documento'])) {
        $documento = $_POST['documento'];
        $rutaFirma;
    } else if (isset($_POST['auxDoc'])) {
        $documento = $_POST['auxDoc'];
        $rutaFirma;
    }

    $sql = "SELECT * FROM aprendices INNER JOIN ficha_programa ON aprendices.id_aprend = ficha_programa.id_aprend WHERE aprendices.id_aprend = '$documento'";
    $query=mysqli_query($connection,$sql);
    $fila = mysqli_fetch_assoc($query);

    if (!empty($fila) && $fila['id_estado'] == 4) {

        $sql_1 = "SELECT * FROM ficha_programa, aprendices, pro_formacion, cen_formacion, estado_aprendiz, region, tip_docu WHERE aprendices.id_aprend = ficha_programa.id_aprend AND ficha_programa.id_formacion = pro_formacion.id_formacion AND ficha_programa.id_cen_forma = cen_formacion.id_cen_forma AND estado_aprendiz.id_estado = ficha_programa.id_estado AND tip_docu.id_tip_docu = aprendices.id_tip_docu AND cen_formacion.id_region = region.id_region AND aprendices.id_aprend = '$documento'";
        $query_1 = mysqli_query($connection, $sql_1);
        $datos_aprendiz = mysqli_fetch_assoc($query_1);

        $_SESSION['id_ficha'] = $datos_aprendiz['id_ficha'];
        $_SESSION['num_ficha'] = $datos_aprendiz['num_ficha'];
        $_SESSION['id_aprend'] = $datos_aprendiz['id_aprend'];
        $_SESSION['id_cen_forma'] = $datos_aprendiz['id_cen_forma'];
        $_SESSION['id_estado'] = $datos_aprendiz['id_estado'];
        $_SESSION['nombre_aprend'] = $datos_aprendiz['nombre_aprend'];
        $_SESSION['apellido_aprend'] = $datos_aprendiz['apellido_aprend'];
        $_SESSION['correo_aprend'] = $datos_aprendiz['correo_aprend'];
        $_SESSION['telefono_aprend'] = $datos_aprendiz['telefono_aprend'];
        $_SESSION['id_tip_docu'] = $datos_aprendiz['id_tip_docu'];
        $_SESSION['num_celular'] = $datos_aprendiz['num_celular'];
        $_SESSION['direccion'] = $datos_aprendiz['direccion'];
        $_SESSION['nom_formacion'] = $datos_aprendiz['nom_formacion'];
        $_SESSION['nom_cen_forma'] = $datos_aprendiz['nom_cen_forma'];
        $_SESSION['id_region'] = $datos_aprendiz['id_region'];
        $_SESSION['nom_estado'] = $datos_aprendiz['nom_estado'];
        $_SESSION['nom_region'] = $datos_aprendiz['nom_region'];
        $_SESSION['nom_docu'] = $datos_aprendiz['nom_docu'];

        $sql_2 = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="pazysalvo.css">
</head>
<body>
    <div class="contenedor">
        <div class="contenedor_header">
            <div class="header_logo">
                <img src="../imagenes/sigasena.jpg" alt="" width="250">
            </div>
            <div class="header_titulo">
                <h3>SERVICIO NACIONAL DE APRENDIZAJE SENA</h3>
                <h3>PROCEDIMIENTO CERTIFICACIÓN ACADÉMICA</h3>
                <h3>FORMATO PAZ Y SALVO ACADÉMICO ADMINISTRATIVO</h3>
            </div>
        </div>
        <div class="paz_datos">
            <div class="datos_paz">
               <div>
                    <div>
                        <p>LUGAR:</p></div>
                    <div>
                        <p>FECHA DILIGENCIAMIENTO:</p>
                    </div>
                    <div>
                        <p>CENTRO DE FORMACION:</p>
                    </div>
                    <div>
                        <p>REGIONAL:</p>
                    </div>
               </div>
                <div class="datos_paz-lineas">
                    <div>
                        <p><?php echo $_SESSION['nom_region']?></p>
                    </div>
                    <div>
                        <p>14/11/2020</p>
                    </div>
                    <div>
                        <p><?php echo $_SESSION['nom_cen_forma']?></p>
                    </div>
                    <div>
                        <p><?php echo $_SESSION['nom_region']?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="paz_datos-usuario">
            <div class="datos_usuario-header">
                <h5>DATOS BÁSICOS DEL APRENDIZ</h5>
            </div>
            <div class="contenedor-columnas">
                <div class="datos_usuario-columna1">
                    <div>
                        <p>NOMBRES:</p>
                        <p><?php echo $_SESSION['nombre_aprend']?></p>
                    </div>
                    <div>
                        <P>APELLIDOS</P>
                        <p><p><?php echo $_SESSION['nombre_aprend']?></p></p>
                    </div>
                    <div>
                        <P>CORREO ELECTRONICO </P>
                        <p><?php echo $_SESSION['apellido_aprend']?></p>
                    </div>
                    <div>
                        <P>PROGRAMA DE FORMACION </P>
                        <p><?php echo $_SESSION['nom_formacion']?></p>
                    </div>
                    <div>
                        <P>NIVEL DE FORMACIÓN</P>
                        <!-- Campo faltante -->
                        <p>Tecnologo</p>
                    </div>
                    <div>
                        <P>NÚMERO DE FICHA </P>
                        <p><?php echo $_SESSION['num_ficha']?></p>
                    </div>
                </div>
                <div class="datos_usuario-columna2">
                    <div>
                        <P>TIPO DOCUMENTO DE IDENTIDAD</P>
                        <p><?php echo $_SESSION['nom_docu']?></p>
                    </div>
                    <div>
                        <P>NUMERO DOCUMENTO DE IDENTIDAD</P>
                        <p><?php echo $_SESSION['id_aprend']?></p>
                    </div>
                    <div>
                        <P>FECHA Y LUGAR DE EXPEDICIÓN</P>
                        <!-- Campo faltante -->
                        <p>14/06/2008 Ibagué, Tolima</p>
                    </div>
                    <div>
                        <P>DIRECCIÓN DE DOMICILIO</P>
                        <p><?php echo $_SESSION['direccion']?></p>
                    </div>
                    <div>
                        <P>TELEFONO FIJO DE CONTACTO</P>
                        <p><?php echo $_SESSION['telefono_aprend']?></p>
                    </div>
                    <div>
                        <P>NÚMERO CELULAR</P>
                        <p><?php echo $_SESSION['num_celular']?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="paz_responables">

            <!-- Filas -->

            <!-- Funcionarios -->
            <div class="columna1">
                <div class="fila">
                    <p class="centrar">FUNCIONARIOS QUE INTERVIENEN EN EL DILIGENCIAMIENTO</p>
                </div>
                <div class="fila">
                    <p>COORDINADOR ACADEMICO</p>
                </div>
                <div class="fila">
                    <p class="centrar">INSTRUCTOR SEGUIMIENTO ETAPA PRODUCTIVA</p>
                </div>
                <div class="fila">
                    <p class="centrar">RESPONSABLE BIENESTAR AL APRENDIZ</p>
                </div>
                <div class="fila">
                    <p class="centrar">RESPONSABLE AGENCIA PUBLICA DE EMPLEO</p>
                </div>
                <div class="fila">
                    <p>BIBLIOTECA</p>
                </div>
                <div class="fila"></div>
            </div>

            <!-- marcar con x -->
            <div class="columna2">
                <div class="fila">
                    <p class="centrar">Marcar con X</p>
                </div>
                <div class="fila"></div>
                <div class="fila"></div>
                <div class="fila"></div>
                <div class="fila"></div>
                <div class="fila"></div>
                <div class="fila"></div>
            </div>

            <!-- Descripcion -->
            <div class="columna3">
                <div class="fila-especial">
                    <div class="fila-especial1"></div>
                    <div class="fila-especial2">
                        <p>DESCRIPCIÓN DEL TRAMITE</p>
                    </div>
                </div>
                <div class="fila"></div>
                <div class="fila"></div>
                <div class="fila"></div>
                <div class="fila"></div>
                <div class="fila"></div>
                <div class="fila"></div>
            </div>

            <!-- Nombres y apellidos -->
            <div class="columna4">
                <div class="fila-especial">
                    <div class="fila-especial3">
                        <p>RESPONSABLES</p>
                    </div>
                    <div class="fila-especial4">
                        <p>NOMBRES Y APELLIDOS COMPLETOS</p>
                    </div>
                </div>
                <div class="fila"></div>
                <div class="fila"></div>
                <div class="fila"></div>
                <div class="fila"></div>
                <div class="fila"></div>
                <div class="fila"></div>
            </div>

            <!-- Firmas -->
            <div class="columna5">
                <div class="fila-especial">
                    <div class="fila-especial5"></div>
                    <div class="fila-especial6">
                        <p>FIRMA</p>
                    </div>
                </div>
                <?php
                    $usuario = "SELECT * FROM usuario WHERE documento = '147852369'";
                    $conUsuario=mysqli_query($connection,$usuario);
                    $arregloUsuario = mysqli_fetch_assoc($conUsuario);

                    $firma = $arregloUsuario['firma'];
                ?>
                <div class="fila">
                    <?php
                        if($firma != ""){
                    ?>
                        <form method="POST" id="firma_form" class="firma_form">
                            <input name="auxForm" type="hidden" value="1">
                            <input name="auxDoc" type="hidden" value="<?php echo $documento?>">
                            <input name="rutaFirma" type="hidden" value="<?php echo $firma?>">
                            <input id="btn_firmar" name="btn_firmar" type="submit" value="Firmar">
                        </form>
                    <?php
                        } 
                        if (isset($_POST['auxForm'])) {
                    ?>
                        <img src="<?php echo $firma;?>" alt="" width="100" height="100">
                    <?php
                        }
                    ?>
                </div>
                <div class="fila">

                </div>
                <div class="fila">

                </div>
                <div class="fila">

                </div>
                <div class="fila">

                </div>
                <div class="fila">

                </div>
            </div>
        </div>
        <div class="paz_firma-aprendiz">

        </div>
        <div class="contenedor_footer"></div>
    </div>
</body>

<script>
    const firma_form = document.getElementById("firma_form");
    const btn_firmar = document.getElementById("btn_firmar");
    console.log(firma_form);

    firma_form.addEventListener("submit", (e) => {
        e.preventDefault();

        btn_firmar.classList.add("firma_form-desaparecer");
    })
</script>
</html>

<?php
    }
}

?>