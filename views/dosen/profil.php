<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>SPOT</title>
  <link href="../../css/dosen.css" rel="stylesheet" type="text/css" />
  <link href="../../css/dosen-nilai.css" rel="stylesheet" type="text/css" />
  <link href="../../css/profil.css" rel="stylesheet" type="text/css" />
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
                <i class="icon ico-dark" data-feather="user"></i>
                <span class="breadcrumb-item-text">&nbsp;Profil</span>
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
            
          <?php
              $sql = 'SELECT a.nid, a.name
              FROM dosen AS a
              INNER JOIN user AS b ON a.nid = b.username
              WHERE username = "1234567"';
              
              $query = mysqli_query($conn, $sql);

              if (!$query) {
                die ('SQL Error: ' . mysqli_error($conn));
              }

              echo '
              <table class="table table-striped table-bordered">
                <thead>
                  <th scope="col">NIM</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Aksi</th>
                </thead>
                <tbody>';
                while ($row = mysqli_fetch_array($query)) {
                  echo '<tr>
                        <td>'.$row['0'].'</td>
                        <td>'.$row['1'].'</td>
                        <td>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#editweb'.$row["0"].'"><i class="text-dark" data-feather="edit"></i></a>
                        </td>
                      </tr>
                      '; ?>
                  
                  <!-- Modal Edit Web -->
                  <div class="modal fade" id="editweb<?= $row[0] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Ubah Nilai Mahasiswa Pemrograman Web</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editweb" action="/editweb" method="POST">
                              <div class="mb-3 text-start">
                                <label for="nim" class="col-form-label">NIM:</label>
                                <input type="text" class="form-control" name="nim" value="<?= $row[0] ?>" readonly>
                              </div>
                              <div class="mb-3 text-start">
                                  <label for="ntugas" class="col-form-label">Nilai Tugas:</label>
                                  <input type="number" class="form-control" name="ntugas" value="<?= $row[2] ?>" readonly title="Nilai didapatkan secara otomatis dari hasil penilaian tugas mahasiswa">
                              </div>
                              <div class="mb-3 text-start">
                                  <label for="nquiz" class="col-form-label">Nilai Quiz:</label>
                                  <input type="number" class="form-control" name="nquiz" value="<?= $row[3] ?>">
                              </div>
                              <div class="mb-3 text-start">
                                  <label for="nuts" class="col-form-label">Nilai UTS:</label>
                                  <input type="number" class="form-control" name="nuts" value="<?= $row[4] ?>">
                              </div>
                              <div class="mb-3 text-start">
                                  <label for="nuas" class="col-form-label">Nilai UAS:</label>
                                  <input type="number" class="form-control" name="nuas" value="<?= $row[5] ?>">
                              </div>
                              <input type="submit" value="Update" id="change" class="btn btn-primary btn-lg mt-3"></input>
                            </form>
                        </div>
                        <div class="modal-footer">
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

  <script>
    getdata();
  </script>
</body>
</html>
<script>
  feather.replace()
</script>