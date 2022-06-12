<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>SPOT</title>
  <link href="../../css/koreksi.css" rel="stylesheet" type="text/css" />
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
      <div class="row g-3">
        <div class="col-lg-12">
          <div class="matkul-card shadow-sm rounded">
            <!-- Progweb -->
            <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#detailweb" role="button" aria-expanded="false" aria-controls="collapseExample" id="nilaiMataKuliah">
              <div class="matkul-info">
                <div class="matkul-header">
                  <div class="matkul-kode">
                    RL210
                  </div>
                  <div class="matkul-title">
                    Pemrograman Web
                  </div>
                </div>
                <div class="matkul-sks-dosen mb-2">
                  4 SKS
                </div>
                <div class="matkul-dosen">
                  <i class="ico ico-dark" data-feather="book"></i>
                  &nbsp;Rekayasa Perangkat Lunak
                </div>
                <div class="matkul-description">
                  Mata kuliah ini mengajarkan prinsip-prinsip dasar Internet dan teknologi yang dapat digunakan untuk membangun sebuah Aplikasi Internet. HTML dan CSS yang merupakan komponen dasar dari halaman web, merupakan dua topik pertama yang dibahas dalam mata kuliah ini. Mata kuliah ini kemudian membahas penampilan web secara dinamis menggunakan Javascript. Javascript juga merupakan dasar pemrograman Ajax yang juga akan diperkenalkan pada mata kuliah ini. Pemrograman dari sisi server juga akan dibahas dengan menggunakan bahasa PHP dan ASP. Mahasiswa juga diajarkan untuk menganalisis berbagai aspek kualitas pada aplikasi internet, seperti: usability, security, dan performance.
                </div>
              </div>
            </a>
            <!-- Detail Progweb -->
            <div class="collapse" id="detailweb">
              <div class="card card-body gy-5 card">
                <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#webcollapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <span class="matkul-name">Pertemuan 1</span>
                </a>
                <div class="collapse" id="webcollapse">
                  <div class="card card-body gy-5">
                    <div class="row nilai nilai-total">
                      <div class="col-10">
                        <span>Lorem ipsum</span>
                      </div>
                      <div class="col-2 text-end text-nowrap">
                        <a class="btn btn-primary" href=/koreksi/web role="button">Koreksi</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- 2 -->
                <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#webcollapse2" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <span class="matkul-name">Pertemuan 2</span>
                </a>
                <div class="collapse" id="webcollapse2">
                  <div class="card card-body gy-5">
                    <div class="row nilai nilai-total">
                      <div class="col-10">
                        <span>Lorem ipsum</span>
                      </div>
                      <div class="col-2 text-end text-nowrap">
                        <a class="btn btn-primary" href=/koreksi/web role="button">Koreksi</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- BTI -->
      <div class="row g-3">
        <div class="col-lg-12">
          <div class="matkul-card shadow-sm rounded">
            <!-- BTI -->
            <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#detailbti" role="button" aria-expanded="false" aria-controls="collapseExample" id="nilaiMataKuliah">
              <div class="matkul-info">
                <div class="matkul-header">
                  <div class="matkul-kode">
                    RL211
                  </div>
                  <div class="matkul-title">
                    Bisnis Teknologi Informasi
                  </div>
                </div>
                <div class="matkul-sks-dosen mb-2">
                  2 SKS
                </div>
                <div class="matkul-dosen">
                  <i class="ico ico-dark" data-feather="book"></i>
                  &nbsp;Teknik Komputer
                </div>
              </div>
            </a>
            <!-- Detail BTI -->
            <div class="collapse" id="detailbti">
              <div class="card card-body gy-5 card">
                <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#bticollapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <span class="matkul-name">Pertemuan 1</span>
                </a>
                <div class="collapse" id="bticollapse">
                  <div class="card card-body gy-5">
                    <div class="row nilai nilai-total">
                      <div class="col-10">
                        <span>Lorem ipsum</span>
                      </div>
                      <div class="col-2 text-end text-nowrap">
                        <a class="btn btn-primary" href=/koreksi/bti role="button">Koreksi</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- 2 -->
                <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#bticollapse2" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <span class="matkul-name">Pertemuan 2</span>
                </a>
                <div class="collapse" id="bticollapse2">
                  <div class="card card-body gy-5">
                    <div class="row nilai nilai-total">
                      <div class="col-10">
                        <span>Lorem ipsum</span>
                      </div>
                      <div class="col-2 text-end text-nowrap">
                        <a class="btn btn-primary" href=/koreksi/bti role="button">Koreksi</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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