<?php

namespace App\Http\Controllers\Revision;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\area;
use App\Models\Inmobiliario\articulo;
use App\Models\Inmobiliario\departamento;
use App\Models\Revision\articulo_has_revision;
use App\Models\Revision\revision;
use FontLib\Table\Type\head;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\BaseDrawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class revisionExportController extends Controller implements FromQuery, WithMapping, WithDrawings, WithHeadings, WithEvents, ShouldAutoSize
{
    protected $id;
    protected $area;
    protected $departamento;
    protected $elaboro;
    protected $autorizo;
    protected $responsable_area;
    protected $responsable;
    protected $resguardante;
    protected $visto_bueno;


    public function __construct($id, $area, $departamento, $elaboro, $autorizo, $responsable_area, $responsable, $resguardante, $visto_bueno)
    {
        $this->id = $id;
        $this->area = $area;
        $this->departamento = $departamento;
        $this->elaboro = $elaboro;
        $this->autorizo = $autorizo;
        $this->responsable_area = $responsable_area;
        $this->responsable = $responsable;
        $this->resguardante = $resguardante;
        $this->visto_bueno = $visto_bueno;

    }

    //Acceder a la base de datos de los artículos con la revision registrada
    public function query()
    {
        return  articulo_has_revision::query()
            ->where('fk_revision', $this->id);
    }

    //
    public function map($articulo_has_revision): array
    {
        return [
            $articulo_has_revision->articulo->concepto,
            $articulo_has_revision->articulo->etiqueta_externa,
            $articulo_has_revision->articulo->numero_serie,
            $articulo_has_revision->articulo->marca,
            $articulo_has_revision->articulo->modelo,
            $articulo_has_revision->articulo->fecha_adquisiscion,
            $articulo_has_revision->articulo->num_factura,
            $articulo_has_revision->articulo->costo,
            $articulo_has_revision->articulo->estado->nombre,
            $articulo_has_revision->articulo->oficina->edificio->nombre,
            $articulo_has_revision->articulo->oficina->planta == 1 ? 'Baja':'Alta' ,
            $articulo_has_revision->articulo->oficina->nombre,
            $articulo_has_revision->articulo->activo_resguardo,
            $articulo_has_revision->articulo->observaciones,
            ];
    }

    //Agregar el logo del TecMM
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('TecMM');
        try {
            $drawing->setPath(public_path('/icons/logo_tecmm_90.png'));
        } catch (Exception $e) {

        }
        $drawing->setHeight(90);
        $drawing->setCoordinates("O1");

        return $drawing;
    }

    public function headings(): array
    {
        return [
            "CONCEPTO",
            "ETIQUETA",
            "NUMERO DE SERIE",
            "MARCA",
            "MODELO",
            "FECHA DE ADQUISICIÓN",
            "FACTURA",
            "COSTO",
            "ESTADO",
            "EDIFICIO",
            "PLANTA",
            "UBICACIÓN",
            "ACTIVO/RESGUARDO",
            "OBSERVACIONES",
            "IMAGEN TECMM LAGOS",
        ];
    }

    public function registerEvents(): array
    {

        return [
            // Using a class with an __invoke method.
            AfterSheet::class => function(AfterSheet $event){

                // Ultima columna,
                $last_column =  Coordinate::stringFromColumnIndex(count($this->headings()));

                // calculate last row + 1 (total results + header rows + column headings row + new row)
                $last_row = articulo_has_revision::query()
                    ->where('fk_revision', $this->id)
                    ->count() + 10;

                // Lista de estilos
                $style_arial_title =        [
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER
                    ],
                    'font' => [
                        'name'      =>  'Arial',
                        'size'      =>  26,
                        'bold'      =>  true
                    ],
                ];
                $style_text_footer =        [
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER
                    ],
                    'font' => [
                        'name'      =>  'Arial',
                        'size'      =>  10,
                        'bold'      =>  false
                    ],
                ];
                $style_text_footer_bold =   [
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER
                    ],
                    'font' => [
                        'name'      =>  'Arial',
                        'size'      =>  10,
                        'bold'      =>  true
                    ],
                ];
                $style_arial_bold =         [
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_LEFT
                    ],
                    'font' => [
                        'name'      =>  'Arial',
                        'size'      =>  10,
                        'bold'      =>  true
                    ],
                ];
                $style_arial =              [
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER
                    ],
                    'font' => [
                        'name'      =>  'Arial',
                        'size'      =>  12,
                        'bold'      =>  false
                    ],
                ];


                // En la fila 2, insertar 10 filas más
                $event->sheet->insertNewRowBefore(1,10);

                // merge cells for full-width
