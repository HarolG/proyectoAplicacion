<?php 

require_once("connecion.php");

$directorio = "../uploads/"; 

        $archivo = $directorio . basename($_FILES["file"]["name"]); // uploads/carta.pdf
        $nombreArchivo = $_FILES["file"]["name"];
        $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
        $tamañoArchivo = $_FILES["file"]["size"];

        
            if ($tamañoArchivo <= 209715200) {

                if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                    echo "El archivo se subió correctamente";
                    
                    $sql = "UPDATE usuario SET firma = '$archivo' WHERE usuario.documento = '147852369'";
                    $consultarSql = mysqli_query($connection,$sql);
                    
                } else {
                    echo "El archivo no se ha subido correctamente";
                }

            } else {
                echo "El peso del archivo es superior a 200MB";
            }   

?>