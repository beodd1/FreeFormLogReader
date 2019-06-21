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

    <!-- Code to update controls on postback -->
    <div  class="bottomnavbar">
    
    <a href='#contact'><input class='updateButton' name='update_'  value='Update Search'  type='submit'></button></a>
    
    
        <?php
            if(!empty($_POST['critical_']))
            {
                

                echo "<a style='padding: 15px 0px;' href='#contact'><input checked='true' name='critical_' onchange='handleChange(this, \"critical__db\",1);'  type='checkbox'/></a>";
                echo "<a style='padding: 10px 5px;' ><input type='text'  style='background: #a90000; color: #000000; padding: 0px 0px;' placeholder='Critical String' value='"; 
                if (!empty($_POST['critical__db']))
                {
                    echo $_POST['critical__db'];
                }
                echo " ' id='critical__db' list='critical__' name='critical__db'><datalist id='critical__'><option value='Critical'><option value='Fail'></datalist></a>";
   
            }
            else 
            {               
                echo "<a style='padding: 15px 0px;' href='#contact'><input onchange='handleChange(this, \"critical__db\",1);' name='critical_' type='checkbox'/></a>";   
                echo "<a style='padding: 10px 5px;' ><input type='text' readonly style='background: #824f4f; color: #000000; padding: 0px 0px;' placeholder='Critical String' value='"; 
                //if (!empty($_POST['critical__db']))
                //{
                //    echo $_POST['critical__db'];
                //}
                echo "crit' id='critical__db' list='critical__' name='critical__db'><datalist id='critical__'><option value='Critical'><option value='Fail'></datalist></a>";
                   

            }

        ?>
    
        <?php
            if(!empty($_POST['error_']))
            {
                

                echo "<a style='padding: 15px 0px;' href='#contact'><input checked='true' name='error_' onchange='handleChange(this, \"error__db\",2);'  type='checkbox'/></a>";
                echo "<a style='padding: 10px 5px;' ><input type='text'  style='background: #ca7100; color: #000000; padding: 0px 0px;' placeholder='Error String' value='"; 
                if (!empty($_POST['error__db']))
                {
                    echo $_POST['error__db'];
                }
                echo " ' id='error__db' list='error__' name='error__db'><datalist id='error__'><option value='Error'><option value='Error'></datalist></a>";
   
            }
            else 
            {               
                echo "<a style='padding: 15px 0px;' href='#contact'><input onchange='handleChange(this, \"error__db\",2);' name='error_' type='checkbox'/></a>";   
                echo "<a style='padding: 10px 5px;' ><input type='text' readonly style='background: #927958; color: #000000; padding: 0px 0px;' placeholder='Error String' value='"; 
                //if (!empty($_POST['error__db']))
                //{
                //    echo $_POST['error__db'];
                //}
                echo "error' id='error__db' list='error__' name='error__db'><datalist id='error__'><option value='Error'><option value='Error'></datalist></a>";
                   

            }

        ?>
    
    
        <?php
            if(!empty($_POST['warning_']))
            {
                

                echo "<a style='padding: 15px 0px;' href='#contact'><input checked='true' name='warning_' onchange='handleChange(this, \"warning__db\",3);'  type='checkbox'/></a>";
                echo "<a style='padding: 10px 5px;' ><input type='text'  style='background: #c9ce00; color: #000000; padding: 0px 0px;' placeholder='Warning String' value='"; 
                if (!empty($_POST['warning__db']))
                {
                    echo $_POST['warning__db'];
                }
                echo " ' id='warning__db' list='warning__' name='warning__db'><datalist id='warning__'><option value='Warning'><option value='Warn'></datalist></a>";
   
            }
            else 
            {               
                echo "<a style='padding: 15px 0px;' href='#contact'><input onchange='handleChange(this, \"warning__db\",3);' name='warning_' type='checkbox'/></a>";   
                echo "<a style='padding: 10px 5px;' ><input type='text' readonly style='background: #8a8c45; color: #000000; padding: 0px 0px;' placeholder='Warning String' value='"; 
                //if (!empty($_POST['warning__db']))
                //{
                //    echo $_POST['warning__db'];
                //}
                echo "warn' id='warning__db' list='warning__' name='warning__db'><datalist id='warning__'><option value='Warn'><option value='Warn'></datalist></a>";
                   

            }

        ?>    
    
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
                    
                    <!-- comment to make button on the right -->
                    <div  class="col-sm-9">

                    </div>
                    <!-- ------------------ -->
                    
                    
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
                                echo "<li style='background-color: #77abff;'>";
                                echo $file;
                                echo "</li>";
                                continue;
                            }  
                        }
                       
                        // Render Critical //
                        if(!empty($_POST['critical_']))
                        {
                            if (stripos($file, $_POST['critical_']))
                            {
                                echo "<li style='background-color: #a90000;'>";
                                echo $file;
                                echo "</li>";
                                continue;
                            }
                            
                        }
                        
                        // Render Errors //                       
                        if(!empty($_POST['error_']))
                        {
                            if (stripos($file, $_POST['error_']))
                            {
                                echo "<li style='background-color: #ca7100;'>";
                                echo $file;
                                echo "</li>";
                                continue;
                            }   
                        }

                        // Render Warnings //
                        if(!empty($_POST['warning_']))
                        {
                            if (stripos($file, $_POST['warning_']))
                            {
                                echo "<li style='background-color: #c9ce00;'>";
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
