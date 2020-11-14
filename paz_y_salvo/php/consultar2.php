<?php

require_once("../../php/connecion.php");

if(isset($_POST)){
    $documento = $_POST['documento'];

    $sql = "SELECT * FROM aprendices INNER JOIN ficha_programa ON aprendices.id_aprend = ficha_programa.id_aprend WHERE aprendices.id_aprend = '$documento'";
    $query=mysqli_query($connection,$sql);
    $fila = mysqli_fetch_assoc($query);

    if (!empty($fila) && $fila['id_estado'] == 4) {

        $sql_1 = "SELECT * FROM ficha_programa, aprendices, pro_formacion, cen_formacion, estado_aprendiz, region, tip_docu WHERE aprendices.id_aprend = ficha_programa.id_aprend AND ficha_programa.id_formacion = pro_formacion.id_formacion AND ficha_programa.id_cen_forma = cen_formacion.id_cen_forma AND estado_aprendiz.id_estado = ficha_programa.id_estado AND tip_docu.id_tip_docu = aprendices.id_tip_docu AND cen_formacion.id_region = region.id_region AND aprendices.id_aprend = '$documento'";
        $query_1 = mysqli_query($connection, $sql_1);
        $fila_1 = mysqli_fetch_assoc($query_1);

        $_SESSION['datos_aprendiz'] = $fila_1;
        header("location: ../pazysalvo.php");

    } else {
        echo "<script>
                alert('El usuario no existe o no está en estado Por Certificar');
                window.location= '../../biblioteca/biblio.html'
              </script>";
    }
}

?>
