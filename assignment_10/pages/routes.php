<?php

$path = "index.php?page=login";
$nav = <<<HTML
<nav>
    <ul>
        <li><a href="index.php?page=welcome">Welcome</a></li>
        <li><a href="index.php?page=addContact">Add Contact Information</a></li>
        <li><a href="index.php?page=deleteContacts">Delete Contact(s)</a></li>
    </ul>
</nav>
HTML;
$adminNav=<<<HTML
    <nav>
        <ul>
            <li><a href="index.php?page=welcome">Welcome</a></li>
            <li><a href="index.php?page=addContact">Add Contact Information</a></li>
            <li><a href="index.php?page=deleteContacts">Delete Contact(s)</a></li>
            <li><a href="index.php?page=addAdmin">Add Admin</a></li>
            <li><a href="index.php?page=deleteAdmins">Delete Admin(s)</a></li>
        </ul>
    </nav>
HTML;
$staffNav=<<<HTML
    <nav>
        <ul>
            <li><a href="index.php?page=welcome">Welcome</a></li>
            <li><a href="index.php?page=addContact">Add Contact Information</a></li>
            <li><a href="index.php?page=deleteContacts">Delete Contact(s)</a></li>
        </ul>
    </nav>
HTML;

if(isset($_GET)){
    if($_GET['page'] === "addContact"){
        require_once('pages/addContact.php');
        security();
        $nav = setNav();
        $result = init();
    }
    
    else if($_GET['page'] === "deleteContacts"){
        require_once('pages/deleteContacts.php');
        security();
        $nav = setNav();
        $result = init();
    }

    else if($_GET['page'] === "addAdmin"){
        require_once('pages/addAdmin.php');
        security();
        $nav = setNav();
        accessStatusLevel();
        $result = init();
    }
    
    else if($_GET['page'] === "deleteAdmins"){
        require_once('pages/deleteAdmins.php');
        security();
        $nav = setNav();
        accessStatusLevel();
        $result = init();
    }

    else if($_GET['page'] === "welcome"){
        require_once('pages/welcome.php');
        security();
        $nav = setNav();
        $result = init();
        //session_start();
        //echo "<pre>";
        //print_r($_SESSION);
        
        //if($_SESSION['access'] === "accessGranted"){
            //header('location:index.php?page=welcome');

            //$result = init();
       // }else{
            //header('location:index.php?page=login');
       // }  

    }

    else if($_GET['page'] === "login"){
        require_once('pages/login.php');
        session_start();
        $nav = <<<HTML
        <nav>
        </nav>
        HTML;;
        $result = init();

    }

    else if($_GET['page'] === "logout"){
        require_once('logout.php');

    }

    else {
        header('location: '.$path);
    }
}

else {
    header('location: '.$path);
}

function security(){
    session_start();
    if($_SESSION['access'] !== "accessGranted"){
        header('location'.$path);
    }
}
function accessStatusLevel(){
    if($_SESSION['status'] !== "admin"){
        header('location'.$path);
    }
}
function setNav(){
    if($_SESSION['status'] !== "admin"){
        $nav = <<<HTML
        <nav>
            <ul>
                <li><a href="index.php?page=welcome">Welcome</a></li>
                <li><a href="index.php?page=addContact">Add Contact Information</a></li>
                <li><a href="index.php?page=deleteContacts">Delete Contact(s)</a></li>
                <li><a href="index.php?page=logout">Logout</a></li>
            </ul>
        </nav>
        HTML;
    }
    if($_SESSION['status'] === "admin"){
        $nav = <<<HTML
        <nav>
            <ul>
                <li><a href="index.php?page=welcome">Welcome</a></li>
                <li><a href="index.php?page=addContact">Add Contact Information</a></li>
                <li><a href="index.php?page=deleteContacts">Delete Contact(s)</a></li>
                <li><a href="index.php?page=addAdmin">Add Admin</a></li>
                <li><a href="index.php?page=deleteAdmins">Delete Admin(s)</a></li>
                <li><a href="index.php?page=logout">Logout</a></li>
            </ul>
        </nav>
        HTML;
    }
    return $nav;
}

?>