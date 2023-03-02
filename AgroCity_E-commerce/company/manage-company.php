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
                                    <a href="#" class="btn-secondary"> Update Company</a>
                                    <a href="#" class="btn-secondary"> Delete Company</a>
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