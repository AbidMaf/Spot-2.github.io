<?php 
$request = $_SERVER['REQUEST_URI'];
$requestParsed = explode("/", strtolower(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
$active_menu = 'class="active"';
?>

<div class="sidebar shadow-sm">
    <div class="brand">
      <img class="logo" src="/assets/image/Logo_Almamater_UPI.svg" width="45">
      <span class="brand-name">SPOT</span>
      <span class="brand-version">2.0</span>
    </div>
    <hr style="margin: 0;">
    <div class="login-info">
      <img class="avatar" src="/assets/image/profile.jpg" alt="profile" width="72">
      <span class="name"><?= $_SESSION['npm'] ?></span>
      <span class="nim"><?= ucwords(strtolower($_SESSION['name'])) ?></span>
    </div>
    <a <?= ($requestParsed[1] == 'dashboard' || $request == '/') ? $active_menu : '' ?> href="/">
      <i class="icon" data-feather="pie-chart"></i>
      <span class="menu-name">&nbsp;Dashboard</span>
    </a>
    <a <?= ($requestParsed[1] == 'matakuliah') ? $active_menu : '' ?> href="/MataKuliah">
      <i class="icon" data-feather="list"></i>
      <span class="menu-name">&nbsp;Daftar Mata Kuliah</span>
    </a>
    <a <?= ($requestParsed[1] == 'tugas') ? $active_menu : '' ?> href="/Tugas">
      <div class="badge-bar"></div>
      <i class="icon" data-feather="check-circle"></i>
      <span class="menu-name">&nbsp;Tugas</span>
      <span class="badge">3</span>
    </a>
    <a <?= ($requestParsed[1] == 'nilai') ? $active_menu : '' ?> href="/Nilai">
      <i class="icon" data-feather="star"></i>
      <span class="menu-name">&nbsp;Keseluruhan Nilai</span>
    </a>
    <a class="menu-settings logout" href="/Logout">
      <i class="icon" data-feather="log-out"></i>
      <span class="menu-name">&nbsp;Logout</span>
    </a>
  </div>