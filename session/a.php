<?php
echo "<a href = new.php>new1</a></br>";
$a = session_name();
$b = session_id();
echo "<a href = new.php?$a = ".$b.">new2</a></br>";