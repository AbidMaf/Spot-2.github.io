<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
    integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <title>SPOT</title>
  <link href="\css\materi.css" rel="stylesheet" type="text/css" />
  <link href="\css\component\navbar.css" rel="stylesheet" type="text/css" />
  <script src="script.js"></script>
</head>

<body>
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
              <a href=<?= "/MataKuliah/" . $kodeMatkul ?>>
                <li class="breadcrumb-item active" aria-current="page">
                  <?php
                    $row = $DB->table('materi')->join('matakuliah', 'kd_matkul')->where('materi.id_materi', $idMateri)->get()->fetch();
                  ?>
                  <span class="breadcrumb-item-text"><i class="icon ico-dark" data-feather="chevron-right"></i>&nbsp;<?= $row[0]["nama_matkul"] ?></span>
                </li>
              </a>
              <a href="materi.html">
                <li class="breadcrumb-item active" aria-current="page">

                  <span class="breadcrumb-item-text"><i class="icon ico-dark"
                      data-feather="chevron-right"></i>&nbsp;Pertemuan <?= $row[0]["pertemuan"] ?></span>
                </li>
              </a>
            </ol>
          </div>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-lg-4 order-lg-2">
          <div class="sum-nilai-card shadow-sm rounded">
            <h3><?= $row[0]["nama_matkul"] ?></h3>
            <p style="text-align:center;" class="nilai-desc">Pertemuan <?= $row[0]["pertemuan"] ?></p>
            <p style="text-align:center;" class="nilai-desc">Update Terakhir: <?= $helper->convertSQLDate($row[0]["last_update"]) ?></p>
          </div>
        </div>
        <div class="col-lg-8 order-lg-1">
          <div class="sum-nilai-card shadow-sm rounded">
            <ul id="myTab" role="tablist"
              class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
              <li class="nav-item flex-sm-fill">
                <a id="materi-tab" data-toggle="tab" href="#materi" role="tab" aria-controls="materi"
                  aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active">Materi</a>
              </li>
              <li class="nav-item flex-sm-fill">
                <a id="tugas-tab" data-toggle="tab" href="#tugas" role="tab" aria-controls="tugas" aria-selected="false"
                  class="nav-link border-0 text-uppercase font-weight-bold">Tugas</a>
              </li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div id="materi" role="tabpanel" aria-labelledby="materi-tab" class="tab-pane fade px-3 py-4 show active">
                <p class="text-muted">
                  <b><?= $row[0]["judul"] ?></b>
                </p>
                <p class="text-muted mb-0">
                  <?= $row[0]["deskripsi"] ?>
                </p>
              </div>
              <?php
                $idTugas = NULL;
                $result = $DB->table('tugas')->where('id_materi', $idMateri)->get();
              ?>
              <div id="tugas" role="tabpanel" aria-labelledby="tugas-tab" class="tab-pane fade px-3 py-4">
                <p class="text-muted">
                  <?php
                    if($result->count() > 0){
                      $tugas = $result->fetch();
                      $idTugas = $tugas[0]["id_tugas"];
                      echo "<b>" . $tugas[0]["judul"] . "</b><br>";
                      echo $tugas[0]["deskripsi"];
                    ?>
                    <form action="/uploadTugas" method="POST" enctype="multipart/form-data">
                      <div class="mb-3 upload-bar">
                        <input type="text" name="npm" value="<?= $_SESSION['npm'] ?>" hidden>
                        <input type="text" name="id_tugas" value="<?= $tugas[0]['id_tugas'] ?>" hidden>
                        <input type="text" name="kd_matkul" value="<?= $kodeMatkul ?>" hidden>
                        <?php
                          $DB->reset();
                          $checkUpload = $DB->table('upload_tugas')->where('npm', $_SESSION['npm'])->where('id_tugas', $idTugas)->get();
                          $checkNilai = $checkUpload->fetch();
                          if((int)$checkNilai > 0) { ?>
                            <input type="file" class="form-control input-tugas" id="formfile" name="formfile" hidden>
                            <input type="submit" class="form-control btn btn-primary btn-submit" value="Kumpulkan" hidden>
                            <b>Sudah dinilai</b>
                        <?php
                          } else { ?>
                            <input type="file" class="form-control input-tugas" id="formfile" name="formfile">
                            <input type="submit" class="form-control btn btn-primary btn-submit" value="Kumpulkan">
                        <?php } ?>
                      </div>
                    </form>
                    <?php
                    }else{
                      echo "Hore! Belum ada tugas.";
                    }
                  ?>
                </p>
                <?php
                  $DB->reset();
                  $checkUpload = $DB->table('upload_tugas')->where('npm', $_SESSION['npm'])->where('id_tugas', $idTugas)->get();
                  // $checkNilai = $checkUpload->fetch();
                  if($checkUpload->count() > 0) {
                    $upload = $checkUpload->fetch();
                ?>
                <div class="submission-info" style="width: 100%;">
                  <span class="file float-left">
                    <i class="icon" data-feather="file"></i>
                    <a href="<?= $_SERVER['DOCUMENT_ROOT'] . "/assets/tugas/" . str_replace("+", " ", $upload[0]["file"]) ?>" target="_blank" rel="noopener noreferrer"><?= str_replace("+", " ", $upload[0]["file"]) ?></a>
                  </span>
                  <span class="nilai float-right" style="float: right">Nilai: <b><?= $upload[0]['nilai'] ?></b></span>
                </div>
                <?php
                  // if(date("Y-m-d", strtotime($tugas[0]["deadline"])) >= date("Y-m-d")){
                  if((int)$upload[0]['nilai'] <= 0){
                    
                    ?>
                    <a href="/deleteUploadTugas/<?= $upload[0]['id_up_tugas'] ?>" class="btn btn-primary hapus-tugas">
                      <i class="icon ico-dark" data-feather="trash"></i>
                      Hapus Tugas
                    </a>
                    <?php
                  } else { ?>
                    <a class="btn btn-primary hapus-tugas disabled" aria-disabled="true">
                      <i class="icon ico-dark" data-feather="trash"></i>
                      Hapus Tugas 
                    </a>
                  <?php } ?>
                
                <?php } ?>
              </div>
              <div id="evaluasi" role="tabpanel" aria-labelledby="evaluasi-tab" class="tab-pane fade px-3 py-4">
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                  incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco
                  laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                  irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                  sint
                  occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                  incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco
                  laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                  irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                  sint
                  occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>
<script>
  feather.replace()

  $(document).ready(function () {
    $(document).click(function (event) {
      if ($('#' + event.target.id).hasClass('nilai-collapse')) {
        $('#' + event.target.id + '>svg').toggleClass('down');
        console.log('asaaasas');
      }
    });
  });
</script>