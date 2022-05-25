<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>SPOT</title>
  <link href="css/daftarMataKuliah.css" rel="stylesheet" type="text/css" />
  <link href="css/component/navbar.css" rel="stylesheet" type="text/css" />
  <script src="script.js"></script>
</head>

<body>
  <nav class="shadow-sm">
    
  </nav>
  <?php include('components/sidebar.php'); ?>
  
  <div class="main-content">
    <div class="p-2">
    <?php include('components/breadcrumbs.php'); ?>
      <div class="row g-2">
        <?php
          $row = $DB->table('matakuliah')->join('dosen', 'nid')->get()->fetch();
          foreach($row as $p){
        ?>
        <div class="col-lg-4">
          <div class="matkul-card shadow-sm rounded">
            <div class="matkul-info">
              <div class="matkul-header">
                <div class="matkul-kode">
                  <?= $p["kd_matkul"] ?>
                </div>
                <div class="matkul-title">
                  <?= $p["nama_matkul"] ?>
                  <div class="badge badge-primary schedule-tag"><span>today</span></div>
                </div>
              </div>
              <div class="matkul-sks">
                <?= $p["sks"] ?> SKS
              </div>
              <div class="matkul-dosen">
                <i class="ico ico-dark" data-feather="user"></i>
                &nbsp;<?= $p["name"] ?>
              </div>
              <div class="matkul-description">
                <?= $p["description"] ?>
              </div>
              <a href="MataKuliah/<?= $p['kd_matkul'] ?>" class="btn btn-primary cta-matkul">Go</a>
            </div>
          </div> 
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</body>
</html>
<script>
  feather.replace()
</script>