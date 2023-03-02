<?php include('partitals/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Company</h1>
        <br/>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];//display
                unset($_SESSION['add']);//removie after one time
            }
        ?>
        <form action="" method="post">
            <table class="tbl">
                <tr>
                    <td><input type="text" name="name" class="input-box" placeholder="Company Name"></td>
                </tr>
                <tr>
                    <td><input type="text" name="username" class="input-box" placeholder="Username"></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" class="input-box" placeholder="Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Company" class="btn-third">
                    </td>
                </tr>
            </table>
        </form>
<?php
    //check submit is clicked or not
    if(isset($_POST['submit']))
    {
        $name= $_POST['name'];
        $username= $_POST['username'];
        $password= md5($_POST['password']);

        //Query for database
        $sql = "INSERT INTO company SET
            name='$name',
            username='$username',
            password='$password'
        ";
        //res give query exectue or not
        //config
        $res = mysqli_query($conn,$sql);

        if($res==true)
        {
            //echo "data";
            //create session
            $_SESSION['add']= "Company Add Successfully";
            header("location:".SITEURL.'company/manage-company.php');
        }
        else
        {
            //echo "no data";
            $_SESSION['add']= "Company Add Failed";
            header("location:".SITEURL.'company/add-company.php');
        }
    }
?>