<?php

    session_start();

    if(isset($_SESSION["admin"])){

        session_destroy();
        echo "Success";

    }else if(isset($_SESSION["teacher"])){

        session_destroy();
        echo "Success";

    }else if(isset($_SESSION["student"])){

        session_destroy();
        echo "Success";

    }else if(isset($_SESSION["ao"])){

        session_destroy();
        echo "Success";
        
    }else{
        echo "Invalid Request";
    }

?>