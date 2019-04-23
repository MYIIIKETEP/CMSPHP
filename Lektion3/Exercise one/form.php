<?php

/* 
 * Arrays kan either have index as keys: 0,1,2,3,4
 * or they can have names as keys, $_POST have names as keys.
 * DO NOT MIX
 */
if($_POST["passW"] == "lol123"){
echo 'Hej ' . $_POST["username"] . 'du är född ' . $_POST["bdate"] . ' Din favoritegenskap är' . $_POST['favIc'] . '. Nice.';
}
else {
    echo "<img src='https://media.giphy.com/media/3ohzdQ1IynzclJldUQ/giphy.gif' alt='magic word' />";
}

?>