<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>SPOT - Koreksi</title>
  <link href="../../css/dosen.css" rel="stylesheet" type="text/css" />
  <link href="../../css/component/navbar.css" rel="stylesheet" type="text/css" />
  <script src="../../script.js"></script>
</head>

<body>
  <?php include('components/sidebar.php'); ?>

  <div class="main-content">
    <div class="p-3">
      <!-- Date -->
      <div class="row">
        <div class="col-md-6">
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <i class="icon ico-dark" data-feather="edit-3"></i>
                <span class="breadcrumb-item-text">&nbsp;Koreksi Tugas</span>
              </li>
            </ol>
          </div>
        </div>
        <div class="col-md-6 date">
          <i class="ico ico-dark" data-feather="calendar"></i>
          <span class="date-text">&nbsp;<?= $helper->getTodayDate() ?></span>
        </div>
      </div>
      <?php
          $getMatkul = $DB->query("SELECT * FROM matakuliah WHERE nid = '". $_SESSION['nid'] . "' OR nid2 = '" . $_SESSION['nid'] . "'")->fetch();
          foreach($getMatkul as $matkul) {
      ?>
      <div class="row g-3">
        <div class="col-lg-12">
          <div class="matkul-card shadow-sm rounded">
            <!-- Sistem Operasi -->
            <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#detailbti<?= $matkul['kd_matkul'] ?>" role="button" aria-expanded="false" aria-controls="collapseExample" id="nilaiMataKuliah">
              <div class="matkul-info">
                <div class="matkul-header">
                  <div class="matkul-kode">
                    <?= $matkul['kd_matkul'] ?>
                  </div>
                  <div class="matkul-title">
                  <?= $matkul['nama_matkul'] ?>
                  </div>
                </div>
                <div class="matkul-sks-dosen mb-2">
                  <?= $matkul['sks'] ?> SKS
                </div>
                <div class="matkul-dosen">
                  <i class="ico ico-dark" data-feather="book"></i>
                  &nbsp;Rekayasa Perangkat Lunak
                </div>
              </div>
            </a>
            <!-- Detail Sistem Operasi -->
            <div class="collapse" id="detailbti<?= $matkul['kd_matkul'] ?>">
              <div class="card card-body gy-5 card">
                <?php
                  $getPertemuan = $DB->table('materi')->where('kd_matkul', $matkul['kd_matkul'])->get()->fetch();
                  foreach ($getPertemuan as $pertemuan) {
                ?>
            
                <!-- Pertemuan 1 -->
                <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#bticollapse<?= $pertemuan['pertemuan'] . $pertemuan['kd_matkul'] ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <span class="matkul-name">Pertemuan <?= $pertemuan['pertemuan'] ?></span>
                </a>
                <div class="collapse" id="bticollapse<?= $pertemuan['pertemuan'] . $pertemuan['kd_matkul'] ?>">
                  <div class="card card-body gy-5">
                    <div class="row nilai nilai-total">
                      <div class="col-10">
                        <span>Lihat Pengumpulan Tugas</span>
                      </div>
                      <div class="col-2 text-end text-nowrap">
                        <a class="btn btn-primary" href="/koreksi/<?= $pertemuan['kd_matkul'] ?>/<?= $pertemuan['pertemuan'] ?>" role="button">Koreksi</a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      
    </div>
  </div>

  <script>
    getdata();
  </script>
</body>

</html>
<script>
  feather.replace()
</script>