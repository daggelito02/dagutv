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
    echo "first_name2 = " . $_POST['first_name']. "\n";
    echo "last_name2= " . $_POST['last_name']. "\n";
    echo "number_of_gifts2 = " . $_POST['number_of_gifts']. "\n";
    echo "home_delivery2 = " . $_POST['home_delivery']. "\n";
    echo "the_gift2 = " . $_POST['the_gift']. "\n";
    echo "other_wishes2 = " . $_POST['other_wishes']. "\n";
    echo "submit = " . $_POST['submit'];
}
?>