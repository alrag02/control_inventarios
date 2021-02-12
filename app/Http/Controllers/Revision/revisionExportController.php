<?php

namespace App\Http\Controllers\Revision;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliario\articulo;
use App\Models\Revision\articulo_has_revision;
use App\Models\Revision\revision;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
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

class revisionExportController extends Controller implements FromQuery, WithMapping, WithDrawings, WithHeadings, WithEvents
{
    protected $id;
    protected $sheet_height;

    public function __construct($id)
    {
        $this->id = $id;
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
        return
            [$articulo_has_revision->articulo->concepto,
            $articulo_has_revision->articulo->etiqueta_externa,
            $articulo_has_revision->articulo->numero_serie,
            $articulo_has_revision->articulo->marca,
            $articulo_has_revision->articulo->modelo,
            $articulo_has_revision->articulo->fecha_adquisiscion,
            $articulo_has_revision->articulo->num_factura,
            $articulo_has_revision->articulo->costo,
            $articulo_has_revision->articulo->estado->nombre,
            $articulo_has_revision->articulo->oficina->edificio->nombre,
            $articulo_has_revision->articulo->oficina->nivel,];
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
        $drawing->setCoordinates("N1");

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
            "OBSERVACIONES"
        ];
    }

    public function registerEvents(): array
    {

        return [
            // Using a class with an __invoke method.
            AfterSheet::class => [self::class, 'afterSheet'],
        ];
    }

    public static function afterSheet(AfterSheet $event){

        setlocale(LC_ALL, 'es_ES');

        $footer = [
            "1.  EN CASO DE DETERIORO, ROBO O SINIESTRO DEBERA NOTIFICARLO INMEDIATAMENTE POR OFICIO  AL AREA DIVISIÓN ADMINISTRATIVA, SEGÚN SEA EL CASO",
            "2.  SE RECOMIENDA NO HACER NINGUN CAMBIO, DE DICHO MOBILIARIO O EQUIPO, SIN ANTES NOTIFICARLO  Y CON  UNA  PREVIA AUTORIZACION Y CUIDAR EL BUEN USO DEL MISMO",
            "3. NO SE PERMITE  SACAR EL MOBILIARIO O EQUIPO  FUERA DE LA INSTITUCION AUNQUE ESTE O NO  BAJO SU RESGUARDO SIN ANTES SOLICITARLO CON ANTICIPACION Y MEDIANTE UN OFICIO AL AREA ADMINISTRATIVA Y EXPLICANDO SU USO Y EL MOTIVO.",
            "4. Y  DE NO TENER CUALQUIERA DE ESTOS EQUIPOS EN SU OFICINA  SERA CAUSA DE UNA SANCION CON ANTICIPACION Y MEDIANTE UN OFICIO AL AREA ADMINISTRATIVA Y EXPLICANDO SU USO Y EL MOTIVO.",
            "LEY DE ADQUISICIONES Y ENAJENACIONES DEL GOBIERNO DEL ESTADO",
            "Artículo 28.-  Las dependencias, organismos auxiliares y paraestatales, elaborarán inventarios anuales,  con fecha de cierre de  ejercicio al 31 de diciembre, sin perjuicio de los que  se  deban realizar  por  causas  extraordinarias  o  de actualización.",
            "LEY DE RESPONSABILIDADES DE LOS SERVIDORES PUBLICOS DEL ESTADO DE JALISCO",
            "Artículo 61. Todo servidor público, para salvaguardar la legalidad, honradez, lealtad, imparcialidad y eficiencia que debe observar en el desempeño de su empleo, cargo o comisión, y sin perjuicio de sus derechos y obligaciones laborales, tendrá las siguientes obligaciones: ",
            "V. Conservar y custodiar los bienes, valores, documentos e información que tenga bajo su cuidado, o a la que tuviere acceso impidiendo o evitando el uso, la sustracción, ocultamiento o utilización indebida de aquella;",
        ];

        // last column as letter value (e.g., D)
        $last_column =  Coordinate::stringFromColumnIndex(14);

        // calculate last row + 1 (total results + header rows + column headings row + new row)
        $last_row = 25 /* count($this->map()) + 2 + 1 + 1 */;

        // set up a style array for cell formatting
        $style_text_center = [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER
            ],
            'font' => [
                'name'      =>  'Arial',
                'size'      =>  12,
                'bold'      =>  true
            ],
        ];

        $style_text_footer = [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT
            ],
            'font' => [
                'name'      =>  'Arial',
                'size'      =>  10,
                'bold'      =>  false
            ],
        ];

        // at row 1, insert 2 rows
        $event->sheet->insertNewRowBefore(1,10);

        // merge cells for full-width
