<?php

namespace App\Exports;



class NamaBulan
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public static function getNameMonths()
    {

        return $month =
            $month = [
                "01" => "January",
                "01" => "Februari",
                "03" => "Maret",
                "04" => "April",
                "05" => "Mei",
                "06" => "Juni",
                "07" => "Juli",
                "08" => "Agustus",
                "09" => "September",
                "10" => "Oktober",
                "11" => "November",
                "12" => "Desember"
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