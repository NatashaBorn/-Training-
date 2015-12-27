<div id="rightCol">
   <div id="search">
        <form  method="POST" action="search.php">
            <input type="text" name="search" placeholder="Найти..." required><br>
            <input type="submit" name="search1" value="Найти" ><br>
         </form>
         <div style="clear:both;"></div>
    </div>
    <div id="auth">
       <?php require_once "authorization.php"?> 
       <div style="clear:both;"></div>
    </div>
</div>






