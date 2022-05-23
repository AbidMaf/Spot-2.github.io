<?php
// var_dump($kodeMatkul);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <title>SPOT</title>
  <link href="/css/pertemuan.css" rel="stylesheet" type="text/css" />
  <link href="/css/component/navbar.css" rel="stylesheet" type="text/css" />
</head>

<body>  
  <nav class="shadow-sm">
    
  </nav>
  <?php include('components/sidebar.php'); ?>

  <div class="main-content">
    <div class="p-3">
      <div class="row">
        <div class="col-md-6">
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <a href="/MataKuliah">
                <li class="breadcrumb-item active" aria-current="page">
                    
                    <span class="breadcrumb-item-text"><i class="icon ico-dark" data-feather="list"></i>&nbsp;Daftar Mata Kuliah</span>
                </li>
              </a>
              <a>
              <li class="breadcrumb-item active" aria-current="page">
                <?php
                  $row = $DB->where('kd_matkul', $kodeMatkul)->limit('1')->get('matakuliah')->fetch();
                ?>
                <span class="breadcrumb-item-text"><i class="icon ico-dark" data-feather="chevron-right"></i>&nbsp;<?= $row[0]["nama_matkul"] ?></span>
              </li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-lg-4 order-lg-2">
          <div class="sum-nilai-card shadow-sm rounded">
            <h2><?= $row[0]["nama_matkul"] ?></h2>
            <p style="text-align:justify;" class="nilai-desc"><?= $row[0]["description"] ?></p>
          </div>
        </div>
        <div class="col-lg-8 order-lg-1">
          <div class="sum-nilai-matkul-card shadow-sm rounded">
            
            <?php
              $no = 1;
              $pertemuan = $DB->where('kd_matkul', $kodeMatkul)->get('materi')->fetch();
              foreach ($pertemuan as $p) {
            ?>
            <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#collapsedNilai<?= $no ?>" role="button" aria-expanded="false" aria-controls="collapseExample" id="nilaiMataKuliah1" >
              <span class="matkul-name">Pertemuan <?= $p['pertemuan'] ?></span>
              <i class="ico ico-dark rotate180deg" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="collapsedNilai<?= $no ?>">
              <div class="card card-body gy-5">
                <div class="row nilai nilai-total">
                  <div class="col-10">
                    <span><?= $p['judul'] ?></span>
                  </div>
                  <div class="col-2 text-end text-nowrap">
                    <a class="btn btn-primary" href=<?= $kodeMatkul . "/" . $p['id_materi'] ?> role="button">Detail</a>
                  </div>
                </div>
                <?php
                  $points = $helper->separateHighlight($p['highlight']);
                  foreach($points as $point) {
                ?>
                <div class="row nilai">
                  <div class="col-10 ">
                    <span><?= $point ?></span>
                  </div>
                  
                </div>
                <?php } ?>
              </div>
            </div>
            <?php
              $no++;
            } 
            ?>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</body>
</html>
<script>
  feather.replace()
</script>

<script>
  $(document).ready(function () { 
    $(document).click(function(event) {
      if ($('#' + event.target.id).hasClass('nilai-collapse')) {
        $('#' + event.target.id + '>svg').toggleClass('down');
        console.log('asaaasas');
      }
    });
  });
</script>