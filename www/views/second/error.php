<?php
        header("HTTP/1.0 404 Not Found");
?>
<p>Что то пошло не так: <?php echo $this->error_report; ?></p>
<div><a href="/">На главную</a></div>