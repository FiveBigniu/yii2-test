<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/14
 * Time: 10:26
 */

use sheila\assets\AppAsset;
AppAsset::register($this);
$this -> beginPage();
?>

<!doctype html>
<html lang="ch">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>资源调用</title>
    <?php $this -> head(); ?>
</head>
<body>
<?php $this -> beginBody(); ?>
<?php echo $content; ?>
<?php $this -> endBody(); ?>
</body>
</html>
<?php $this -> endPage(); ?>
