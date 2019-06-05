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
    <div id="drop_file_zone" class="container">
        
        <div >
            <h2>Free Form Log Reader</h2>
            <p>A Log Reader For Everyone</p> 
        </div>
        
        <div class="container">
            <div class="row">
              <div  class="col-sm-4">
                <h4>Upload Log File</h4>
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Drag File or Click</span>            
                    <input id="fileupload" type="file" name="files[]" multiple>
                </span>


                <!-- The global progress bar -->
                <div id="progress" class="progress">
                    <div class="progress-bar progress-bar-success"></div>
                </div>
                <!-- The container for the uploaded files -->
                <form>
                
                <input type="text" id="files_" class="files"/>
                </form>
                <br>
              </div>
              <div class="col-sm-4">
                <h3>Column 2</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>

            </div>
        </div>
            

            
    </div>
</body>




</html>
