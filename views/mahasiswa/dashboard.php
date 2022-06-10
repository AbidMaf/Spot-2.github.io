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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
  <title>SPOT</title>
  <link href="css/dashboard.css" rel="stylesheet" type="text/css" />
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
      <div class="row">
        <section class="statistics mt-1">
          <div class="row">
            <div class="col-lg-4">
              <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
                <i class="uil-book-open fs-2 text-center text-white bg-primary rounded-circle"></i>
                <div class="ms-3">
                  <div class="d-flex align-items-center">
                    <h3 class="mb-0">420</h3> <span class="d-block ms-2">SKS</span>
                  </div>
                  <p class="fs-normal mb-0">Jumlah perolehan SKS</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
                <i class="uil-medal fs-2 text-center text-white bg-danger rounded-circle"></i>
                <div class="ms-3">
                  <div class="d-flex align-items-center">
                    <h3 class="mb-0">3,69</h3> <span class="d-block ms-2">IPK</span>
                  </div>
                  <p class="fs-normal mb-0">Perolehan IPK saat ini</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="box d-flex rounded-2 align-items-center p-3">
                <i class="uil-hourglass fs-2 text-center text-white bg-success rounded-circle"></i>
                <div class="ms-3">
                  <div class="d-flex align-items-center">
                    <h3 class="mb-0">4 Semester</h3> <span class="d-block ms-2">LAMA STUDI</span>
                  </div>
                  <p class="fs-normal mb-0">Total semester</p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="statistics mt-4">
          <div class="row">
            <div class="col-lg-8 col-md-12">
              <div class="chart-container rounded-2 p-3">
                <h3 class="fs-6 mb-3">Nilai</h3>
                <canvas id="myChart"></canvas>
              </div>
            </div>
            <div class="col-lg-4 col-md-12">
              <div class="flex-column rounded-2 p-3">
                <h5 class="mb-0">Jadwal Hari ini</h5>

                <?php
                  $today = $helper->convertDay(date('w'));
                  $getJadwal = $DB->table('matakuliah')->where('hari', $today)->get();
                  if ($getJadwal->count() > 0) {
                    $jadwal = $getJadwal->fetch();
                    foreach ($jadwal as $p) {
                    ?>
                    <div class="task-box shadow-sm rounded">
                      <div class="description-task">
                        <div class="task-name"><?= $p['nama_matkul'] ?></div>
                        <div class="time"><?= $p['sks'] ?> SKS | <?= date('H:i', strtotime($p['waktu'])) ?> -  <?= $helper->countSKSEndTime($p['sks'], $p['waktu']) ?></div>
                      </div>
                      <div class="more-button"></div>
                    </div>
                    <?php
                    }
                  } else {
                ?>
                  <div class="task-box shadow-sm rounded">
                    <div class="description-task">
                      <div class="task-name">Tidak ada jadwal hari ini</div>
                    </div>
                    <div class="more-button"></div>
                  </div>
                <?php } ?>
                
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>

  </div>

  </div>

  <?php
    $kd_matkul = [];
    $ntugas = array();
    $nquiz = array();
    $nuts = array();
    $nuas = array();
    $DB->reset();
    $nilai = $DB->table('nilai')->where('npm', $_SESSION['npm'])->get()->fetch();
    foreach ($nilai as $n) {
      array_push($kd_matkul, $n['kd_matkul']);
      array_push($ntugas, $n['ntugas']);
      array_push($nquiz, $n['nquiz']);
      array_push($nuts, $n['nuts']);
      array_push($nuas, $n['nuas']);
    }
  ?>

  <script>
    // Global defaults
    Chart.defaults.global.animation.duration = 2000; // Animation duration
    Chart.defaults.global.title.display = false; // Remove title
    Chart.defaults.global.defaultFontColor = '#71748c'; // Font color
    Chart.defaults.global.defaultFontSize = 13; // Font size for every label

    // Tooltip global resets
    Chart.defaults.global.tooltips.backgroundColor = '#111827'
    Chart.defaults.global.tooltips.borderColor = 'blue'

    // Gridlines global resets
    Chart.defaults.scale.gridLines.zeroLineColor = '#3b3d56'
    Chart.defaults.scale.gridLines.color = '#3b3d56'
    Chart.defaults.scale.gridLines.drawBorder = false

    // Legend global resets
    Chart.defaults.global.legend.labels.padding = 0;
    Chart.defaults.global.legend.display = false;

    // Ticks global resets
    Chart.defaults.scale.ticks.fontSize = 12
    Chart.defaults.scale.ticks.fontColor = '#71748c'
    Chart.defaults.scale.ticks.beginAtZero = false
    Chart.defaults.scale.ticks.padding = 10

    // Elements globals
    Chart.defaults.global.elements.point.radius = 0

    // Responsivess
    Chart.defaults.global.responsive = true
    Chart.defaults.global.maintainAspectRatio = false

    

    var myChart = new Chart(document.getElementById('myChart'), {
      type: 'bar',
      data: {
        labels: 
          <?=
            json_encode($kd_matkul);
          ?>
        ,
        datasets: [{
          label: "Tugas",
          data: 
            <?=
              json_encode($ntugas);
            ?>
          ,
          backgroundColor: "#b6c8e3",
          hoverBackgroundColor: "#0D6EFD",
          borderColor: 'transparent',
          borderWidth: 2.5,
          barPercentage: 0.4,
        }, {
          label: "UTS",
          startAngle: 2,
          data: 
            <?=
              json_encode($nuts);
            ?>
          ,
          backgroundColor: "#e3bcc0",
          hoverBackgroundColor: "#DC3545",
          borderColor: 'transparent',
          borderWidth: 2.5,
          barPercentage: 0.4,
        }, {
          label: "UAS",
          startAngle: 2,
          data: 
            <?=
              json_encode($nuas);
            ?>
          ,
          backgroundColor: "#b6d6c7",
          hoverBackgroundColor: "#198754",
          borderColor: 'transparent',
          borderWidth: 2.5,
          barPercentage: 0.4,
        }]
      },
      options: {
        scales: {
          yAxes: [{
            gridLines: {
              color: '#dbdbdb',
            },
            ticks: {
              stepSize: 20,
            },
          }],
          xAxes: [{
            gridLines: {
              display: false,
            }
          }]
        }
      }
    })

    getdata();
  </script>
</body>

</html>
<script>
  feather.replace()
</script>