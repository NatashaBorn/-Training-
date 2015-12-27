<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
       <?php 
        $title="Информация о нас";
        require_once "blocks/head.php";
        ?>
        
    </head>
    <body>
       <div id="wrap_wrapper">
        <?php require_once "blocks/header.php"?>
        
        <div id="wrapper">
           <?php require_once "blocks/panel.php"?>
            <div id="leftCol">
                 <?php
                $connection = mysql_connect("localhost", "root","");
                $db = mysql_select_db("Articles");

                if(!$connection||!$db){
                    exit(mysql_error());
                }
                
                $search=$_POST['search'];
                
                $result=mysql_query("SELECT * FROM articles WHERE title LIKE '%$search%'");
                
                mysql_close();

                while ($row = mysql_fetch_array($result)) { ?>    
                <div id="resultSearch">
                <h1 style="text-align: left; text-indent: 30px; margin-bottom: 0px;"><?php echo $row['title'];?></h1>
                <p><?php echo $row['intro_text'];?></p>
                
                <div style="clear:both;"></div>
                <?php echo'<a href="article.php?type='.$row['type'].'&id='.$row["id"].'" style="margin: 15px;">
                    Подробнее...
                    </a>';?>
                </div>	
                <?php }
               if(!$result){
                    echo 'Ничего не найдено';
                }
                
                ?>
                
                
            </div>
            <?php require_once "blocks/rightCol.php"?>
        </div>
        
        <?php require_once "blocks/footer.php"?>
        </div>
    </body>
</html>