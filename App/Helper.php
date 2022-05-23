<?php

namespace App;

class Helper {

    public function convertDay($day)
    {
        $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        return $days[$day];
    }

    public function convertMonth($month)
    {
        $months = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        return $months[$month];
    }

    public function convertSQLDate($date)
    {
        $strtotime = strtotime($date);
        return date('d', $strtotime) . ' ' . $this->convertMonth(date('n', $strtotime)) . ' ' . date('Y', $strtotime) . ' ' . date('H:i:s', $strtotime);
    }

    public function getTodayDate()
    {
        $day = date('w');
        $month = date('n');
        $date = $this->convertDay($day) . ", " . date('j') . " " . $this->convertMonth($month) . " " . date('Y');

        return $date;
    }

    public function separateHighlight($points)
    {
        $highlight = array();
        $highlight = explode("|", $points);
        return $highlight;
    }

    public function checkSession()
    {
        if(!isset($_SESSION)){
            session_start();
        }
        if (!isset($_SESSION['name'])) {
            $request = $_SERVER['REQUEST_URI'];
            if (strtolower($request) != '/login') {
                return header('Location: /Login');
            }
        }
    }
}