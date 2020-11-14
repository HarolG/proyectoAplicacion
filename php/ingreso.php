<?php

    session_start();

    require 'connecion.php';   
            
            $usuario = $_POST["usuario"];
            $clave = $_POST["clave"];
           
            
                $consul = "SELECT * FROM usuario WHERE documento = '$usuario'  and clave = '$clave'";
                $query=mysqli_query($connection,$consul);
                $fila = mysqli_fetch_assoc($query);

              

                        if($fila){
                            $_SESSION['id_tip_usu'] = $fila['id_tip_usu'];
                            $_SESSION['usuario'] = $fila['nombre'];


                                if($_SESSION["id_tip_usu"] == 1 ){
                                    
                                    header("location: ../administrador/admin.html");
                                    exit();
                                }
                                elseif($_SESSION["id_tip_usu"] == 2 ){
                                    header("location: ../segui/segui.html");
                                    exit();
                                }elseif($_SESSION["id_tip_usu"] == 3){
                                    header("location: ../instru/instructor.html");
                                }elseif ($_SESSION["id_tip_usu"] == 4){
                                    header("location: ../APE/ape.html");
                                }elseif ($_SESSION["id_tip_usu"] == 5){
                                    header("location: ../bienestar/biene.html");
                                }elseif ($_SESSION["id_tip_usu"] == 6){
                                    header("location: ../cor_academico/cordinh.html");
                                }elseif ($_SESSION["id_tip_usu"] == 7){
                                    header("location: ../biblioteca/biblio.php?usuario=$usuario");
                                }
                                 else{
                                    header("location: ../index.html");
                                }  
                                
                        } else{
                            
                            echo "error ";
                                exit();
                        }  
                                                
        
                      

?>     



