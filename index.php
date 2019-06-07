<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <script src="js/jquery.min.js" crossorigin="anonymous"></script>
    <script src="js/jquery.ui.widget.js"></script>
    <script src="js/jquery.iframe-transport.js"></script>
    <script src="js/jquery.fileupload.js"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
    <style>
 
     
 
    #drop_file_zone {
        background-color: #EEE; 
        border: #999 5px dashed;
        width: 100%; 
        height: 100%;
        padding: 8px;
        font-size: 18px;
    }
    
    .fileinput-button {
    position: relative;
    overflow: hidden;
    display: inline-block;
    }
    
  .fileinput-button input {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    opacity: 0;
    -ms-filter: 'alpha(opacity=0)';
    font-size: 200px !important;
    direction: ltr;
    cursor: pointer;
    }

  /* Fixes for IE < 8 */
  @media screen\9 {
    .fileinput-button input {
      filter: alpha(opacity=0);
      font-size: 100%;
      height: 100%;
    }
}

    
    
    </style>
    <script>


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
                    document.getElementById('FileNamePostBack').submit();
                    
                    //alert(file.name);
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
                    //alert("Complete!");
                    $('#progress .progress-bar').css(
                    'width',
                    (0) + '%'
                );
        
                
                    
                    //alert(document.getElementById('files'));
                    //document.getElementById('files_').value = document.getElementById('files').textContent;
                }
            }
            
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
            
    });
    
    
    </script>
</head>
<body>
    
<form id="FileNamePostBack" action="index.php" method="post" >
    <input hidden="true" type="text" name="files_"  id="files_" class="files"/>
</form>
    
    
    <div id="drop_file_zone" class="container">
        
        <div >
            <div class="container">
                <div class="row">
                    <div  class="col-sm-9">
                        <h2>Free Form Log Reader</h2>
                        <p>A Log Reader For Everyone</p>
                    </div>
                    <div   class="col-sm-3">
                        <br>
                        <span  class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Drag File or Click Begin</span>            
                            <input id="fileupload" type="file" name="files[]" multiple>
                        </span>
                    </div>
                </div>
                <div style="height: 5px;" id="progress" class="progress">
                    <div style="height: 5px;" class="progress-bar progress-bar-success"></div>
                </div>
            </div>
        <div style="overflow:scroll; height:70%; width: 98%" >
            <?php 
                //var_dump($_POST);
                if(!empty($_POST['files_']))
                {
                    $file = new SplFileObject("./server/php/files/". $_POST['files_'] );
                    
                    echo "<h5><ul>";
                    while (!$file->eof()) 
                    {
                        $file->fgets();
                        echo "<li>";
                        echo $file;
                        echo "</li>"; 
                        continue;
                    }
                    echo "</ul></h5>";
                }
                
            ?>
        </div>
            
    </div>
</body>




</html>
