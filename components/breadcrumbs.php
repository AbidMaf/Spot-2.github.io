<?php 
$request = $_SERVER['REQUEST_URI'];
?>

<?php 
if ($request == '/dashboard' || $request == '/') { ?>
    <div class="row">
        <div class="col-6">
            <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <i class="icon ico-dark" data-feather="pie-chart"></i>
                <span class="breadcrumb-item-text">&nbsp;Dashboard</span>
              </li>
            </ol>
          </div>
        </div>

        <div class="col-6">
          <div class="date">
            <i class="ico ico-dark" data-feather="calendar"></i>
            <span class="date-text">&nbsp;<?= $helper->getTodayDate() ?></span>
          </div>
        </div>
    </div>

<?php } elseif ($request == '/MataKuliah') { ?>
    <div class="row">
        <div class="col-6">
            <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <i class="icon ico-dark" data-feather="list"></i>
                <span class="breadcrumb-item-text">&nbsp;Daftar Mata Kuliah</span>
              </li>
            </ol>
          </div>
        </div>

        <div class="col-6">
          <div class="date">
            <i class="ico ico-dark" data-feather="calendar"></i>
            <span class="date-text">&nbsp;<?= $helper->getTodayDate() ?></span>
          </div>
        </div>
    </div>
<?php } elseif ($request == '/Tugas') { ?>
    <div class="row">
        <div class="col-6">
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <i class="icon ico-dark" data-feather="check-circle"></i>
                <span class="breadcrumb-item-text">&nbsp;Tugas</span>
              </li>
            </ol>
          </div>
        </div>

        <div class="col-6">
          <div class="date">
            <i class="ico ico-dark" data-feather="calendar"></i>
            <span class="date-text">&nbsp;<?= $helper->getTodayDate() ?></span>
          </div>
        </div>
      </div>
<?php } elseif ($request == '/Nilai') {?>
    
<?php } ?>