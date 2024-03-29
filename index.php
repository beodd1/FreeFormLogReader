<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <script src="js/jquery.min.js" crossorigin="anonymous"></script>
    <script src="js/jquery.ui.widget.js"></script>
    <script src="js/jquery.iframe-transport.js"></script>
    <script src="js/jquery.fileupload.js"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>

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
                    //document.getElementById('search_').value = '';
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
    
    
    
    
    
    
    
    
    
    
<style>


.bottomnavbar {
  overflow: hidden;
  background-color: #333;
  position: fixed;
  bottom: 0;
  width: 100%;
}


.bottomnavbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

     
        
        
/* The navigation bar */
.topnavbar {
  overflow: hidden;
  background-color: #333;
  position: fixed; /* Set the navbar to fixed position */
  top: 0; /* Position the navbar at the top of the page */
  width: 100%; /* Full width */
}
        
     
        
/* Links inside the navbar */
.topnavbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 20px;
}

/* Change background on mouse-over */


/* Main content */
.main {
  margin-top: 30px; /* Add a top margin to avoid content overlay */
}
 
    #drop_file_zone {
        background-color: #EEE; 
        border: #999 5px dashed;
        width: 100%; 
        height: 100%;
        padding: 8px;
        font-size: 20px;
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



.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid #555555;
  /* border-right: none; */
  padding: 4px;
  height: 30px;
  border-radius: 10px 0 0 10px;
  outline: none;
  color: #515151;
}

.searchTerm:focus{
  color: #515151;
}

.searchButton {
  width: 50px;
  height: 28px;
  border: 1px solid #515151;
  background: #515151;
  text-align: center;
  color: #515151;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 40%;
  position: absolute;
  top: 28px;
  left: 50%;
  transform: translate(-50%, -50%);
}

.updateButton {
  width: 150px;
  height: 28px;
  border: 1px solid #515151;
  background: #515151;
  text-align: center;
  color: #ffffff;
  border-radius: 5px 5px 5px 5px;
  cursor: pointer;
  font-size: 16px;
}


    
    
</style>
    
    
    
</head>
<body>

<div class="topnavbar">
  <a href="#home">Free Form Log Reader</a>
</div>

    
<form id="FileNamePostBack" action="index.php" method="post" >




<!-- Code to handle checkboxes on postback -->

<div class="bottomnavbar">
    

        <?php
            if(!empty($_POST['critical_']))
            {
                echo "<a href='#contact'><input class='updateButton' name='update_'  value='Update Search'  type='submit'></button></a>";                
                echo "<a href='#contact'><input checked='true' name='critical_'  type='checkbox'/>&nbsp;Critical&nbsp;</a>";
            }
            else 
            {
                echo "<a href='#contact'><input class='updateButton' name='update_'  value='Update Search'  type='submit'></button></a>";                
                echo "<a href='#contact'><input name='critical_' type='checkbox'/>&nbsp;Critical&nbsp;</a>";
            }


            if(!empty($_POST['error_']))
            {
                echo "<a href='#contact'><input checked='true' name='error_'  type='checkbox'/>&nbsp;Error&nbsp;</a>";
            }
            else 
            {
                echo "<a href='#contact'><input name='error_' type='checkbox'/>&nbsp;Error&nbsp;</a>";
            }


            if(!empty($_POST['warnning_']))
            {
                echo "<a href='#contact'><input checked='true' name='warnning_'  type='checkbox'/>&nbsp;Warnning&nbsp;</a>";
            }
            else 
            {
                echo "<a href='#contact'><input name='warnning_' type='checkbox'/>&nbsp;Warnning&nbsp;</a>";
            }

            if(!empty($_POST['matchOnly_']))
            {
                echo "<a href='#contact'><input checked='true' name='matchOnly_'  type='checkbox'/>&nbsp;Matches Only</a>";
            }
            else 
            {
                echo "<a href='#contact'><input name='matchOnly_' type='checkbox'/>&nbsp;Matches Only</a>";
            }
        ?>
  
</div> 
    
    
    <div id="drop_file_zone" class="container">
        <div >
            
            
            <!-- Render Progress Bar and File Select Button -->
            <div class="container">
                <div class="row">
                    <div  class="col-sm-9">

                    </div>
                    <div   class="col-sm-3">
                        <br>
                        <span  class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Drag File or Click Begin</span>            
                            <input id="fileupload" type="file" name="files[]" multiple>
                        </span>
                    </div>
                </div><br>
                <div style="height: 5px;" id="progress" class="progress">
                    <div style="height: 5px;" class="progress-bar progress-bar-success"></div>
                </div>
            </div>
            
                    
            <!-- Hidden Field to Pass Filename -->
           <input hidden="true" type="text" name="files_"  id="files_" class="files"
           <?php 
                   if(!empty($_POST['files_']))
                   {
                       echo " value=" . $_POST['files_'] . " ";
                   }  
           ?> />

        
        
            <!-- Render Search Box and Search Button -->
            <div class="wrap">
               <div class="search">

                  <input type="text" name="search_" class="searchTerm" placeholder="Search For Something"
                    <?php 
                    if(!empty($_POST['search_']))
                    {
                        echo " value=" . $_POST['search_'] . " ";
                    }  
                    ?>/>
                    >
                  <button type="submit" class="searchButton">
                      <img src="img/searchico.png" height="20" width="20" alt=""/>
                 </button>    
               </div>    
            </div>





        <!-- Start Rendering Output -->
        <div style="overflow:scroll; height:70%; width: 98%;" >
            <?php 

                if(!empty($_POST['files_']))
                {
                    $file = new SplFileObject("./server/php/files/". $_POST['files_'] );
                    echo "<h5><ul>";

                    // Main File Loop //
                    while (!$file->eof()) 
                    {
                        $file->fgets();
                       
                        // Render Search Matches //
                        if(!empty($_POST['search_']))
                        {
                            $search_ = $_POST['search_'];
                            if (stripos($file, $search_))
                            {
                                echo "<li style='background-color: #f7ffc6;'>";
                                echo $file;
                                echo "</li>";
                                continue;
                            }  
                        }
                       
                        // Render Critical //
                        if(!empty($_POST['critical_']))
                        {
                            if (stripos($file, 'critical'))
                            {
                                echo "<li style='background-color: #ff0000;'>";
                                echo $file;
                                echo "</li>";
                                continue;
                            }
                            
                        }
                        
                        // Render Errors //                       
                        if(!empty($_POST['error_']))
                        {
                            if (stripos($file, 'error'))
                            {
                                echo "<li style='background-color: #d86363;'>";
                                echo $file;
                                echo "</li>";
                                continue;
                            }   
                        }

                        // Render Warnnings //
                        if(!empty($_POST['warnning_']))
                        {
                            if (stripos($file, 'warn'))
                            {
                                echo "<li style='background-color: #db8e4e;'>";
                                echo $file;
                                echo "</li>";
                                continue;
                            }   
                        }                        
                        
                        // Remove anything that does not match any of the other conditions //
                        if(empty($_POST['matchOnly_']))
                        {
                            echo "<li style='list-style: none'>";
                            echo $file;
                            echo "</li>";
                            continue;
                        }
                        
                    }
                    // End of File Loop
                    echo "</ul></h5>";
                }
                
            ?>
        </div>
            
    </div>

</form>    

        
</body>




</html>
