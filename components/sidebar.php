<?php 
$request = $_SERVER['REQUEST_URI'];
$requestParsed = explode("/", strtolower(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
$active_menu = 'class="active"';
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<nav class="shadow-sm">
  <!-- <div class="notification">
    <div class="notification-badge"></div>
    <i class="icon" data-feather="bell"></i>
    <div class="notification-container">
      <span class="notification-arrow"></span>
      <div class="notification-list">
        
      </div>
    </div>
  </div> -->
</nav>

<?php
  if($_SESSION["level"] == "mahasiswa"){
?>
<div class="sidebar shadow-sm">
    <div class="brand">
      <img class="logo" src="/assets/image/Logo_Almamater_UPI.svg" width="45">
      <span class="brand-name">SPOT</span>
      <span class="brand-version">2.0</span>
    </div>
    <hr style="margin: 0;">
    <div class="login-info">
      <div class="avatar-circle" id="profilePicture" title="Kami merekomendasikan menggunakan gambar dengan rasio 1:1">
        <?php
          $fileName = $DB->columns(['avatar'])->table('mahasiswa')->where('npm', $_SESSION['npm'])->limit('1')->get()->fetch();
          $DB->reset();
        ?>
        <img class="avatar" id="avatarPicture" src="/assets/image/profile/<?= $fileName[0]['avatar'] ?>" alt="profile" width="72">
        <div class="overlay-change">
          <i class="icon" data-feather="camera"></i>
          <span>Click here to change photo</span>
        </div>
      </div>
      <form action="/changeAvatar" method="post" id="formImage">
        <input type="file" name="upload-image" id="uploadImage" accept=".png, .jpg, .jpeg" style="display: none;"/>
        <input type="text" name="level" value="<?= $_SESSION["level"] ?>" hidden>
      </form>
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
      <?php
      $getNFTugas = $DB->query("CALL getNFTugas(2000649)")->count();

      if($getNFTugas > 0 ) {
      ?>
      <span class="badge"><?= $getNFTugas ?></span>
      <?php } ?>
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

  <?php
    } 
    elseif($_SESSION["level"] == "dosen"){
  ?>
  <div class="sidebar shadow-sm">
    <div class="brand">
      <img class="logo" src="/assets/image/Logo_Almamater_UPI.svg" width="45">
      <span class="brand-name">SPOT</span>
      <span class="brand-version">2.0</span>
    </div>
    <hr style="margin: 0;">
    <div class="login-info">
      <div class="avatar-circle" id="profilePicture" title="Kami merekomendasikan menggunakan gambar dengan rasio 1:1">
        <?php
          $fileName = $DB->columns(['avatar'])->table('dosen')->where('nid', $_SESSION['nid'])->limit('1')->get()->fetch();
          $DB->reset();
        ?>
        <img class="avatar" id="avatarPicture" src="/assets/image/profile/<?= $fileName[0]['avatar'] ?>" alt="profile" width="72">
        <div class="overlay-change">
          <i class="icon" data-feather="camera"></i>
          <span>Click here to change photo</span>
        </div>
      </div>
      <form action="/changeAvatar" method="post" id="formImage">
        <input type="file" name="upload-image" id="uploadImage" accept=".png, .jpg, .jpeg" style="display: none;"/>
        <input type="text" name="level" value="<?= $_SESSION["level"] ?>" hidden>
      </form>
      <span class="name"><?= $_SESSION['nid'] ?></span>
      <span class="nim"><?= ucwords(strtolower($_SESSION['name'])) ?></span>
    </div>
    <a class="menu-nilai <?= ($requestParsed[1] == 'dosen' || $request == '/') ? "active" : '' ?>" href="/dosen">
      <i class="icon" data-feather="list"></i>
      <span class="menu-name">&nbsp;Daftar Mata Kuliah</span>
    </a>
    <a class="<?= ($requestParsed[1] == 'koreksi') ? "active" : '' ?>" href="/koreksi">
      <i class="icon" data-feather="edit-3"></i>
      <span class="menu-name">&nbsp;Koreksi Tugas</span>
    </a>
    <a class="<?= ($requestParsed[1] == 'dosen-nilai') ? "active" : '' ?>" href="/dosen-nilai">
      <i class="icon" data-feather="star">2</i>
      <span class="menu-name">&nbsp;Nilai Mahasiswa</span>
    </a>
    <a class="menu-settings logout" href="/Logout">
      <i class="icon" data-feather="log-out"></i>
      <span class="menu-name">&nbsp;Logout</span>
    </a>
  </div>
  <?php } else {echo "no level?" . $_SESSION["level"];} ?>

  <script>
      $('#profilePicture').on('click', function(e) {
        $('#uploadImage').trigger('click');
      });
  </script>

  <script>
    $('#uploadImage').change(function(e) {
      if(document.getElementById('uploadImage').files.length != 0) {
        e.preventDefault();

        var formData = new FormData();
        formData.append('upload-image', $('#uploadImage')[0].files[0]);

        $.ajax({
          url: '/changeAvatar',
          type: 'post',
          data: formData,
          async: false,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            d = new Date();
            $('#avatarPicture').attr("src", "/assets/image/profile/" + data + "?" + d.getTime());
          },
          error: function(){
            alert('error in ajax');
          }
        });

        return false;
        // $('#formImage').submit();
      }
    });
  </script>

  <script>
    $(function() {
      $(document).tooltip({
        items: ".avatar-circle",
        content: function() {
          return $(this).attr('title');
        }
      });
    })
  </script>