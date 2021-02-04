<?php
    $konek = mysqli_connect("localhost", "root", "", "dms");

    if(!$konek){
        echo "Error cui" . mysqli_connect_error();
    }
