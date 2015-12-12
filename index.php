<!DOCTYPE html>
<html>
    <head>
       <?php 
        $title="Новости обо всем";
        require_once "blocks/head.php";
        ?>
    </head>
    <body>
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
                    
                    $base=$_GET['base'];
                    
                    if(isset($_GET)){
                        $result=mysql_query("SELECT * FROM $base");
                    }
                    else {
                        $result=mysql_query("SELECT * FROM news");
                    }
                    
                   
                    //$result=mysql_query("SELECT * FROM $base");
                    $max_articles=3;
                    $num_articles=mysql_num_rows($result);
                    $num_pages=intval(($num_articles-1)/$max_articles)+1;
                    
                    for($i=1;$i<=$num_pages;$i++)
                        echo '<a href="index.php?base='.$base.'&page='.$i.'">'.$i.'</a>';
					
                    if(isset($_GET["page"])){
                        $page=$_GET["page"];
                        if($page<1)
                            $page=1;
                        elseif($page>$num_pages)
                            $page=$num_pages;
                    }
                    else
                        $page=1;
                    
                    mysql_close();
					/*$row=mysql_fetch_array($result);
					echo $row['title'];
                    '.$row["title"].'
                    '.$row["intro_text"].'
                    '.$row["date"].'
                    '.$row["time"].'
                    '.$base.'
                    '.$row["id"].'
                    */
                    $row= mysql_fetch_array($result);
                    do{
                        if(($row["id"]>($page*$max_articles-$max_articles))&&($row["id"]<=$page*$max_articles)){
               ?> 
                    <div id="articles">  
                    <?php echo '<img src="img/articles/'.$base.'/'.$row["id"].'.jpg">';?>
                    <h1><?php echo $row['title'];?></h1>
                    <p><?php echo $row['intro_text'];?></p>
                    <?php echo'<a href="article.php?base='.$base.'&id='.$row["id"].'">
                    <div class="more">Далее</div>
                    </a>';?>
                    </div>
                    <?php }
                    }while ($row= mysql_fetch_array($result))?>
                    
                       

                    <!--/*for($i=0;$i<count($news);$i++){
                        if($i==0)
                            echo '<div id="bigArticle">';
                        else
                            echo '<div id="article">';
                        $row = mysql_fetch_array($result);
                        echo'<img src="img/articles/1.jpg" alt="Статья 1" title="Статья 1"> 
                    <h2>'.$row["title"].'</h2>
                    <p>'.$row["intro_text"].'</p>
                    <p>Дата публикации: '.$row["date"].' /  '.$row["time"].'</p>
                    <p>Автор новости: '.$row["author"].'</p>
                    <a href="article.php">
                    <div class="more">Далее</div>
                    </a>
                        
                    </div>';
                        if($i==0)
                            echo '<div class="clear"><br></div>';
                    }?>*/-->
                <!--<div id="bigArticle">
                    <img src="img/articles/1.jpg" alt="Статья 1" title="Статья 1">
                    <h2>Статья 1</h2>
                    <p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. </p>
                    <a href="article.php">
                    <div class="more">Далее</div>
                    </a>
                </div>
                <div class="clear"><br></div>
                <div class="article">
                    <img src="img/articles/2.jpg" alt="Статья 2" title="Статья 2">
                    <h2>Статья 3</h2>
                    <p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн.</p>
                    <a href="article.php">
                    <div class="more">Далее</div>
                    </a>
                </div>
                <div class="article">
                    <img src="img/articles/3.jpg" alt="Статья 3" title="Статья 3">
                    <h2>Статья 3</h2>
                    <p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн.</p>
                    <a href="article.php">
                    <div class="more">Далее</div>
                    </a>
                </div>-->
            </div>
            <?php require_once "blocks/rightCol.php"?>
        </div>
        <?php require_once "blocks/footer.php"?>
        
    </body>
</html>