<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas

$Tipo_doc_cli = (isset($_POST['Tipo_doc_cli'])) ? $_POST['Tipo_doc_cli'] : "";
$Id_cli  = (isset($_POST['Id_cli'])) ? $_POST['Id_cli'] : "";
$Nom_cli = (isset($_POST['Nom_cli'])) ? $_POST['Nom_cli'] : "";
$Ape_cli = (isset($_POST['Ape_cli'])) ? $_POST['Ape_cli'] : "";
$Direc_cli = (isset($_POST['Direc_cli'])) ? $_POST['Direc_cli'] : "";
$Tel_cli = (isset($_POST['Tel_cli'])) ? $_POST['Tel_cli'] : "";



$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':



     


                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
                $insercionCliente = $conn->prepare(
                    "INSERT INTO cliente (Tipo_doc_cli, Id_cli, Nom_cli, Ape_cli, Direc_cli, Tel_cli) 
                                VALUES ('$Tipo_doc_cli','$Id_cli','$Nom_cli','$Ape_cli','$Direc_cli','$Tel_cli')"
                );



                $insercionCliente->execute();
                $conn->close();
               
               echo" <script>
                    swal('Mensaje Principal!', 'Mensaje segundario!', 'success');
                    </script>";
                

                header('location: index.php');
           




        break;

    case 'btnModificar':

        $editarCliente = $conn->prepare(" UPDATE cliente SET Tipo_doc_cli = '$Tipo_doc_cli' , 
        Nom_cli = '$Nom_cli', Ape_cli = '$Ape_cli', Direc_cli = '$Direc_cli', Tel_cli = '$Tel_cli'
        WHERE Id_cli = '$Id_cli' ");

     

        $editarCliente->execute();
       
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        /* 
        $consultaFoto = $conn->prepare(" SELECT foto FROM empleados
        WHERE id = '$txtId' "); */

        $eliminarCliente = $conn->prepare(" DELETE FROM cliente
        WHERE Id_cli = '$Id_cli' ");

        // $consultaFoto->execute();
        $eliminarCliente->execute();
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
$consultaCliente = $conn->prepare("SELECT * FROM cliente");
$consultaCliente->execute();
$listaCliente = $consultaCliente->get_result();
$conn->close();
