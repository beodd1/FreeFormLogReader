<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <script src="js/jquery.min.js" crossorigin="anonymous"></script>
    <script src="js/jquery.ui.widget.js"></script>
    <script src="js/jquery.iframe-transport.js"></script>
    <script src="js/jquery.fileupload.js"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>

    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script src="js/scripts.js" type="text/javascript"></script>
    
</head>

<body>
    

<div class="topnavbar">
    <a href="#home">Free Form Log Reader</a>
</div>


    
    
    
    
<form id="FileNamePostBack" action="index_dev.php" method="post" >

    <!-- Code to handle checkboxes on postback -->
    <div  class="bottomnavbar">
    
    <a href='#contact'><input class='updateButton' name='update_'  value='Update Search'  type='submit'></button></a>
    
    
        <?php
            if(!empty($_POST['critical_']))
            {
                
                if(!empty($_POST['reset_']))
                {
                    echo "<a style='padding: 15px 0px;' href='#contact'><input checked='false' name='critical_'  onchange='handleChange(this);' type='checkbox'/></a>";
                }
                else 
                {
                    echo "<a style='padding: 15px 0px;' href='#contact'><input checked='true' name='critical_' onchange='handleChange(this);'  type='checkbox'/></a>";
                }
   
            }
            else 
            {
                
                echo "<a style='padding: 15px 0px;' href='#contact'><input onchange='handleChange(this);' name='critical_' type='checkbox'/></a>";

            }

            ?>
    
    <a style="padding: 10px 5px;" ><input disabled style='background: #ff3030; color: #000000; padding: 0px 0px;' placeholder='Critical String' id='critical__db' list='critical__' name='critical__db'><datalist id='critical__'><option value='Critical'><option value='Fail'></datalist></a>
    
            <?php

            if(!empty($_POST['error_']))
            {
                echo "<a style='padding: 15px 0px;' href='#contact'><input checked='true' name='error_'  type='checkbox'/></a>";
            }
            else 
            {
                echo "<a style='padding: 15px 0px;' href='#contact'><input name='error_' type='checkbox'/></a>";
            }

            ?>
    
                <a style="padding: 10px 5px;" ><input disabled style='background: #ff8787; color: #000000; padding: 0px 0px;' placeholder='Error String' list='error__' name='error__'><datalist id='error__'><option value='error'><option value='error'></datalist></a>
    
            <?PHP

            if(!empty($_POST['warnning_']))
            {
                echo "<a style='padding: 15px 0px;' href='#contact'><input checked='true' name='warnning_'  type='checkbox'/></a>";
            }
            else 
            {
                echo "<a style='padding: 15px 0px;' href='#contact'><input name='warnning_' type='checkbox'/></a>";
            }

            ?>
            
                <a style="padding: 10px 5px;" ><input disabled style='background: #ffb668; color: #000000; padding: 0px 0px;' placeholder='Warnning String' list='warrning__' name='warrning__'><datalist id='warnning__'><option value='Warnning'><option value='Warn'></datalist></a>
                
            <?php
            
            
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
                    
                    <!-- Uncomment to make button on the right
                    <div  class="col-sm-9">

                    </div>
                    -->
                    <div   class="col-sm-3">
                        <br>
                        <span  class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Drag File or Click Begin</span>            
                            <input id="fileupload" type="file" name="files[]" multiple>
                        </span>
                    </div>
                </div>
                
                <br>
                
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
           
           
           <input type="text" hidden="true" name="reset_"  id="reset_"/>

            <!-- Render Search Box and Search Button -->
            <div class="wrap">
               <div class="search">

                  <input type="text" name="search_" class="searchTerm"  placeholder="Search For Something"
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
