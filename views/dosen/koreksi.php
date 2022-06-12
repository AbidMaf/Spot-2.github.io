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
      <div class="row g-3">
        <div class="col-lg-12">
          <div class="matkul-card shadow-sm rounded">
            <!-- Sistem Operasi -->
            <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#detailbti" role="button" aria-expanded="false" aria-controls="collapseExample" id="nilaiMataKuliah">
              <div class="matkul-info">
                <div class="matkul-header">
                  <div class="matkul-kode">
                    PT502
                  </div>
                  <div class="matkul-title">
                    Sistem Operasi
                  </div>
                </div>
                <div class="matkul-sks-dosen mb-2">
                  3 SKS
                </div>
                <div class="matkul-dosen">
                  <i class="ico ico-dark" data-feather="book"></i>
                  &nbsp;Rekayasa Perangkat Lunak
                </div>
              </div>
            </a>
            <!-- Detail Sistem Operasi -->
            <div class="collapse" id="detailbti">
              <div class="card card-body gy-5 card">
                <!-- Pertemuan 1 -->
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
                        <a class="btn btn-primary" href=/koreksi/so role="button">Koreksi</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Pertemuan 2 -->
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
                        <a class="btn btn-primary" href=/koreksi/so role="button">Koreksi</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-lg-12">
          <div class="matkul-card shadow-sm rounded">
            <!-- PBO -->
            <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#detailpbo" role="button" aria-expanded="false" aria-controls="collapseExample" id="nilaiMataKuliah">
              <div class="matkul-info">
                <div class="matkul-header">
                  <div class="matkul-kode">
                    RL209
                  </div>
                  <div class="matkul-title">
                    Pemrograman Berorientasi Objek
                  </div>
                </div>
                <div class="matkul-sks-dosen mb-2">
                  3 SKS
                </div>
                <div class="matkul-dosen">
                  <i class="ico ico-dark" data-feather="book"></i>
                  &nbsp;Rekayasa Perangkat Lunak
                </div>
              </div>
            </a>
            <!-- Detail PBO -->
            <div class="collapse" id="detailpbo">
              <div class="card card-body gy-5 card">
                <!-- Pertemuan 1 -->
                <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#pbocollapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <span class="matkul-name">Pertemuan 1</span>
                </a>
                <div class="collapse" id="pbocollapse">
                  <div class="card card-body gy-5">
                    <div class="row nilai nilai-total">
                      <div class="col-10">
                        <span>Lorem ipsum</span>
                      </div>
                      <div class="col-2 text-end text-nowrap">
                        <a class="btn btn-primary" href=/koreksi/pbo role="button">Koreksi</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Pertemuan 2 -->
                <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#pbocollapse2" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <span class="matkul-name">Pertemuan 2</span>
                </a>
                <div class="collapse" id="pbocollapse2">
                  <div class="card card-body gy-5">
                    <div class="row nilai nilai-total">
                      <div class="col-10">
                        <span>Lorem ipsum</span>
                      </div>
                      <div class="col-2 text-end text-nowrap">
                        <a class="btn btn-primary" href=/koreksi/pbo role="button">Koreksi</a>
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