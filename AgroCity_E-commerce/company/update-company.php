<?php include('partitals/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Company</h1>
        <br/>
        <?php
            $id=$_GET['id'];

            $sql="SELECT * FROM company WHERE id=$id";

            $res=mysqli_query($conn, $sql);

            if($res==true)
            {
                //check data is present or not
                $count=mysqli_num_rows($res);

                //check we have company data or not
                if($count==1)
                {
                    //echo "Company is avilable";
                    $row=mysqli_fetch_assoc($res);

                    $name=$row['name'];
                    $username=$row['username'];
                }
                else
                {
                    header('location:'.SITEURL.'company/manage-company.php');
                }
            }
        ?>
        <form action="" method="post">
            <table class="tbl">
                <tr>
                    <td><input type="text" name="name" class="input-box" placeholder="Company Name" value="<?php echo $name;?>"></td>
                </tr>
                <tr>
                    <td><input type="text" name="username" class="input-box" placeholder="Username" value="<?php echo $username; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Update Company" class="btn-third">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    //check submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //echo "button clicked";
        $id=$_POST['id'];
        $name=$_POST['name'];
        $username=$_POST['username'];

        $sql="UPDATE company SET 
        name='$name',
        username='$username'
        WHERE id='$id'
        ";

        $res=mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['update']= "<div class='success'>Company Update Successfully!!</div>";
            header("location:".SITEURL.'company/manage-company.php');
        }
        else
        {
            $_SESSION['update']= "<div class='success'>Failed to  Update Company!</div>";
            header("location:".SITEURL.'company/manage-company.php');
        }
    }
?>