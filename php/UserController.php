<!-- Welcome <?php echo $_GET["NIP"]; ?><br>
Your email address is: <?php echo $_GET["pasword"]; ?> -->

<?php
define('DIRECTORY', '/home/user/uploads');

$content = file_get_contents('http://anothersite/images/goods.jpg');
file_put_contents(DIRECTORY . '/image.jpg', $content);
?>
