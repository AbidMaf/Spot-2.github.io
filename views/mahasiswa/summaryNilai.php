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
  <link href="css/summaryNilai.css" rel="stylesheet" type="text/css" />
  <link href="css/component/navbar.css" rel="stylesheet" type="text/css" />
  <!-- <script src="javascript/Export-Html-Table-To-Excel-Spreadsheet-using-jQuery-table2excel/src/jquery.table2excel.js"></script> -->
  <script src="script.js"></script>
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
              <li class="breadcrumb-item active" aria-current="page">
                <i class="icon ico-dark" data-feather="star"></i>
                <span class="breadcrumb-item-text">&nbsp;Keseluruhan Nilai</span>
              </li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-lg-4 order-lg-2">
          <div class="sum-nilai-card shadow-sm rounded">
            <h6 class="avg-card-title">Nilai keseluruhan sementara</h6>
            <?php
              $nilaiTotal = $DB->query("SELECT getNilaiSummary('$_SESSION[npm]') AS nilai")->fetch();
              $predikat = $DB->query("SELECT setPredikat('" . $nilaiTotal[0]["nilai"] . "') AS predikat")->fetch();
            ?>
            <h1 class="h1 predikat"><?= $predikat[0]["predikat"] ?></h1>
            <span class="score">(<?= $nilaiTotal[0]["nilai"] ?>)</span>
            <p class="nilai-desc"><b>Sangat bagus</b>. Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae et nobis repellendus quis quae libero assumenda.</p>
          </div>
        </div>
        <div class="col-lg-8 order-lg-1">
          <div class="sum-nilai-matkul-card shadow-sm rounded">
          <?php
            $no = 1;
            $getMatkul = $DB->table('matakuliah')->get()->fetch();
            foreach ($getMatkul as $matkul) {
          ?>
            <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#collapsedNilai<?= $no ?>" role="button" aria-expanded="false" aria-controls="collapseExample" id="nilaiMataKuliah<?= $no ?>" >
              <span class="matkul-name"><?= $matkul['nama_matkul'] ?></span>
              <i class="ico ico-dark rotate180deg" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="collapsedNilai<?= $no ?>">
              <div class="card card-body gy-5">
                <div class="row">
                  <div class="col-lg-12">
                    <table class="table table-stripped table-responsive table-bordered" id="nilai-matkul" border="1">
                      <thead class="text-center">
                        <tr>
                          <?php
                          $getTugas = $DB->table('materi')->join('tugas', 'id_materi')->where('materi.kd_matkul', $matkul['kd_matkul'])->get();
                          ?>
                          <th colspan="<?= $getTugas->count() ?>">Tugas</th>
                          <th rowspan="2">Kuis</th>
                          <th rowspan="2">UTS</th>
                          <th rowspan="2">UAS</th>
                        </tr>
                        <tr>
                        <?php
                          foreach ($getTugas->fetch() as $tugas) {
                        ?>
                          <th><?= $tugas['pertemuan'] ?></th>
                        <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <?php
                          $getNilai = $DB->table('upload_tugas')->join('nilai', 'npm')->where('nilai.npm', $_SESSION['npm'])->where('upload_tugas.kd_matkul', $matkul['kd_matkul'])->where('nilai.kd_matkul', $matkul['kd_matkul'])->get();
                          $countNilai = $getNilai->count();
                          $fetchNilai = $getNilai->fetch();
                          if($countNilai > 0){
                            foreach ($fetchNilai as $nilai) {
                          ?>
                          <td><?= $nilai['nilai'] ?></td>
                          <?php
                            }
                          ?>
                          <td><?= $fetchNilai[0]['nquiz'] ?></td>
                          <td><?= $fetchNilai[0]['nuts'] ?></td>
                          <td><?= $fetchNilai[0]['nuas'] ?></td>
                          <?php
                          }
                          else {
                          ?>
                          <td>0</td>
                          <td>0</td>
                          <td>0</td>
                          <td>0</td>
                          <?php
                          }
                          ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row row-cols-auto">
                  <div class="col">
                    <button onclick="" class="btn btn-primary" id="export-excel">Cetak File Excel</button>
                    <button onclick="printData()" class="btn btn-outline-primary" id="export-pdf">Cetak File PDF</button>
                  </div>
                </div>
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
        console.log(event.target.id);
      }
    });
  });
</script>

<script>
  // $(document).ready(function () { 
    
  // });
  function printData() {
    var table = document.getElementById('nilai-matkul');
    newWin = window.open(",'height=500, width=500'");
    newWin.document.write(table.outerHTML);
    newWin.print();
    newWin.close();
  }
</script>

<script type="text/javascript">
  jQuery(document).ready(function () {
    $('#export-excel').on('click', function(e){
        e.preventDefault();
        ResultsToTable();
    });

    function ResultsToTable(){    
        $("#nilai-matkul").table2excel({
            name: "Results"
        });
    }
  })
</script>