//              $event->sheet->mergeCells(sprintf('A10:%s10',$last_column));

        //$event->sheet->mergeCells(sprintf('A%d:%s%d',$last_row,$last_column,$last_row));

        // assign cell values

        //=====HEADER=====

        //Titulos
        $event->sheet->mergeCells(sprintf('A1:%s1',$last_column));
        $event->sheet->setCellValue('A1','ACTIVOS FIJOS Y RESGUARDOS:');
        $event->sheet->getStyle('A1')->applyFromArray($style_text_center);


        $event->sheet->setCellValue('A2','AREA:');
        $event->sheet->setCellValue('A3','RESPONSABLE DE AREA:');
        $event->sheet->setCellValue('A4','RESPONSABLE(S):');
        $event->sheet->setCellValue('A5','RESGUARDANTE(S):');
        $event->sheet->setCellValue('A6','DEPARTAMENTO:');

        $event->sheet->setCellValue('A8','FECHA:');
        $event->sheet->setCellValue('A9','AÑO:');

        $event->sheet->setCellValue('G3','PUESTO:');
        $event->sheet->setCellValue('G4','PUESTO(S):');
        $event->sheet->setCellValue('G5','PUESTO(S):');

        //Campos
        $event->sheet->mergeCells('B2:F2');
        $event->sheet->setCellValue('B2','...');

        $event->sheet->mergeCells('B3:F3');
        $event->sheet->setCellValue('B3','...');

        $event->sheet->mergeCells('B4:F4');
        $event->sheet->setCellValue('B4','...');

        $event->sheet->mergeCells('B5:F5');
        $event->sheet->setCellValue('B5','...');

        $event->sheet->mergeCells('B6:F6');
        $event->sheet->setCellValue('B6','...');

        $event->sheet->mergeCells('B8:F8');
        $event->sheet->setCellValue('B8', \date("j-F"));

        $event->sheet->mergeCells('B9:F9');
        $event->sheet->setCellValue('B9', \date("Y"));

        $event->sheet->mergeCells('H3:N3');
        $event->sheet->setCellValue('H3','...');

        $event->sheet->mergeCells('H4:N4');
        $event->sheet->setCellValue('H4','...');

        $event->sheet->mergeCells('H5:N5');
        $event->sheet->setCellValue('H5','...');



        $event->sheet->mergeCells(sprintf('A10:%s10',$last_column));
        $event->sheet->setCellValue('A10','');


        //FOOTER
        for ($i = 0; $i < count($footer); $i++) {
            $event->sheet->mergeCells(sprintf('A%d:%s%d',$last_row + $i, $last_column, $last_row + $i));
            $event->sheet->setCellValue(sprintf('A%d',$last_row + $i), $footer[$i]);
            $event->sheet->getStyle(sprintf('A%d',$last_row + $i), $footer[$i])->applyFromArray($style_text_footer);

        };

        // set columns to autosize
        for ($i = 1; $i <= $last_column; $i++) {
            $column = Coordinate::stringFromColumnIndex($i);
            $event->sheet->setWidth(array(
                'A'     =>  20,
                'B'     =>  20,
                'C'     =>  10,
                'D'     =>  10,
                'E'     =>  10,
                'F'     =>  10,
                'G'     =>  10,
                'H'     =>  10,
                'I'     =>  10,
                'J'     =>  10,
            ));
        }

    }

}
