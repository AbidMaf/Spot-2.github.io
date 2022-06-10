<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>SPOT</title>
  <link href="../../css/dosen-nilai.css" rel="stylesheet" type="text/css" />
  <link href="../../css/component/navbar.css" rel="stylesheet" type="text/css" />
  <script src="../../script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>

<body>
  <nav class="shadow-sm">
    
  </nav>
  <!-- Sidebar -->
  <div class="sidebar shadow-sm">
    <div class="brand">
      <img class="logo" src="../../assets/image/Logo_Almamater_UPI.svg" width="45">
      <span class="brand-name">SPOT</span>
      <span class="brand-version">2.0</span>
    </div>
    <hr style="margin: 0;">
    <div class="login-info">
      <img class="avatar" src="../../assets/image/profile.jpg" alt="profile" width="72">
      <span class="name">Nama Dosen</span>
      <span class="nim">NIP</span>
    </div>
    <a class="menu-nilai" href="dosen.php">
      <i class="icon" data-feather="list"></i>
      <span class="menu-name">&nbsp;Daftar Mata Kuliah</span>
    </a>
    <a class="active" href="#">
      <i class="icon" data-feather="star">2</i>
      <span class="menu-name">&nbsp;Nilai Mahasiswa</span>
    </a>
    <a class="menu-settings logout" href="index.html">
      <i class="icon" data-feather="log-out">2</i>
      <span class="menu-name">&nbsp;Logout</span>
    </a>
  </div>
  
  <!-- Main Content -->
  <div class="main-content">
    <div class="p-3">
      <div class="row">
        <div class="col-md-6">
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <i class="icon ico-dark" data-feather="star"></i>
                <span class="breadcrumb-item-text">&nbsp;Nilai Mahasiswa</span>
              </li>
            </ol>
          </div>
        </div>
      </div>

      <div class="row g-3">
        <div class="col order-lg-1">
          <div class="sum-nilai-matkul-card shadow-sm rounded">
            <!-- Progweb -->
            <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#content" role="button" aria-expanded="false" aria-controls="collapseExample" id="nilaiMataKuliah" >
              <span class="matkul-name">Pemrograman Web</span>
              <i class="ico ico-dark rotate180deg" data-feather="chevron-down"></i>
            </a>
            <!-- Dropdown Progweb -->
            <div class="collapse" id="content">
              <button class="btn btn-primary col-lg-1 col-md-3 col-sm-4 mb-2" data-bs-toggle="modal" data-bs-target="#modweb" onclick="">Tambah</button> <br>
              <button class="btn btn-primary col-lg-1 col-md-3 col-sm-4 mb-2" onclick="printpdf();">Print</button> <br>
              <!-- Table Progweb -->
              <?php
              $sql = 'SELECT a.npm, b.name, a.ntugas, a.nquiz, a.nuts, a.nuas 
              FROM nilai AS a
              INNER JOIN mahasiswa AS b ON a.npm = b.npm
              WHERE kd_matkul = "RL209"';
              
              $query = mysqli_query($conn, $sql);

              if (!$query) {
                die ('SQL Error: ' . mysqli_error($conn));
              }

              echo '
              <table class="table table-striped table-bordered">
                <thead>
                  <th scope="col">NIM</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Nilai Tugas</th>
                  <th scope="col">Nilai Quiz</th>
                  <th scope="col">Nilai UTS</th>
                  <th scope="col">Nilai UAS</th>
                  <th scope="col" colspan="2">Aksi</th>
                </thead>
                <tbody>';
                while ($row = mysqli_fetch_array($query)) {
                  echo '<tr>
                        <td>'.$row['0'].'</td>
                        <td>'.$row['1'].'</td>
                        <td>'.$row['2'].'</td>
                        <td>'.$row['3'].'</td>
                        <td>'.$row['4'].'</td>
                        <td>'.$row['5'].'</td>
                        <td>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#editweb'.$row["0"].'"><i class="text-dark" data-feather="edit"></i></a>
                        </td>
                        <td>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#delweb'.$row["0"].'"><i class="text-dark" data-feather="trash"></i></a>
                        </td>
                      </tr>'; ?>
                  
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
                                  <input type="number" class="form-control" name="ntugas" value="<?= $row[2] ?>" readonly>
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

                  <!-- Modal Delete Web -->
                  <div class="modal" tabindex="-1" id="delweb<?= $row[0] ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Apakah anda yakin akan menghapus data dengan NIM: <?= $row["0"] ?></p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <a href="/deleteweb/<?= $row["0"] ?>" class="btn btn-primary"> 
                            <i class="icon ico-dark" data-feather="trash"></i>
                            Hapus
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>
                </tbody>
              </table>
            </div>
              
              
              <!-- Modal Progweb -->
              <div class="modal fade" id="modweb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai Mahasiswa Pemrograman Web</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form id="hitungweb" action="/insertweb" method="POST">
                        <div class="mb-3 text-start">
                          <label for="nim" class="col-form-label">NIM:</label>
                          <input type="text" class="form-control" name="nim">
                        </div>
                        <div class="mb-3 text-start">
                            <label for="ntugas" class="col-form-label">Nilai Tugas:</label>
                            <input type="number" class="form-control" name="ntugas" readonly>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="nquiz" class="col-form-label">Nilai Quiz:</label>
                            <input type="number" class="form-control" name="nquiz">
                        </div>
                        <div class="mb-3 text-start">
                            <label for="nuts" class="col-form-label">Nilai UTS:</label>
                            <input type="number" class="form-control" name="nuts">
                        </div>
                        <div class="mb-3 text-start">
                            <label for="nuas" class="col-form-label">Nilai UAS:</label>
                            <input type="number" class="form-control" name="nuas">
                        </div>
                        <input type="submit" value="Simpan" id="change" class="btn btn-primary btn-lg mt-3"></input>
                      </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
              </div>
            </div>
            
            <!-- BTI -->
            <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#nilbti" role="button" aria-expanded="false" aria-controls="collapseExample" id="nilaiMataKuliah1" >
              <span class="matkul-name">Bisnis Teknologi Informasi</span>
              <i class="ico ico-dark rotate180deg" data-feather="chevron-down"></i>
            </a>
            <!-- Dropdown BTI -->
            <div class="collapse" id="nilbti">
              <button class="btn btn-primary col-lg-1 col-md-3 col-sm-4 mb-2" onclick="" data-bs-toggle="modal" data-bs-target="#modbti">Tambah</button> <br>
              <button class="btn btn-primary col-lg-1 col-md-3 col-sm-4 mb-2" onclick="printpdf();">Print</button> <br>
              <!-- Tabel BTI -->
              <?php
              $sql = 'SELECT a.npm, b.name, a.ntugas, a.nquiz, a.nuts, a.nuas 
              FROM nilai AS a
              INNER JOIN mahasiswa AS b ON a.npm = b.npm
              WHERE kd_matkul = "PT502"';
              
              $query = mysqli_query($conn, $sql);

              if (!$query) {
                die ('SQL Error: ' . mysqli_error($conn));
              }

              echo '
              <table class="table table-striped table-bordered">
                <thead>
                  <th scope="col">NIM</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Nilai Tugas</th>
                  <th scope="col">Nilai Quiz</th>
                  <th scope="col">Nilai UTS</th>
                  <th scope="col">Nilai UAS</th>
                  <th scope="col" colspan="2">Aksi</th>
                </thead>
                <tbody>';
                while ($row = mysqli_fetch_array($query)) {
                  echo '<tr>
                        <td>'.$row['0'].'</td>
                        <td>'.$row['1'].'</td>
                        <td>'.$row['2'].'</td>
                        <td>'.$row['3'].'</td>
                        <td>'.$row['4'].'</td>
                        <td>'.$row['5'].'</td>
                        <td>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#editbti'.$row["0"].'"><i class="text-dark" data-feather="edit"></i></a>
                        </td>
                        <td>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#delbti'.$row["0"].'"><i class="text-dark" data-feather="trash"></i></a>
                        </td>
                      </tr>'; ?>
                  
                  <!-- Modal Edit BTI -->
                  <div class="modal fade" id="editbti<?= $row[0] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Ubah Nilai Mahasiswa Bisnis Teknologi Informasi</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editbti" action="/editbti" method="POST">
                              <div class="mb-3 text-start">
                                <label for="nim" class="col-form-label">NIM:</label>
                                <input type="text" class="form-control" name="nim" value="<?= $row[0] ?>" readonly>
                              </div>
                              <div class="mb-3 text-start">
                                  <label for="ntugas" class="col-form-label">Nilai Tugas:</label>
                                  <input type="number" class="form-control" name="ntugas" value="<?= $row[2] ?>" readonly>
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
                              <input type="submit" value="Simpan" id="change" class="btn btn-primary btn-lg mt-3"></input>
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal Delete BTI -->
                  <div class="modal" tabindex="-1" id="delbti<?= $row[0] ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Apakah anda yakin akan menghapus data dengan NIM: <?= $row["0"] ?></p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <a href="/deletebti/<?= $row["0"] ?>" class="btn btn-primary"> 
                            <i class="icon ico-dark" data-feather="trash"></i>
                            Hapus
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>
                </tbody>
              </table>
            </div>

            <!-- Modal BTI -->
            <div class="modal fade" id="modbti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai Mahasiswa Pemrograman Web</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form id="hitungweb" action="/insertbti" method="POST">
                        <div class="mb-3 text-start">
                          <label for="nim" class="col-form-label">NIM:</label>
                          <input type="text" class="form-control" name="nim">
                        </div>
                        <div class="mb-3 text-start">
                            <label for="ntugas" class="col-form-label">Nilai Tugas:</label>
                            <input type="number" class="form-control" name="ntugas" readonly>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="nquiz" class="col-form-label">Nilai Quiz:</label>
                            <input type="number" class="form-control" name="nquiz">
                        </div>
                        <div class="mb-3 text-start">
                            <label for="nuts" class="col-form-label">Nilai UTS:</label>
                            <input type="number" class="form-control" name="nuts">
                        </div>
                        <div class="mb-3 text-start">
                            <label for="nuas" class="col-form-label">Nilai UAS:</label>
                            <input type="number" class="form-control" name="nuas">
                        </div>
                        <input type="submit" value="Simpan" id="change" class="btn btn-primary btn-lg mt-3"></input>
                      </form>
                    </div>
                    <div class="modal-footer">
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