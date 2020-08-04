//Input 1

    $('#inputFile').change(function(e){
        var fileName = e.target.files[0].name;
        $('.file_label_1').html(fileName);
    });


//Input 1

    $('#inputFile2').change(function(e){
        var fileName = e.target.files[0].name;
        $('.file_label_2').html(fileName);
    });


//Input 1

    $('#inputFile3').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label3').html(fileName);
    });

//multiple File
    $('#multipleFile1').change(function(e){
        var length = e.target.files.length;
        $('.multipleFiles1').html(length + " Files selected");
    });
