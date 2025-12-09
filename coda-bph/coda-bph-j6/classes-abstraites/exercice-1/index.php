<?php

    require "AbstractUser.php";

    $member = new Member("member", "member_password", "BIOGRAPHIE");

    $admin = new Admin("admin", "admin_password");

    echo $member->getAll();
    echo $admin->getAll();

    $admin->changeMemberRole($member);

    echo $member->getAll();

    $admin->changeMemberRole($member);

    echo $member->getAll();

    
    // $member->print();

    // $admin->print();
?>