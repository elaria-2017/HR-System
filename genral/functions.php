<?php
function test($t,$mess){
    if($t){
        echo "<div class='alert alert-info'>
        $mess is true 
        </div>";
    }
    else {
        echo "<div class='alert alert-danger'>
        $mess is false 
        </div>";
    }
}
function auth(){

    if(isset($_SESSION['admin']) || isset($_SESSION['hr'])){

    }
    else{
    header("location:/final/admin/login.php");
    }
}


?>