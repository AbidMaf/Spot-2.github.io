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
            <h1 class="h1 predikat">A</h1>
            <span class="score">(89,5)</span>
            <p class="nilai-desc"><b>Sangat bagus</b>. Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae et nobis repellendus quis quae libero assumenda.</p>
          </div>
        </div>
        <div class="col-lg-8 order-lg-1">
          <div class="sum-nilai-matkul-card shadow-sm rounded">
            <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#collapsedNilai" role="button" aria-expanded="false" aria-controls="collapseExample" id="nilaiMataKuliah" >
              <span class="matkul-name">Pemrograman Web</span>
              <i class="ico ico-dark rotate180deg" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="collapsedNilai">
              <div class="card card-body gy-5">
                <div class="row">
                  <div class="col-lg-12">
                    <table class="table table-stripped table-responsive table-bordered" id="nilai-matkul" border="1">
                      <thead class="text-center">
                        <tr>
                          <th colspan="7">Tugas</th>
                          <th rowspan="2">UTS</th>
                          <th rowspan="2">UAS</th>
                        </tr>
                        <tr>
                          <th>1</th>
                          <th>2</th>
                          <th>3</th>
                          <th>4</th>
                          <th>5</th>
                          <th>6</th>
                          <th>7</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>90</td>
                          <td>90</td>
                          <td>90</td>
                          <td>90</td>
                          <td>90</td>
                          <td>90</td>
                          <td>90</td>
                          <td>90</td>
                          <td>90</td>
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
            
            <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#collapsedNilai1" role="button" aria-expanded="false" aria-controls="collapseExample" id="nilaiMataKuliah1" >
              <span class="matkul-name">Konstruksi Perangkat Lunak</span>
              <i class="ico ico-dark rotate180deg" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="collapsedNilai1">
              <div class="card card-body gy-5">
                <div class="row nilai nilai-total">
                  <div class="col-10">
                    <span>Total</span>
                  </div>
                  <div class="col-2 text-end text-nowrap">
                    <span>95</span>
                  </div>
                </div>
                <div class="row nilai">
                  <div class="col-10 ">
                    <span>Tugas</span>
                  </div>
                  <div class="col-2 text-end text-nowrap">
                    <span>90</span>
                  </div>
                </div>
                <div class="row nilai">
                  <div class="col-10">
                    <span>UTS</span>
                  </div>
                  <div class="col-2 text-end text-nowrap">
                    <span>85</span>
                  </div>
                </div>
                <div class="row nilai">
                  <div class="col-10">
                    <span>UAS</span>
                  </div>
                  <div class="col-2 text-end text-nowrap">
                    <span>93</span>
                  </div>
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
</script>

<script>
  $(document).ready(function () { 
    $(document).click(function(event) {
      if ($('#' + event.target.id).hasClass('nilai-collapse')) {
        $('#' + event.target.id + '>svg').toggleClass('down');
        console.log('asaaasas');
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