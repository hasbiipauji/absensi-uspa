<?php

namespace App\Exports;

use App\Absensi;
use App\Exports\NamaBulan;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AbsensiExport implements FromView, ShouldAutoSize, WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;


    public function simpanAll(bool $dataAll, string $dataDariAll, string $dataSampaiAll)
    {
        $this->dataAll = $dataAll;
        $this->dataDariAll = $dataDariAll;
        $this->dataSampaiAll = $dataSampaiAll;

        return $this;
    }
    public function simpanDari(string $dataDari)
    {
        $this->dataDari = $dataDari;

        return $this;
    }
    public function simpanSekarang(string $dataDariSekarang, string $dataSampaiBesok)
    {
        $this->dataDariSekarang = $dataDariSekarang;
        $this->dataSampaiBesok = $dataSampaiBesok;

        return $this;
    }
    public function simpanSampai(string $dataSampai)
    {
        $this->dataSampai = $dataSampai;

        return $this;
    }


    public function view(): View
    {
        $namabulan = NamaBulan::getNameMonths();
        $idCurrentUser = auth()->user()->id;

        if (isset($this->dataDari)) {

            $pilihan = view('export.absen', [
                'absens' => Absensi::where('user_id', $idCurrentUser)->latest()->whereBetween('created_at', [$this->dataDari, $this->dataSampai])->get(),
                'dari' => $this->dataDari,
                'sampai' => $this->dataSampai,
                'monthNames' =>  $namabulan

            ]);
        } else if (isset($this->dataDariSekarang)) {
            $pilihan = view('export.absen', [
                'absens' => Absensi::latest()->whereBetween('created_at', [$this->dataDariSekarang, $this->dataSampaiBesok])->get(),
                'monthNames' => $namabulan
            ]);
        } else if (isset($this->dataAll)) {
            $pilihan = view('export.absen_all', [
                'absens' => Absensi::latest()->whereBetween('created_at', [$this->dataDariAll, $this->dataSampaiAll])->get(),
                'monthNames' => $namabulan,
                'dari' => $this->dataDariAll,
                'sampai' => $this->dataSampaiAll,
            ]);
        } else {
            $nopilihan =  view('export.absen', [
                'absens' => Absensi::latest()->where('user_id', $idCurrentUser)->get(),
                'monthNames' => $namabulan
            ]);
        }

        // isset($pilihan) ? dd($pilihan) : dd($nopilihan);

        return  $pilihan ?? $nopilihan;
    }



    public function columnWidths(): array
    {
        return [
            'A' => 3,
            'B' => 7,
            'H' => 15,

        ];
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