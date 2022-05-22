<?php

namespace App;

class Helper {
    public function getTodayDate()
    {
        $day = date('w');
        $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        $month = date('n');
        $months = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $date = $days[$day] . ", " . date('j') . " " . $months[$month] . " " . date('Y');

        return $date;
    }
}