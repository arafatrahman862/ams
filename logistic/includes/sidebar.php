<div class="left_sidebar">
        <nav class="sidebar">
            <div class="user-info">
                <div class="image"><a href="javascript:void(0);"><img src="../assets/images/user.png" alt="User"></a></div>
                <div class="detail mt-3">
                    <?php
                     $did=$_SESSION['username'];

                    $sql="SELECT fullname,email from  logistic where username = '$did'";
                    $result = $conn->query($sql);
                    if ($result) {
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $fname = $row['fullname'];
                            $email = $row['email'];
                        } else {

                            $fname = 'Unknown';
                            $email = 'Unknown';
                        }
                    }

 ?>
                    <h5 class="mb-0"><?php  echo $fname ;?></h5>
                    <small><?php  echo $email ;?></small>
                </div>
            </div>
            <ul id="main-menu" class="metismenu">
            
                <li class="active"><a href="dashboard.php"><i class="ti-home"></i><span>Dashboard</span></a></li>
                <li><a href="weapon-add.php"><i class="ti-pencil-alt"></i><span>New Weapon Add</span></a></li>
                 <li><a href="soldiers.php"><i class="fa fa-address-card" aria-hidden="true"></i><span>Soldier Database</span></a></li>
                 <li><a href="officers.php"><i class="fa fa-address-card" aria-hidden="true"></i><span>Officer Database</span></a></li>
                 <li><a href="inventory.php"><i class="fa fa-archive" aria-hidden="true"></i><span>Inventory</span></a></li>
                 <li><a href="requests.php"><i class="fa fa-ticket" aria-hidden="true"></i><span>Requests</span></a></li>
                 <li><a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i><span>My Profile</span></a></li>
                 <li><a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>
                
            </ul>            
        </nav>
    </div>