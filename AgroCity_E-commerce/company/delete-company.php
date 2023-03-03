<?php

    include('../config/constant.php');
    //using get methode
    $id= $_GET['id'];

    //create query for delete
    $sql="DELETE FROM company where id=$id";
    //execute query
    $res=mysqli_query($conn, $sql);

    //check query is executed successfully or not
    if($res==true)
    {
        //echo "Company Deleted";
        //create session
        $_SESSION['delete']="<div class='success'>Company Deleted Successfully!!</div>";
        header('location:'.SITEURL.'company/manage-company.php');
    }
    else
    {
        //echo "Failed to Delete Company";
        //create session
        $_SESSION['delete']="<div class='error'>Failed to Delete Company.Try Again Later!</div>";
        header('locaion:'.SITEURL.'company/manage-company.php');
    }
?>