<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
    integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <title>SPOT</title>
  <link href="css/tugas.css" rel="stylesheet" type="text/css" />
  <link href="css/component/navbar.css" rel="stylesheet" type="text/css" />
  <script src="javascript/tugas.js"></script>
  <script src="script.js"></script>
</head>

<body>
  <?php include('components/sidebar.php'); ?>
  
  <div class="main-content">
    <div class="p-2">

      <?php include('components/breadcrumbs.php'); ?>

      <div class="row mb-3">
        <div class="col-12">
          <div class="content rounded-3 p-3 shadow-sm">
            <h1 class="fs-3 header-title">Daftar Tugas</h1>
            <p class="mb-0 desc-title">Berikut adalah daftar penderitaan anda</p>
          </div>
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-12">
          <div class="cat-tugas">
            <input type="radio" value="Semua Tugas" class="btn-check opt-show-btn shadow-sm" name="option-show" id="all-show" checked onclick="sortTugas()">
            <label for="all-show" class="btn opt-label shadow-sm">Semua Tugas</label>

            <input type="radio" value="Belum Selesai" class="btn-check opt-show-btn" name="option-show" id="not-finish" onclick="sortTugas()">
            <label for="not-finish" class="btn opt-label shadow-sm">Belum Selesai</label>

            <input type="radio" value="Terlambat" class="btn-check opt-show-btn" name="option-show" id="missed" onclick="sortTugas()">
            <label for="missed" class="btn opt-label shadow-sm">Terlambat</label>

            <input type="radio" value="Selesai" class="btn-check opt-show-btn" name="option-show" id="completed" onclick="sortTugas()">
            <label for="completed" class="btn opt-label shadow-sm">Selesai</label>
          </div>
        </div>
      </div>

      <div class="row g-2">
        <?php
          // $test = $DB->query("CALL getUploadedTugas(2000649)")->fetch();
          $getNFTugas = $DB->query("CALL getNFTugas(2000649)")->fetch();
          $DB->reset();
          foreach ($getNFTugas as $tugas) {
        ?>
        <div class="col-lg-6 tugas-row <?= $helper->tagTugas($tugas['status']) ?>">
          <div class="tugas-card shadow-sm rounded">
            <div class="tugas-info">
              <div class="tugas-header">
                <div class="tugas-status">
                  <?= $helper->checkDeadlineTugas($tugas['status']) ?>
                </div>
                <div class="tugas-title"><?= $tugas["judul"] ?></div>
                <div class="tugas-matkul"><?= $tugas["nama_matkul"] ?></div>
              </div>
              <div class="tugas-time">
                <?= $helper->convertSQLDate($tugas['deadline'], "NO_DATE") ?>
              </div>
              <div class="tugas-date">
                <i class="ico ico-dark" data-feather="calendar"></i>
                <span class="time">&nbsp;Deadline: <?= $helper->convertSQLDate($tugas['deadline'], "NO_TIME") ?></span>
              </div>
              <a href="/MataKuliah/<?= $tugas['kd_matkul'] ?>/<?= $tugas['id_materi'] ?>" class="btn btn-primary cta-tugas">Detail</a>
            </div>
          </div>
        </div>
        <?php
          }
          $getDoneTugas = $DB->query("CALL getUploadedTugas(2000649)")->fetch();
          foreach ($getDoneTugas as $tugas) {
        ?>
        <div class="col-lg-6 tugas-row <?= $helper->tagTugas($tugas['status']) ?>">
          <div class="tugas-card shadow-sm rounded">
            <div class="tugas-info">
              <div class="tugas-header">
                <div class="tugas-status">
                  <?= $helper->checkDeadlineTugas($tugas['status']) ?>
                </div>
                <div class="tugas-title"><?= $tugas["judul"] ?></div>
                <div class="tugas-matkul"><?= $tugas["nama_matkul"] ?></div>
              </div>
              <div class="tugas-time">
                <?= $helper->convertSQLDate($tugas['deadline'], "NO_DATE") ?>
              </div>
              <div class="tugas-date">
                <i class="ico ico-dark" data-feather="calendar"></i>
                <span class="time">&nbsp;Deadline: <?= $helper->convertSQLDate($tugas['deadline'], "NO_TIME") ?></span>
              </div>
              <a href="/MataKuliah/<?= $tugas['kd_matkul'] ?>/<?= $tugas['id_materi'] ?>" class="btn btn-primary cta-tugas">Detail</a>
            </div>
          </div>
        </div>
        <?php } ?>
        
        

      </div>

      <!-- <div class="row">
        <div class="col-12">
          <section class="tugas mb-2 table-responsive rounded shadow-sm">
            <table class="table table-striped table-bordered">
              <thead>
                <th scope="col">No</th>
                <th scope="col">Judul Tugas</th>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Waktu Pengumpulan</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Ujian Tengah Semester</td>
                  <td>Pemrograman Web</td>
                  <td>29 Maret 2022 12:00</td>
                  <td><span class="badge bg-secondary text-wrap">Belum dikumpulkan</span></td>
                  <td><a href="detailTugas.html" class="btn btn-primary">Detail</a></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Laporan Praktikum Packet Tracer</td>
                  <td>Jaringan Komputer</td>
                  <td>29 Maret 2022 23:59</td>
                  <td><span class="badge bg-secondary text-wrap">Belum dikumpulkan</span></td>
                  <td><a href="detailTugas.html" class="btn btn-primary">Detail</a></td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Laporan Praktikum 5</td>
                  <td>Basis Data</td>
                  <td>31 Maret 2022 21:00</td>
                  <td><span class="badge bg-secondary text-wrap">Belum dikumpulkan</span></td>
                  <td><a href="detailTugas.html" class="btn btn-primary">Detail</a></td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>Ujian Tengah Semester</td>
                  <td>Konstruksi Perangkat Lunak</td>
                  <td>24 Maret 2022 12:00</td>
                  <td><span class="badge bg-alert text-wrap">Tidak Mengumpulkan</span></td>
                  <td><a href="detailTugas.html" class="btn btn-primary">Detail</a></td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>Profile Diri</td>
                  <td>Pemrograman Web</td>
                  <td>16 Maret 2022 12:00</td>
                  <td><span class="badge bg-success text-wrap">Selesai</span></td>
                  <td><a href="detailTugas.html" class="btn btn-primary">Detail</a></td>
                </tr>
              </tbody>
            </table>
          </section>
        </div>
      </div> -->
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
