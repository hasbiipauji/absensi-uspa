<?php

namespace App\Exports;

use App\Absensi;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\Exportable;


class AbsensiExport implements FromView , WithDrawings , ShouldAutoSize 
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function forYear(int $year)
        {
            $this->year = $year;
            
            return $this;
        }

    public function view(): View
    {
        return view('export.absen', [
            'absens' => Absensi::whereDate('created_at', date('Y-m-'.$this->year))->get()
        ]);
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('assets/img/uspa.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('A1');

        return $drawing;
    }

    
}

// class AbsensiExport implements FromQuery
// {
//     use Exportable;

//     public function forYear(int $year)
//     {
//         $this->year = $year;
        
//         return $this;
//     }

//     public function query()
//     {
//         return Absensi::query()->whereDay('created_at', $this->year);
//     }
// }