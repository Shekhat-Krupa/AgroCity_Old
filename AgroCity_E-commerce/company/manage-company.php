<?php include('partitals/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manager Company</h1>
        <br/><br/>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];//display
                unset($_SESSION['add']);//removie after one time
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];//display
                unset($_SESSION['delete']);//removie after one time
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];//display
                unset($_SESSION['update']);//removie after one time
            }
            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION['user-not-found'];//display
                unset($_SESSION['user-not-found']);//removie after one time
            }
            if(isset($_SESSION['pwd-not-match']))
            {
                echo $_SESSION['pwd-not-match'];//display
                unset($_SESSION['pwd-not-match']);//removie after one time
            }
            if(isset($_SESSION['change-pwd']))
            {
                echo $_SESSION['change-pwd'];//display
                unset($_SESSION['change-pwd']);//removie after one time
            }

        ?>
        <br/><br/>
        <a href="add-company.php" class="btn-primary">Add Company</a>
        <br/><br/><br/>
        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php
                //Query
                $sql="SELECT *FROM company";
                //exectue
                $res=mysqli_query($conn,$sql);

                if($res==true)
                {
                    //check data in database or not
                    $count=mysqli_num_rows($res);

                    $sn=1;

                    if($count>0)
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            //get data from database
                            $id=$rows['id'];
                            $name=$rows['name'];
                            $username=$rows['username'];
                            ?>
                            <tr>
                                <td><?php  echo $sn++; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>company/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                    <a href="<?php echo SITEURL; ?>company/update-company.php?id=<?php echo $id; ?>" class="btn-secondary"> Update Company</a>
                                    <a href="<?php echo SITEURL; ?>company/delete-company.php?id=<?php echo $id; ?>" class="danger"> Delete Company</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                }

            ?>
        </table>
    </div>
</div>