//              $event->sheet->mergeCells(sprintf('A10:%s10',$last_column));

                //$event->sheet->mergeCells(sprintf('A%d:%s%d',$last_row,$last_column,$last_row));

                // assign cell values

                //=====HEADER=====

                //Títulos
                $event->sheet->mergeCells(sprintf('A1:%s1',$last_column));
                $event->sheet->setCellValue('A1','ACTIVOS FIJOS Y RESGUARDOS:');
                $event->sheet->getStyle('A1')->applyFromArray($style_arial_title);


                //Pare alta con los encargados
                $event->sheet->setCellValue('A2','AREA:');
                $event->sheet->setCellValue('A3','RESPONSABLE DE AREA:');
                $event->sheet->setCellValue('A4','RESPONSABLE(S):');
                $event->sheet->setCellValue('A5','RESGUARDANTE(S):');
                $event->sheet->setCellValue('A6','DEPARTAMENTO:');
                $event->sheet->setCellValue('A8','FECHA:');
                $event->sheet->setCellValue('A9','AÑO:');

                $event->sheet->getStyle('A2:A9')->applyFromArray($style_arial_bold);


                $event->sheet->setCellValue('G3','PUESTO:');
                $event->sheet->setCellValue('G4','PUESTO(S):');
                $event->sheet->setCellValue('G5','PUESTO(S):');

                $event->sheet->getStyle('G3:G5')->applyFromArray($style_arial_bold);


                //Campos
                $event->sheet->mergeCells('B2:E2');
                $event->sheet->setCellValue('B2',$this->area);

                $event->sheet->mergeCells('B3:E3');
                $event->sheet->setCellValue('B3',$this->responsable_area);

                $event->sheet->mergeCells('B4:E4');
                $event->sheet->setCellValue('B4',$this->responsable);

                $event->sheet->mergeCells('B5:E5');
                $event->sheet->setCellValue('B5',$this->resguardante);

                $event->sheet->mergeCells('B6:E6');
                $event->sheet->setCellValue('B6',$this->departamento);

                $event->sheet->mergeCells('B8:E8');
                $event->sheet->setCellValue('B8', \date("j-F"));

                $event->sheet->mergeCells('B9:E9');
                $event->sheet->setCellValue('B9', \date("Y"));

                $event->sheet->getStyle('B2:B9')->applyFromArray($style_arial);

                $event->sheet->mergeCells('H3:M3');
                $event->sheet->setCellValue('H3','Jefe de División');

                $event->sheet->mergeCells('H4:M4');
                $event->sheet->setCellValue('H4','Analista Especializado');

                $event->sheet->mergeCells('H5:M5');
                $event->sheet->setCellValue('H5','Analista Especializado');

                $event->sheet->getStyle('H3:H5')->applyFromArray($style_arial);

                //Parte baja con las firmas

                $event->sheet->mergeCells(sprintf('A%d:%s%d',$last_row + 4, 'C', $last_row + 4));
                $event->sheet->setCellValue(sprintf('A%d',$last_row + 4), '____________________');
                $event->sheet->mergeCells(sprintf('A%d:%s%d',$last_row + 5, 'C', $last_row + 5));
                $event->sheet->setCellValue(sprintf('A%d',$last_row + 5), "Elaboró");
                $event->sheet->mergeCells(sprintf('A%d:%s%d',$last_row + 6, 'C', $last_row + 6));
                $event->sheet->setCellValue(sprintf('A%d',$last_row + 6), $this->elaboro);

                $event->sheet->mergeCells(sprintf('D%d:%s%d',$last_row + 4, 'F', $last_row + 4));
                $event->sheet->setCellValue(sprintf('D%d',$last_row + 4), "____________________");
                $event->sheet->mergeCells(sprintf('D%d:%s%d',$last_row + 5, 'F', $last_row + 5));
                $event->sheet->setCellValue(sprintf('D%d',$last_row + 5), "Autorizó");
                $event->sheet->mergeCells(sprintf('D%d:%s%d',$last_row + 6, 'F', $last_row + 6));
                $event->sheet->setCellValue(sprintf('D%d',$last_row + 6), $this->autorizo);

                $event->sheet->mergeCells(sprintf('G%d:%s%d',$last_row + 4, 'I', $last_row + 4));
                $event->sheet->setCellValue(sprintf('G%d',$last_row + 4), "____________________");
                $event->sheet->mergeCells(sprintf('G%d:%s%d',$last_row + 5, 'I', $last_row + 5));
                $event->sheet->setCellValue(sprintf('G%d',$last_row + 5), "VoBo");
                $event->sheet->mergeCells(sprintf('G%d:%s%d',$last_row + 6, 'I', $last_row + 6));
                $event->sheet->setCellValue(sprintf('G%d',$last_row + 6), $this->visto_bueno);

                $event->sheet->mergeCells(sprintf('J%d:%s%d',$last_row + 4, 'M', $last_row + 4));
                $event->sheet->setCellValue(sprintf('J%d',$last_row + 4), "____________________");
                $event->sheet->mergeCells(sprintf('J%d:%s%d',$last_row + 5, 'M', $last_row + 5));
                $event->sheet->setCellValue(sprintf('J%d',$last_row + 5), "Responsable de Area");
                $event->sheet->mergeCells(sprintf('J%d:%s%d',$last_row + 6, 'M', $last_row + 6));
                $event->sheet->setCellValue(sprintf('J%d',$last_row + 6), $this->responsable_area);

                $event->sheet->mergeCells(sprintf('D%d:%s%d',$last_row + 9, 'F', $last_row + 9));
                $event->sheet->setCellValue(sprintf('D%d',$last_row + 9), "____________________");
                $event->sheet->mergeCells(sprintf('D%d:%s%d',$last_row + 10, 'F', $last_row + 10));
                $event->sheet->setCellValue(sprintf('D%d',$last_row + 10), "Responsable");
                $event->sheet->mergeCells(sprintf('D%d:%s%d',$last_row + 11, 'F', $last_row + 11));
                $event->sheet->setCellValue(sprintf('D%d',$last_row + 11), $this->responsable);

                $event->sheet->mergeCells(sprintf('G%d:%s%d',$last_row + 9, 'I', $last_row + 9));
                $event->sheet->setCellValue(sprintf('G%d',$last_row + 9), "__________");
                $event->sheet->mergeCells(sprintf('G%d:%s%d',$last_row + 10, 'I', $last_row + 10));
                $event->sheet->setCellValue(sprintf('G%d',$last_row + 10), "Resguardante");
                $event->sheet->mergeCells(sprintf('G%d:%s%d',$last_row + 11, 'I', $last_row + 11));
                $event->sheet->setCellValue(sprintf('G%d',$last_row + 11), $this->resguardante);

                $event->sheet->getStyle(sprintf('A%d:J%d',$last_row + 4, $last_row + 11))->applyFromArray($style_arial_bold);


                //La parte baja del documento, en el que se incluyen las condiciones
                $footer = [
                    "",
                    "1.  EN CASO DE DETERIORO, ROBO O SINIESTRO DEBERA NOTIFICARLO INMEDIATAMENTE POR OFICIO  AL AREA DIVISIÓN ADMINISTRATIVA, SEGÚN SEA EL CASO",
                    "2.  SE RECOMIENDA NO HACER NINGÚN CAMBIO, DE DICHO MOBILIARIO O EQUIPO, SIN ANTES NOTIFICARLO  Y CON  UNA  PREVIA AUTORIZACIÓN Y CUIDAR EL BUEN USO DEL MISMO",
                    "3.  NO SE PERMITE SACAR EL MOBILIARIO O EQUIPO FUERA DE LA INSTITUCIÓN AUNQUE ESTE O NO  BAJO SU RESGUARDO SIN ANTES SOLICITARLO CON ANTICIPACIÓN Y MEDIANTE UN OFICIO AL AREA ADMINISTRATIVA Y EXPLICANDO SU USO Y EL MOTIVO.",
                    "4.  Y DE NO TENER CUALQUIERA DE ESTOS EQUIPOS EN SU OFICINA SERA CAUSA DE UNA SANCIÓN CON ANTICIPACIÓN Y MEDIANTE UN OFICIO AL AREA ADMINISTRATIVA Y EXPLICANDO SU USO Y EL MOTIVO.",
                    "",
                    "LEY DE ADQUISICIONES Y ENAJENACIONES DEL GOBIERNO DEL ESTADO",
                    "Artículo 28.-  Las dependencias, organismos auxiliares y paraestatales, elaborarán inventarios anuales, con fecha de cierre de ejercicio al 31 de diciembre, sin perjuicio de los que se deban realizar por causas extraordinarias o de actualización.",
                    "",
                    "LEY DE RESPONSABILIDADES DE LOS SERVIDORES PÚBLICOS DEL ESTADO DE JALISCO",
                    "Artículo 61. Todo servidor público, para salvaguardar la legalidad, honradez, lealtad, imparcialidad y eficiencia que debe observar en el desempeño de su empleo, cargo o comisión, y sin perjuicio de sus derechos y obligaciones laborales, tendrá las siguientes obligaciones: ",
                    "V. Conservar y custodiar los bienes, valores, documentos e información que tenga bajo su cuidado, o a la que tuviere acceso impidiendo o evitando el uso, la sustracción, ocultamiento o utilización indebida de aquella;",
                    ""
                ];

                //Aplicar la parte baja del documento
                for ($i = 0; $i < count($footer); $i++) {
                    $event->sheet->mergeCells(sprintf('A%d:%s%d',$last_row + 12 + $i, $last_column, $last_row + $i + 12));
                    $event->sheet->setCellValue(sprintf('A%d',$last_row + 12 + $i), $footer[$i]);
                    $event->sheet->getStyle(sprintf('A%d',$last_row + 12 + $i), $footer[$i])->applyFromArray($style_text_footer_bold);

                };
            },
        ];
    }


}
