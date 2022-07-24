<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\YouthPrint;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Sheet;

class YouthExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {

        return YouthPrint::select(
            'FullName',
            // 'Bday',
            'Age',
            'Sex',
            'parent',
            'CPno',
            'EducStatus',
            'Purok',
            'PWD',
            'CivilStatus',
            'Scholarship',
            'Occupation',
            'Sports1',
            'Sports2',
            'Sports3'
            )->orderBy('FullName')->get();
            // substr('Mname', 0, 1) getting first string
    }
    public function headings(): array
    {
        return [
            'FullName',
            // 'Birthday',
            'Age',
            'Gender',
            'Parent',
            'CP no.',
            'Education',
            'Purok',
            'PWD',
            'Civil Status',
            'Scholarship',
            'Occupation',
            'Sports1',
            'Sports2',
            'Sports3'
        ];
    }

    public function registerEvents(): array
    {
        return [

            AfterSheet::class    => function(AfterSheet $event) {
                // All headers

                $cellRange = 'A1:W1';
                $header = [
                    'font' => [
                        'family'     => 'Calibri',
                        'size'       => '10',
                        'bold'       => true
                    ],

                ];
                $event->sheet->getStyle($cellRange)->applyFromArray($header);
                //BODY
                $styleArray = [
                    'font' => [
                        'family'     => 'Calibri',
                        'size'       => '7',
                    ],
                ];
                $num1 = YouthPrint::query()->count()+1;
                $body1 = 'A1'.':N'.$num1; //RANGE OF CELL
                $event->sheet->getStyle($body1)->applyFromArray($styleArray)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);;
                //Border
                // $event->sheet->getStyle($body1)


                //ORIENTATION
                $event->sheet
                ->getPageSetup()
                ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            },

        ];
    }
}
