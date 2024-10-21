<div class="dashboard_sidebar" id="dashboard_sidebar">

    <h3 class="dashboard_logo" id="dashboard_logo">Sutra Style</h3>
    <div class="dashboard_sidebar_user">
        <?php if ($user): ?>
            <span><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></span>
        <?php else: ?>
            <span>User not found</span>
        <?php endif; ?>

    </div>

    <div class="dashboard_sidebar_menus">

        <ul class="dashboard_menu_lists">

            <!--class="menuActive"-->
            <li>
                <a href="../html/dashboard.php"><i class="fa fa-dashboard"></i><span
                        class="menuText">Dashboard</span></a>
            </li>
            <li>
                <a href="../html/users-add.php"><i class="fa fa-user-plus"></i><span class="menuText">Add
                        User</span></a>
            </li>


        </ul>
    </div>
</div>