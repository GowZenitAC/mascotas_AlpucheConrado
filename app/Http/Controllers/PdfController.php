<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Hacemos referencia a la clase PDF
use Codedge\Fpdf\Fpdf\Fpdf; 
use App\Mascota;

class PdfController extends Controller
{

    public function prueba(){

        //Obtenemos el listado de mascotas
        $mascotas = Mascota::all();
        //return $mascotas;




        //Iniciamos la clase
    $pdf=new Fpdf('P','mm','Letter');
    //Agregamos una pagina
    $pdf->AddPage();
    //Seleccionar una fuente
    $pdf->SetFont('Courier', 'B', 18);

    $pdf->Image(public_path().'/img/logo22.png',10,5,28);
            //Ancho,Alto,Valor impreso, Borde(0,1.'T','B','R','L'), Comportamiento(0,1), Alineacion('R','L','C','J')
    $pdf->Cell(190, 12, 'LISTADO DE MASCOTAS', 'B',1, 'C');
    $pdf->Ln(10);


    //Encabezado del Reporte
    //Celda de margen
    $pdf->SetFont('Courier', 'B', 12);
    $pdf->Cell(35,5,'',0,0);
    //
    $pdf->Cell(10,5,'No',1,0,'C');
    $pdf->Cell(50,5,'Nombre',1,0,'C');
    $pdf->Cell(15,5,'Edad',1,0,'C');
    $pdf->Cell(20,5,'Peso',1,0,'C');
    $pdf->Cell(20,5,'Especie',1,1);


    //Tabla de datos

    //Celda de margen

    $alt=10;

    //for ($i=1; $i < 10; $i++) { 
    //    $pdf->SetFont('Courier', 'B', 12);
    //    $pdf->Cell(40,$alt,'',0,0);
   // //    $pdf->Cell(50,$alt,"Mascota$i",1,0,'L');
    //    $pdf->Cell(15,$alt,'8',1,0,'C');
    //    $pdf->Cell(20,$alt,'23 Kg',1,0,'C');
    //    $pdf->Cell(20,$alt,'H',1,1,'C');
    //
    //}
    
    foreach ($mascotas  as $mascota) {    

                $pdf->Cell(35   ,$alt,'',0,0);
                //imprimo el id de la mascota
                $pdf->Cell(10,$alt,$mascota->id_mascota,1,0,'C');
                //Imprimo el nombre de la mascota
               $pdf->Cell(50,$alt,utf8_decode($mascota->nombre) ,1,0,'L');
                $pdf->Cell(15,$alt,$mascota->edad,1,0,'C');
                $pdf->Cell(20,$alt,$mascota->peso,1,0,'C');
                $pdf->Cell(20,$alt,$mascota->especie->especie,1,1,'L');
    }


    //Al final, envia el pdf a la pantalla
    $pdf->Output('I', 'Listado de Mascotas.pdf');
    exit;
    }
   

}
