<?php

$DB->delete('upload_tugas', $kdUpTugas);
// header('location:javascript://history.go(-1)');
header('Location: ' . $_SERVER["HTTP_REFERER"] );
exit;