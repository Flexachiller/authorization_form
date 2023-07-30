<?php
setcookie('username', '', time()-9999999999);
header('Location: login.php');