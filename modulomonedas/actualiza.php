<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$oldNombre = $conexion->real_escape_string($_POST['nombreOld']);
$estado = $conexion->real_escape_string($_POST['estado']);

$maxsize = 1000000;
$band = true;

$size = intval(filesize($_FILES['ara']['tmp_name']));


if ($size <= $maxsize) {
    $band = true;
}else{
    $band = false;
}


if($oldNombre == $nombre){
    

    
    if(empty($_FILES['ara']['tmp_name'])){

        $sqlmonedas = "UPDATE tmone_tme 
        SET tmone_namemo = '$nombre', tmone_status = '$estado' WHERE tmone_idmone='$id'";



        if($conexion->query($sqlmonedas)){

        }else{
            echo "errors";
        }

        header('Location: ../paneladmin.php?modulo=monedas');
        
    } else {



        
            
        
        $imagen = addslashes(file_get_contents($_FILES['ara']['tmp_name']));

        $sqlmonedas = "UPDATE tmone_tme 
        SET tmone_namemo = '$nombre', tmone_status = '$estado', tmone_imagen = '$imagen' WHERE tmone_idmone='$id'";

            if ($band) {
                if($conexion->query($sqlmonedas)){

                }
                header('Location: ../paneladmin.php?modulo=monedas');
            }else{
                echo "<script>alert('La imagen supera el tamaño maximo permitido de 1MB'); window.location.href = '../paneladmin.php?modulo=monedas';</script>";
            }
        

 
       
    }
    
    

} else {

    $sqlNombreMoneda = "SELECT tmone_namemo FROM tmone_tme WHERE tmone_namemo = '$nombre'";

    $request2 = $conexion->query($sqlNombreMoneda);

    if(mysqli_num_rows($request2) == 0){


        if(empty($_FILES['ara']['tmp_name'])){
            $sqlmonedas = "UPDATE tmone_tme 
            SET tmone_namemo = '$nombre', tmone_status = '$estado' WHERE tmone_idmone='$id'";
    
    
    
            if($conexion->query($sqlmonedas)){
            }
    
            header('Location: ../paneladmin.php?modulo=monedas');
        } else {

            $imagen = addslashes(file_get_contents($_FILES['ara']['tmp_name']));

            $sqlmonedas = "UPDATE tmone_tme 
            SET tmone_namemo = '$nombre', tmone_status = '$estado', tmone_imagen = '$imagen' WHERE tmone_idmone='$id'";
    
            if ($band) {
                if($conexion->query($sqlmonedas)){

                }

                header('Location: ../paneladmin.php?modulo=monedas');
            }else {
                echo "<script>alert('La imagen supera el tamaño maximo permitido de 1MB'); window.location.href = '../paneladmin.php?modulo=monedas';</script>";
            }
            
    
            
        }


    }else{
        
        echo "<script>alert('El nombre de la moneda ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=monedas';</script>";
    }
}







// ?>