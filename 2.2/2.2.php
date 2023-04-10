<?php
header('Content-type: text/plain');

if ($_GET){
    echo "hidden = " . $_GET['hidden']. "\n";
    echo "first_name = " . $_GET['first_name']. "\n";
    echo "last_name = " . $_GET['last_name']. "\n";
    echo "number_of_gifts = " . $_GET['number_of_gifts']. "\n";
    echo "home_delivery = " . $_GET['home_delivery']. "\n";
    echo "the_gift = " . $_GET['the_gift']. "\n";
    echo "other_wishes = " . $_GET['other_wishes']. "\n";
    echo "submit = " . $_GET['submit'];
} elseif ($_POST){
    echo "hidden = " . $_POST['hidden']. "\n";
    echo "first_name = " . $_POST['first_name']. "\n";
    echo "last_name = " . $_POST['last_name']. "\n";
    echo "number_of_gifts = " . $_POST['number_of_gifts']. "\n";
    echo "home_delivery = " . $_POST['home_delivery']. "\n";
    echo "the_gift = " . $_POST['the_gift']. "\n";
    echo "other_wishes = " . $_POST['other_wishes']. "\n";
    echo "submit = " . $_POST['submit'];
}
?>