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

    <div class="p-3">

      <div class="row">

        <div class="col-md-6">
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <i class="icon ico-dark" data-feather="pie-chart"></i>
                <span class="breadcrumb-item-text">&nbsp;Dashboard</span>
              </li>
            </ol>
          </div>
        </div>

        <div class="col-md-6 date">
          <i class="ico ico-dark" data-feather="calendar"></i>
          <span class="date-text">Rabu, 28 Maret 2022</span>
        </div>
        <div class="welcome">
          <div class="content rounded-3 p-3">
            <h1 class="fs-3">Welcome to Dashboard</h1>
            <p class="mb-0">Hello, welcome to your dashboard!</p>
          </div>
        </div>

        <section class="statistics mt-4">
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
              <div class="box flex-column rounded-2 p-3">
                <h3 class="mb-0">Jadwal Perkuliahan</h3>
                <div class="task-box red">
                  <div class="description-task">
                    <div class="time">Senin | 07:00 - 09:30 AM</div>
                    <div class="task-name">Jaringan Komputer</div>
                  </div>
                  <div class="more-button"></div>
                </div>
                <div class="task-box red">
                  <div class="description-task">
                    <div class="time">Senin | 09:30 - 11:00 AM</div>
                    <div class="task-name">Pemrograman Berbasis Objek</div>
                  </div>
                  <div class="more-button"></div>
                </div>
                <div class="task-box yellow">
                  <div class="description-task">
                    <div class="time">Selasa | 01:00 - 03:30 PM</div>
                    <div class="task-name">Sistem Operasi</div>
                  </div>
                  <div class="more-button"></div>
                </div>
                <div class="task-box yellow">
                  <div class="description-task">
                    <div class="time">Rabu | 07:00 - 09:30 AM</div>
                    <div class="task-name">Konstruksi Perangkat Lunak</div>
                  </div>
                  <div class="more-button"></div>
                </div>
                <div class="task-box yellow">
                  <div class="description-task">
                    <div class="time">Rabu | 01:00 - 03:30 PM</div>
                    <div class="task-name">Pemrograman Web</div>
                  </div>
                  <div class="more-button"></div>
                </div>
                <div class="task-box blue">
                  <div class="description-task">
                    <div class="time">Kamis | 8:40 - 11:00 AM</div>
                    <div class="task-name">Bisnis Teknologi Informasi</div>
                  </div>
                  <div class="more-button"></div>
                </div>
                <div class="task-box blue">
                  <div class="description-task">
                    <div class="time">Kamis | 01:00 - 03:30 PM</div>
                    <div class="task-name">Teknologi Basis Data</div>
                  </div>
                  <div class="more-button"></div>
                </div>
              </div>
            </div>
          </div>
      </div>
      </section>

    </div>

  </div>

  </div>
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
        labels: ["RL211", "RL209", "RL207", "RL212", 'RL210', 'RL213', 'RL208'],
        datasets: [{
          label: "Tugas",
          data: [45, 25, 40, 20, 10, 20, 100],
          backgroundColor: "#0D6EFD",
          borderColor: 'transparent',
          borderWidth: 2.5,
          barPercentage: 0.4,
        }, {
          label: "UTS",
          startAngle: 2,
          data: [20, 40, 20, 50, 25, 40, 25],
          backgroundColor: "#DC3545",
          borderColor: 'transparent',
          borderWidth: 2.5,
          barPercentage: 0.4,
        }, {
          label: "UAS",
          startAngle: 2,
          data: [20, 40, 20, 50, 25, 40, 25],
          backgroundColor: "#198754",
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