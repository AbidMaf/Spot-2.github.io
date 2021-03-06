<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <title>SPOT - Daftar Mata Kuliah</title>
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
                <i class="icon ico-dark" data-feather="list"></i>
                <span class="breadcrumb-item-text">&nbsp;Daftar Mata Kuliah</span>
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
          <?php
              $getMatkul = $DB->query("SELECT * FROM matakuliah WHERE nid = '". $_SESSION['nid'] . "' OR nid2 = '" . $_SESSION['nid'] . "'")->fetch();
              foreach ($getMatkul as $p) {
            ?>
            <!-- List Matkul -->
          <div class="matkul-card shadow-sm rounded">
            <a class="btn btn-light nilai-collapse shadow-sm" data-bs-toggle="collapse" href="#detailmatkul<?= $p['kd_matkul'] ?>" role="button" aria-expanded="false" aria-controls="collapseExample" id="nilaiMataKuliah" >
              <div class="matkul-info">
                <div class="matkul-header">
                  <div class="matkul-kode">
                    <?= $p['kd_matkul'] ?>
                  </div>
                  <div class="matkul-title">
                    <?= $p['nama_matkul'] ?>
                  </div>
                  </div>
                </div>
                <div class="matkul-sks-dosen mb-2">
                  <?= $p['sks'] ?> SKS
                </div>
                <div class="matkul-dosen">
                  <i class="ico ico-dark" data-feather="book"></i>
                  &nbsp;Rekayasa Perangkat Lunak
                </div>
                <div class="matkul-description">
                  <p><?= $p['description'] ?></p>
                </div>
              </div>
            </a>

            <!-- Detail Matkul -->
            <div class="collapse" id="detailmatkul<?= $p['kd_matkul'] ?>">
              <div class="card card-body card">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addpertemuan<?= $p['kd_matkul'] ?>" style="width: fit-content">
                  <i class="icon" data-feather="plus"></i>
                  Tambah Pertemuan
              </button> <br>

                <!-- Modal Tambah Pertemuan -->
                <div class="modal fade" id="addpertemuan<?= $p['kd_matkul'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pertemuan <?= $p['nama_matkul'] ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="/addPertemuan/<?= $p['kd_matkul'] ?>" method="POST">
                          <div class="mb-3 text-start">
                            <?php
                              $getLastPertemuan = $DB->columns(['pertemuan'])->table('materi')->where('kd_matkul', $p['kd_matkul'])->order('pertemuan', 'desc')->limit(1)->get()->fetch();
                            ?>
                            <label for="pert" class="col-form-label">
                              Pertemuan: 
                            </label>
                            <input type="number" name="pertemuan" class="form-control" id="pert" value="<?= (int)$getLastPertemuan[0]['pertemuan'] + 1 ?>">
                          </div>
                          <div class="mb-3 text-start">
                            <label for="judul" class="col-form-label">
                              Highlight:
                              <a href="#" role="button" data-bs-toggle="popover" title="Cara Membuat Poin Highlight" class="popover-test" data-bs-content="Poin highlight dipisah menggunakan karakter '|'" >
                                <i class="icon" data-feather="info"></i>
                              </a>
                            </label>
                            <input type="text" class="form-control mb-2" id="highlight-inp" name="highlight" title="Pisah point highlight menggunakan karakter '|'">
                          </div>
                          <div class="mb-3 text-start">
                            <label for="judul" class="col-form-label">Judul:</label>
                            <input type="text" class="form-control mb-2" name="judul">
                          </div>
                          <div class="mb-3 text-start">
                            <label for="materi" class="col-form-label">Materi:</label>
                            <textarea class="form-control mb-2" name="materi"></textarea>
                          </div>
                          <div class="modal-footer">
                            <input type="submit" value="Simpan" id="change" class="btn btn-primary btn-lg mt-3"></input>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              
                <!-- table pertemuan -->
                <table class="table table-responsive table-striped table-bordered">
                  <thead>
                    <th scope="col">Pert</th>
                    <th scope="col">Materi</th>
                    <th scope="col">Tugas</th>
                    <th scope="col" colspan="3" class="aksi">Aksi</th>
                  </thead>
                  <tbody>
                    <?php
                      $getPertemuan = $DB->table('materi')->where('kd_matkul', $p['kd_matkul'])->order('pertemuan', 'asc')->get()->fetch();
                      foreach ($getPertemuan as $materi) {
                    ?>
                    <tr>
                      <th><?= $materi['pertemuan'] ?></th>
                      <td>
                        <?= $materi['deskripsi'] ?>
                      </td>
                      <?php
                        $getTugas = $DB->table('tugas')->where('id_materi', $materi['id_materi'])->get();
                        // $countTugas = $getTugas->count();
                        if($getTugas->count() < 1) {
                          $fetchTugas = $getTugas->fetch();
                      ?>
                        <td>
                          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addtugas<?= $materi['id_materi'] ?>">Buat Tugas</button>
                        </td>
                        <!-- Modal Add Tugas -->
                        <div class="modal fade" id="addtugas<?= $materi['id_materi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Tugas Pertemuan<?= $materi['pertemuan'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="/addTugas/<?= $materi['id_materi'] ?>" method="POST">
                                <div class="modal-body">
                                  
                                    <div class="mb-3 text-start">
                                      <label for="pert" class="col-form-label">Judul: </label>
                                      <input type="text" name="judul" class="form-control" id="pert">
                                    </div>
                                    <div class="mb-3 text-start">
                                      <label for="materi" class="col-form-label">Deskripsi:</label>
                                      <input type="text" class="form-control mb-2" id="materi" name="deskripsi">
                                    </div>
                                    <div class="mb-3 text-start">
                                        <label for="tugas" class="col-form-label">Deadline</label>
                                        <input type="datetime-local" name="deadline" class="form-control mb-2" id="tugas-text">
                                    </div>
                                    
                                  
                                </div>
                                <div class="modal-footer">
                                <input type="submit" value="Simpan" id="change" class="btn btn-primary btn-lg mt-3"></input>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      <?php
                        } else {
                          $fetchTugas = $getTugas->fetch();
                      ?>
                        <td>
                          <?= $fetchTugas[0]['judul'] ?><br>
                          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edittugas<?= $fetchTugas[0]['id_tugas'] ?>">Edit Tugas</button>
                        </td>
                        <!-- Modal Edit Tugas -->
                        <div class="modal fade" id="edittugas<?= $fetchTugas[0]['id_tugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Tugas Pertemuan<?= $materi['pertemuan'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="/editTugas/<?= $materi['id_materi'] ?>" method="POST">
                                <div class="modal-body">
                                  <div class="mb-3 text-start">
                                    <label for="pert" class="col-form-label">Judul: </label>
                                    <input type="text" name="judul" class="form-control" id="pert" value="<?= $fetchTugas[0]['judul'] ?>">
                                  </div>
                                  <div class="mb-3 text-start">
                                    <label for="materi" class="col-form-label">Deskripsi:</label>
                                    <input type="text" class="form-control mb-2" id="materi" name="deskripsi" value="<?= $fetchTugas[0]['deskripsi'] ?>">
                                  </div>
                                  <div class="mb-3 text-start">
                                      <label for="tugas" class="col-form-label">Deadline</label>
                                      <input type="datetime-local" name="deadline" class="form-control mb-2" id="tugas-text" value="<?= date('Y-m-d\TH:i', strtotime($fetchTugas[0]['deadline'])) ?>">
                                  </div>
                                  
                                </div>
                                <div class="modal-footer">
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#deletetugas<?= $materi['id_materi'] ?>" class="btn btn-secondary">Hapus Tugas</a>
                                  <input type="submit" value="Simpan" id="change" class="btn btn-primary btn-lg mt-3"></input>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      <?php
                        }
                      ?>
                      
                      <td class="aksi">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editpertemuan<?= $materi['id_materi'] ?>"><i class="text-dark" data-feather="edit"></i></a>
                      </td>

                      <!-- Modal Edit Pertemuan -->
                      <div class="modal fade" id="editpertemuan<?= $materi['id_materi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tambah Pertemuan <?= $p['nama_matkul'] ?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/editPertemuan/<?= $materi['id_materi'] ?>" method="POST">
                              <div class="modal-body">
                                <div class="mb-3 text-start">
                                  <label for="pert" class="col-form-label">
                                    Pertemuan: 
                                  </label>
                                  <input type="number" name="pertemuan" class="form-control" id="pert" value="<?= $materi['pertemuan'] ?>" readonly>
                                </div>
                                <div class="mb-3 text-start">
                                  <label for="judul" class="col-form-label">
                                    Highlight:
                                    <a href="#" role="button" data-bs-toggle="popover" title="Cara Membuat Poin Highlight" class="popover-test" data-bs-content="Poin highlight dipisah menggunakan karakter '|'" >
                                      <i class="icon" data-feather="info"></i>
                                    </a>
                                  </label>
                                  <input type="text" class="form-control mb-2" id="highlight-inp" name="highlight" title="Pisah point highlight menggunakan karakter '|'" value="<?= $materi['highlight'] ?>">
                                </div>
                                <div class="mb-3 text-start">
                                  <label for="judul" class="col-form-label">Judul:</label>
                                  <input type="text" class="form-control mb-2" name="judul" value="<?= $materi['judul'] ?>">
                                </div>
                                <div class="mb-3 text-start">
                                  <label for="materi" class="col-form-label">Materi:</label>
                                  <textarea class="form-control mb-2" name="materi"><?= $materi['deskripsi'] ?></textarea>
                                </div>
                                <div class="modal-footer">
                                  <input type="submit" value="Ubah" id="change" class="btn btn-primary btn-lg mt-3"></input>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      
                      <!-- Modal Delete Tugas -->
                      <div class="modal" tabindex="-1" id="deletetugas<?= $materi['id_materi'] ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>Apakah anda yakin akan <b>menghapus tugas Pertemuan <?= $materi['pertemuan'] ?></b></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <a href="/deletetugas/<?= $materi['id_materi'] ?>" class="btn btn-primary"> 
                                <i class="icon ico-dark" data-feather="trash"></i>
                                Hapus
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <td class="aksi">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#deletepertemuan<?= $materi['id_materi'] ?>"><i class="text-dark" data-feather="trash-2"></i></a>
                      </td>

                      <!-- Modal Delete materi -->
                      <div class="modal" tabindex="-1" id="deletepertemuan<?= $materi['id_materi'] ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>Apakah anda yakin akan menghapus data Pertemuan <?= $materi['pertemuan'] ?></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <a href="/deletepertemuan/<?= $materi['id_materi'] ?>" class="btn btn-primary"> 
                                <i class="icon ico-dark" data-feather="trash"></i>
                                Hapus
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>

                    </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <?php
              }
            ?>

            
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
<script>
    $(function() {
      $(document).tooltip({
        items: "#higlight-inp",
        content: function() {
          return $(this).attr('title');
        }
      });
    })
  </script>
  <script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl)
    })
  </script>