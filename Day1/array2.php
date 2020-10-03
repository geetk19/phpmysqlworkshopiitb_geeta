<?php
    $mat1 = array(array(7,19),array(3,6));
    $mat2 = array(array(27,11),array(1,12));
    print_r("First matrix :");
    print_r($mat1);
    echo "<br>";
    print_r("Second matrix :");
    print_r($mat2);
    echo "<br>";
    $sum = array();
    foreach($mat1 as $row1){
        foreach($mat2 as $row2){
            array_push($sum,array($row1[0]+$row2[0],$row1[1]+$row2[1]));
            unset($mat2[0]);
            break;
        }
    }
    echo "Sum of above two matrix is :";
    print_r($sum);
?>
