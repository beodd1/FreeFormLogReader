/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function handleChange(checkbox, _element) {
    if(checkbox.checked == true){
        
        alert("Checked: " + document.getElementById(_element));
        document.getElementById(_element).disabled = false;
    }else{
        
        alert("UnChecked");
        document.getElementById(_element).disabled = true;
   }
}

    $(function () {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = window.location.hostname === 'blueimp.github.io' ?
                    '' : 'server/php/';

                    

        $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                    $('<p/>').text(file.name).appendTo('#files');
                    document.getElementById('files_').value = file.name;
                    document.getElementById('reset_').value = Date.now();
                    
                    document.getElementById('FileNamePostBack').submit();
                });
                
            },
            progressall: function (e, data) {
            
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    (progress+10) + '%'
                );
                if (progress==100)
                {
                    $('#progress .progress-bar').css(
                    'width',
                    (0) + '%'
                );
        
                
                    
                }
            }
            
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
            
    });
    
    