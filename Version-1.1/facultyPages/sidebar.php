     <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="/projectApprovalSystem/image/<?php echo $_SESSION["username"]["image"]; ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        echo $_SESSION["username"]["code"];
                        ?>
                    </div>
                    <div class="email">
                        <?php
                          echo $_SESSION["username"]["email_id"];
                        ?>
                    </div>
                  
                        <i class="dropdown-toggle" data-toggle="dropdown"></i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="/projectApprovalSystem/facultyPages/homePage.php">
                            <i class="material-icons"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="/projectApprovalSystem/facultyPages/profilePage.php">
                            <i class="material-icons"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                     <li>
                        <a href="/projectApprovalSystem/facultyPages/uploadImagePage.php">
                            <i class="material-icons"></i>
                            <span>Upload/change Image</span>
                        </a>
                    </li>
                     <li>
                        <a href="/projectApprovalSystem/facultyPages/changePassword.php">
                            <i class="material-icons"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="/projectApprovalSystem/facultyPages/studentGroupDetail.php">
                            <i class="material-icons"></i>
                            <span>Student Group Detail</span>
                        </a>
                    </li>
                    <li>
                        <a href="/projectApprovalSystem/facultyPages/studentSubmissionPage.php">
                            <i class="material-icons"></i>
                            <span>Student Submissions</span>
                        </a>
                    </li>
                    <li>
                        <a href="/projectApprovalSystem/facultyPages/signOut.php">
                            <i class="material-icons"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 - 2019 <a href="javascript:void(0);">VINAY AND RITIKA DESIGN</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>