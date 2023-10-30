<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas

$Tipo_doc_prov = (isset($_POST['Tipo_doc_prov'])) ? $_POST['Tipo_doc_prov'] : "";
$Id_prov  = (isset($_POST['Id_prov'])) ? $_POST['Id_prov'] : "";
$Nom_prov = (isset($_POST['Nom_prov'])) ? $_POST['Nom_prov'] : "";
$Ape_prov = (isset($_POST['Ape_prov'])) ? $_POST['Ape_prov'] : "";
$Insumo = (isset($_POST['Insumo'])) ? $_POST['Insumo'] : "";
$Direc_pro = (isset($_POST['Direc_pro'])) ? $_POST['Direc_pro'] : "";
$Tel_prov = (isset($_POST['Tel_prov'])) ? $_POST['Tel_prov'] : "";
$Correo_pro = (isset($_POST['Correo_pro'])) ? $_POST['Correo_pro'] : "";


$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':



     


                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
                $insercionProveedor = $conn->prepare(
                    "INSERT INTO proveedor (Tipo_doc_prov, Id_prov, 
                Nom_prov, Ape_prov, Insumo, Direc_pro, Tel_prov, Correo_pro) 
                VALUES ('$Tipo_doc_prov','$Id_prov','$Nom_prov','$Ape_prov', '$Insumo','$Direc_pro','$Tel_prov','$Correo_pro')"
                );



                $insercionProveedor->execute();
                $conn->close();
               
               echo" <script>
                    swal('Mensaje Principal!', 'Mensaje segundario!', 'success');
                    </script>";
                

                header('location: index.php');
           




        break;

    case 'btnModificar':

        $editarProveedor = $conn->prepare(" UPDATE proveedor SET Tipo_doc_prov = '$Tipo_doc_prov',
        Nom_prov = '$Nom_prov', Ape_prov = '$Ape_prov', Insumo = '$Insumo', Direc_pro = '$Direc_pro', Tel_prov = '$Tel_prov', Correo_pro = '$Correo_pro'
        WHERE Id_prov = '$Id_prov' ");

     

        $editarProveedor->execute();
       
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        /* 
        $consultaFoto = $conn->prepare(" SELECT foto FROM empleados
        WHERE id = '$txtId' "); */

        $eliminarProveedor = $conn->prepare(" DELETE FROM proveedor
        WHERE Id_prov = '$Id_prov' ");

        // $consultaFoto->execute();
        $eliminarProveedor->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;

    default:
        # code...
        break;
}



/* Consultamos todos los empleados  */
$consultaProveedor = $conn->prepare("SELECT * FROM proveedor");
$consultaProveedor->execute();
$listaProveedor = $consultaProveedor->get_result();
$conn->close();
