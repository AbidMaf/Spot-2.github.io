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

    public function getNilaiDesc($predikat)
    {
        $desc = "";

        if ($predikat == "A") {
            $desc = "<b>Sangat baik dan sempurna</b>. Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua materi perkuliahan";
        } elseif ($predikat == "A-") {
            $desc = "<b>Lebih dari baik</b>. Dapat mengingat, mengetahui, menerapkan, menganalisis semua materi perkuliahan tetapi kurang teliti mengevaluasi salah satu materi perkuliahan";
        } elseif ($predikat == "B+") {
            $desc = "<b>Sangat baik</b>. Dapat mengingat, mengetahui, menerapkan, menganalisis sebagian besar materi perkuliahan tetapi kurang bisa mengevaluasi salah satu dari materi perkuliahan";
        } elseif ($predikat == "B") {
            $desc = "<b>Baik</b>. Dapat mengingat, mengetahui, menerapkan, menganalis sebagian besar materi perkuliahan tetapi kurang bisa mengevaluasi dua materi perkuliahan";
        } elseif ($predikat == "B-") {
            $desc = "<b>Cukup Baik</b>. Dapat mengingat, mengetahui, menerapkan sebagian besar materi perkuliahan tetapi kurang bisa menganalisis dan mengevaluasi dua materi perkuliahan";
        } elseif ($predikat == "C+") {
            $desc = "<b>Cukup</b>. Dapat mengingat, mengetahui sebagian materi perkuliahan,tetapi kurang bisa menerapkan, menganalisis dan mengevaluasi beberapa materi perkuliahan";
        } elseif ($predikat == "C") {
            $desc = "<b>Cukup</b>. Tidak dapat mengingat, mengetahui sebagian materi perkuliahan, tetapi dapat menerapkan, menganalisis dan mengevaluasi beberapa materi perkuliahan";
        } elseif ($predikat == "C-") {
            $desc = "<b>Kurang</b>. Tidak dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi materi perkuliahan";
        } elseif ($predikat == "D") {
            $desc = "<b>Kurang </b>. Tidak dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi materi perkuliahan";
        } elseif ($predikat == "E") {
            $desc = "<b>Tidak Lulus</b>. blok";
        }

        return $desc;
    }

    public function checkUploadTugas($date) {
        $date = strtotime($date);
        $now = strtotime(date('Y-m-d H:i:s'));
        $diff = $now - $date;
        $diff = floor($diff / (60 * 60 * 24));

        if ($diff > 7) {
            return true;
        } else {
            return false;
        }
    }
}