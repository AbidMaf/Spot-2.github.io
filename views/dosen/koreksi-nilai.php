<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>SPOT - Koreksi SO</title>
  <link href="../../css/koreksi.css" rel="stylesheet" type="text/css" />
  <link href="../../css/component/navbar.css" rel="stylesheet" type="text/css" />
  <script src="../../script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
</head>

<body>


  <?php include('components/sidebar.php'); ?>
  <!-- Main Content -->
  <div class="main-content">
  <?php
    if (isset($_SESSION["success"])) {
        unset($_SESSION["success"]);
  ?>
  <div class="alert alert-success alert-dismissable fade show" role="alert" style="width: max-content; position: fixed; z-index: 999; left: 50%; right: 50%; display: inline-block !important">
      <div class="text" style="display: inline !important">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
          Data berhasil diubah
      </div>
      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" style="display: inline !important"></button>
  </div>
  <?php
      }
  ?>
    <div class="p-3">
      <div class="row">
        <div class="col-md-6">
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <i class="icon ico-dark" data-feather="edit-3"></i>
                <span class="breadcrumb-item-text">&nbsp;Koreksi Tugas</span>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                <i class="icon ico-dark" data-feather="check-circle"></i>
                <span class="breadcrumb-item-text">&nbsp;Tugas Sistem Operasi</span>
              </li>
            </ol>
          </div>
        </div>
      </div>

      <div class="row g-3">
        <div class="col order-lg-1">
          <div class="sum-nilai-matkul-card shadow-sm rounded">
            <?php
            $sql = 'SELECT a.npm, a.`name`, b.judul, c.id_up_tugas, c.last_updated, c.file, c.nilai
            FROM tugas AS b
            INNER JOIN upload_tugas AS c ON b.id_tugas = c.id_tugas
            INNER JOIN mahasiswa AS a ON a.npm = c.npm
            WHERE c.kd_matkul = "'. $kd_matkul .'"';

            $query = mysqli_query($conn, $sql);

            $getNilai = $DB->query('SELECT c.id_tugas, d.pertemuan, a.npm, a.`name`, b.judul, c.id_up_tugas, c.last_updated, c.file, c.nilai
            FROM tugas AS b
            INNER JOIN upload_tugas AS c ON b.id_tugas = c.id_tugas
            INNER JOIN mahasiswa AS a ON a.npm = c.npm
            INNER JOIN materi AS d ON d.id_materi = b.id_materi
            WHERE c.kd_matkul = "'. $kd_matkul .'" AND  
            d.pertemuan = "' . $pertemuan .'"' );

            ?>
            <table class="table table-striped table-bordered">
              <thead>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Judul</th>
                <th scope="col">Waktu Pengumpulan</th>
                <th scope="col">File Tugas</th>
                <th scope="col">Nilai Tugas</th>
                <th scope="col">Aksi</th>
              </thead>
              <tbody>
              <?php
                foreach($getNilai->fetch() as $row) {
                  // var_dump($row);
              ?>
                <tr>
                  <td><?=$row['npm'] ?></td>
                  <td><?= $row['name'] ?></td>
                  <td><?= $row['judul'] ?></td>
                  <td><?= $row['last_updated'] ?></td>
                  <td>
                    <a href="<?= $_SERVER['DOCUMENT_ROOT'] . "/assets/tugas/" . urldecode($row['file']) ?>"><?= urldecode($row['file']) ?></a>
                  </td>
                  <td><?= $row['nilai'] ?></td>
                  <td align="center">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#editso<?= $row['id_up_tugas'] ?>"><i class="text-dark" data-feather="edit"></i></a>
                  </td>
                </tr>

                <!-- Modal Edit SO -->
                <div class="modal fade" id="editso<?= $row['id_up_tugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nilai Tugas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form id="editso" action="/koreksiTugas/<?= $row['id_up_tugas'] ?>" method="POST">
                          <div class="mb-3 text-start">
                            <label for="nim" class="col-form-label">NIM:</label>
                            <input type="text" class="form-control" name="nim" value="<?= $row['npm'] ?>" readonly>
                          </div>
                          <div class="mb-3 text-start">
                            <label for="nilai" class="col-form-label">Nilai Tugas:</label>
                            <input type="number" class="form-control" name="nilai" value="<?= $row['nilai'] ?>">
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
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    getdata();
    $(function() {
      $(document).tooltip({
        position: {
          my: "center bottom-20",
          at: "center top",
          using: function(position, feedback) {
            $(this).css(position);
            $("<div>")
              .addClass("arrow")
              .addClass(feedback.vertical)
              .addClass(feedback.horizontal)
              .appendTo(this);
          }
        }
      });
    });
  </script>
</body>

</html>
<script>
  feather.replace()
</script>