function sortTugas() {
    $('.cat-tugas input').on('change', function() {
        // alert($('input[name=option-show]:checked').val());
        var $inputValue = $('input[name=option-show]:checked').val();
        if($inputValue == 'Semua Tugas') {
            $('.TugasLate').show();
            $('.TugasNF').show();
            $('.TugasDone').show();
        }
        else if($inputValue == 'Belum Selesai') {
            $('.TugasLate').show();
            $('.TugasNF').show();
            $('.TugasDone').hide();
        }
        else if($inputValue == 'Terlambat') {
            $('.TugasLate').show();
            $('.TugasNF').hide();
            $('.TugasDone').hide();
        }
        else if($inputValue == 'Selesai') {
            $('.TugasLate').hide();
            $('.TugasNF').hide();
            $('.TugasDone').show();
        }
    });
}