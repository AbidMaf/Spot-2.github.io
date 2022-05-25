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
  <title>SPOT</title>
  <link href="css/tugas.css" rel="stylesheet" type="text/css" />
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
            <input type="radio" class="btn-check opt-show-btn shadow-sm" name="option-show" id="all-show" checked>
            <label for="all-show" class="btn opt-label shadow-sm">Semua Tugas</label>

            <input type="radio" class="btn-check opt-show-btn" name="option-show" id="not-finish">
            <label for="not-finish" class="btn opt-label shadow-sm">Belum Selesai</label>

            <input type="radio" class="btn-check opt-show-btn" name="option-show" id="missed">
            <label for="missed" class="btn opt-label shadow-sm">Terlambat</label>

            <input type="radio" class="btn-check opt-show-btn" name="option-show" id="completed">
            <label for="completed" class="btn opt-label shadow-sm">Selesai</label>
          </div>
        </div>
      </div>

      <div class="row g-2">
        <?php
          $getTugas = $DB->table('tugas')->get()->fetch();
          $checkTugas = $DB->table('tugas')
          ->join('upload_tugas', 'id_tugas')
          ->where('npm', $_SESSION['npm'])
          ->get()->fetch();
          
        ?>
        <div class="col-lg-6 tugas-row">
          <div class="tugas-card shadow-sm rounded">
            <div class="tugas-info">
              <div class="tugas-header">
                <div class="tugas-status">
                  <span class="badge bg-secondary text-wrap">Belum dikumpulkan</span>
                </div>
                <div class="tugas-title">Tugas Pertemuan 13</div>
                <div class="tugas-matkul">Pemrograman Web</div>
              </div>
              <div class="tugas-time">
                23:59
              </div>
              <div class="tugas-date">
                <i class="ico ico-dark" data-feather="calendar"></i>
                <span class="time">&nbsp;Deadline: 29 Maret 2022</span>
              </div>
              <a href="" class="btn btn-primary cta-tugas">Detail</a>
            </div>
          </div>
        </div>
        
        <div class="col-lg-6 tugas-row">
          <div class="tugas-card shadow-sm rounded">
            <div class="tugas-info">
              <div class="tugas-header">
                <div class="tugas-status">
                  <span class="badge bg-primary text-wrap">Terlambat</span>
                </div>
                <div class="tugas-title">Tugas Pertemuan 13</div>
                <div class="tugas-matkul">Pemrograman Web</div>
              </div>
              <div class="tugas-time">
                23:59
              </div>
              <div class="tugas-date">
                <i class="ico ico-dark" data-feather="calendar"></i>
                <span class="time">&nbsp;Deadline: 29 Maret 2022</span>
              </div>
              <a href="" class="btn btn-primary cta-tugas">Detail</a>
            </div>
          </div>
        </div>

        <div class="col-lg-6 tugas-row">
          <div class="tugas-card shadow-sm rounded">
            <div class="tugas-info">
              <div class="tugas-header">
                <div class="tugas-status">
                  <span class="badge bg-success text-wrap">Selesai</span>
                </div>
                <div class="tugas-title">Tugas Pertemuan 13</div>
                <div class="tugas-matkul">Pemrograman Web</div>
              </div>
              <div class="tugas-time">
                23:59
              </div>
              <div class="tugas-date">
                <i class="ico ico-dark" data-feather="calendar"></i>
                <span class="time">&nbsp;Deadline: 29 Maret 2022</span>
              </div>
              <a href="" class="btn btn-primary cta-tugas">Detail</a>
            </div>
          </div>
        </div>

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
