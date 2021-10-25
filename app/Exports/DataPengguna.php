<?php


namespace App\Exports;

use App\Models\Pengguna;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class DataPengguna implements FromCollection, ShouldAutoSize, WithHeadings, WithEvents
{

    public function headings():array{
        return [
            [
                'Laporan Data Pengguna Sistem',
            ],
            [
            'Bulan',
                ':'.date('d/m/Y'),
        ],
            [
            'Tanggal Export',
                '',
                ':'.date('d/m/Y'),
        ],
            [
                '',
            ],
          [
            'No',
            'Nama',
            'Role',
            'Email',
            'Gambar',
          ]
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event){
             $cellRang = 'A5:E5';
             $styleArray = [
                 'font' => [
                     'bold' => true,
                     'color' => ['rgb' => '0000FF'],
                     'size' => 13,
                 ],
                 'border' => [
                     'outline' => [
                         'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                         'color' => ['argb' => 'FF0000FF']
                     ],
                 ],
             ];
             $event ->sheet ->getDelegate() ->getStyle($cellRang) ->applyFromArray($styleArray);

             $event ->sheet -> mergeCells('A1:E1');
             $event ->sheet -> mergeCells('A2:B2');
             $event ->sheet -> mergeCells('A3:B3');

            }
        ];
    }


    public function collection()
    {
        // TODO: Implement collection() method.
      $data = Pengguna::all();

      $no = 1;
      foreach ($data as $row){
          $collect[] = [
              'no' => $no++,
              'name' => $row -> name,
              'role' => $row -> role,
              'email' => $row -> email,
              'image' => $row -> image,
          ];
      }
      $pengguna = collect($collect)->map(function ($dt){
      return (object) $dt;
        });
        return $pengguna;
    }

}
