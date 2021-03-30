<?php 
include'../vendor/autoload.php';
include'../autoload.php';

$session = new Session();
$session->validity();
$conexion = new Conexion();
$conexion = $conexion->get_conexion();



$opcion = $_REQUEST['op'];


switch ($opcion) {
    case '1':
       try {
    $query = "SELECT * FROM usuarios";
    $statement = $conexion->prepare($query);
    $statement->execute();
    $result  = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = [
    "sEcho"=>1,
    "iTotalRecords"=>count($result),
    "iTotalDisplayRecords" => count($result),
    "aaData"=>$result 
    ];
    echo json_encode($json);
    } catch (Exception $e) {
    echo "error".$e->getMessage();
    }

        break;

        
        case'2':
        $nombres   = trim($_REQUEST['nombres']);
        $apellidos = trim($_REQUEST['apellidos']);
        $user      = trim($_REQUEST['user']);
        $pass      = md5($_REQUEST['pass']);
        $correo    = trim($_REQUEST['correo']);
        $dni       = trim($_REQUEST['dni']);
        $fono      = trim($_REQUEST['fono']);
        $accion    = trim($_REQUEST['accion']);
          
        if($accion=="agregar"){
            try {
                $query ="INSERT INTO usuarios(nombres,apellidos,user,pass,correo,dni,fono)VALUES(:nombres,:apellidos,:user,:pass,:correo,:dni,:fono)";
                $statement = $conexion->prepare($query);
                $statement->bindParam(":nombres",$nombres);
                $statement->bindParam(":apellidos",$apellidos);
                $statement->bindParam(":user",$user);
                $statement->bindParam(":pass",$pass);
                $statement->bindParam(":correo",$correo);
                $statement->bindParam(":dni",$dni);
                $statement->bindParam(":fono",$fono);
                $statement->execute();
                echo json_encode(array(
                "icon"=>"success",
                "title"=>"Buen Trabajo",
                "text" =>"Registro Agregado Correctamente"
                ));
            } catch (Exception $e) {
                echo "error".$e->getMessage();
            }

        }else{

          $id = trim($_REQUEST['id']);

         try {
              $query ="UPDATE usuarios SET nombres=:nombres,apellidos=:apellidos,user=:user,correo=:correo,dni=:dni,fono=:fono WHERE id=:id ";
                $statement = $conexion->prepare($query);
                $statement->bindParam(":nombres",$nombres);
                $statement->bindParam(":apellidos",$apellidos);
                $statement->bindParam(":user",$user);
                $statement->bindParam(":correo",$correo);
                $statement->bindParam(":dni",$dni);
                $statement->bindParam(":fono",$fono);
                $statement->bindParam(":id",$id);
                $statement->execute();
                echo json_encode(array(
                "icon"=>"success",
                "title"=>"Buen Trabajo",
                "text" =>"Registro Actualizado Correctamente"
                ));
         } catch (Exception $e) {
             echo "error".$e->getMessage();
         }
        }
        break;
    

    case '3':

        $id=trim($_REQUEST['id']);
        
        try {
            $query = "SELECT * FROM usuarios WHERE id=:id";
            $statement = $conexion->prepare($query);
            $statement->bindParam(":id",$id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            echo json_encode($result);
        } catch (Exception $e) {
            echo "error".$e->getMessage();
        }


        break;

 case '4':

       $id   = trim($_REQUEST['id']);
       $pass = md5($_REQUEST['pass']);

    try {

        $query="UPDATE usuarios SET pass=:pass WHERE id=:id ";
        $statement = $conexion->prepare($query);
        $statement->bindParam(":id",$id);
        $statement->bindParam(":pass",$pass);
        $statement->execute();
        echo "ok";

    } catch (Exception $e) {
       echo "error".$e->getMessage(); 
    }

     break;

     case '5':

try {
    
$query = "SELECT  * FROM usuarios";
$statement = $conexion->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

if(count($result)>0)
{

$objPHPExcel = new PHPExcel();

//Asignar propiedades al archivo
$objPHPExcel->getProperties()->setCreator('JORGE MEZA')
                             ->setTitle('Reporte de usuarios');

//Configuración del título y cabecera

$titulo = "Reporte de Usuarios";

$columnas = array('Nombres','Apellidos','Usuario','Correo','Dni','Fono');

//Agregar el título y columnas al Excel

//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1',$titulo)
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1',$columnas[0])
->setCellValue('B1',$columnas[1])
->setCellValue('C1',$columnas[2])
->setCellValue('D1',$columnas[3])
->setCellValue('E1',$columnas[4])                
->setCellValue('F1',$columnas[5]);
 
//Agregar el Detalle al Excel

$i = 2 ;

foreach ($result as $key => $value) {

$objPHPExcel->setActiveSheetIndex(0)
->setCellValueExplicit('A'.$i,$value['nombres'])
->setCellValueExplicit('B'.$i,$value['apellidos'])
->setCellValueExplicit('C'.$i,$value['user'])
->setCellValueExplicit('D'.$i,$value['correo'])
->setCellValueExplicit('E'.$i,$value['dni'])
->setCellValueExplicit('F'.$i,$value['fono']);


$i++;

}


//Asignamos un nombre  a la hoja
$objPHPExcel->getActiveSheet()->setTitle('Lista de Usuarios');

//Se active la hoja al momento de abrir el archivo
$objPHPExcel->setActiveSheetIndex(0);


//Parametros de configuración para crear el archivo Excel 


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte de Usuarios.xlsx"');
header('Cache-Control: max-age=0');

//Exportar El documento Excel
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

}
else
{

echo "no existe información disponible";

}



} catch (Exception $e) {
    
echo "Error: ".$e->getMessage();

}

         break;

    default:
        # code...
        break;
}






 ?>