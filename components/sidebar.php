<?php 
$request = $_SERVER['REQUEST_URI'];
$active_menu = 'class="active"';
?>

<div class="sidebar shadow-sm">
    <div class="brand">
      <img class="logo" src="assets/image/Logo_Almamater_UPI.svg" width="45">
      <span class="brand-name">SPOT</span>
      <span class="brand-version">2.0</span>
    </div>
    <hr style="margin: 0;">
    <div class="login-info">
      <img class="avatar" src="assets/image/profile.jpg" alt="profile" width="72">
      <span class="name" id="getnama"></span>
      <span class="nim" id="getnim"></span>
    </div>
    <a <?= ($request == '/dashboard' || $request == '/') ? $active_menu : '' ?> href="/">
      <i class="icon" data-feather="pie-chart"></i>
      <span class="menu-name">&nbsp;Dashboard</span>
    </a>
    <a <?= ($request == '/MataKuliah') ? $active_menu : '' ?> href="/MataKuliah">
      <i class="icon" data-feather="list"></i>
      <span class="menu-name">&nbsp;Daftar Mata Kuliah</span>
    </a>
    <a <?= ($request == '/Tugas') ? $active_menu : '' ?> href="/Tugas">
      <div class="badge-bar"></div>
      <i class="icon" data-feather="check-circle"></i>
      <span class="menu-name">&nbsp;Tugas</span>
      <span class="badge">3</span>
    </a>
    <a <?= ($request == '/Nilai') ? $active_menu : '' ?> href="/Nilai">
      <i class="icon" data-feather="star">2</i>
      <span class="menu-name">&nbsp;Keseluruhan Nilai</span>
    </a>
    <a class="menu-settings logout" href="/Login">
      <i class="icon" data-feather="log-out">2</i>
      <span class="menu-name">&nbsp;Logout</span>
    </a>
  </div>