<?php
$pages = array(
    'index.php' => 'Home',
    'about.php' => 'About',
    '404.php' => '404',
) ;

$currentPage = basename($_SERVER['REQUEST_URI']) ;

?>

<div id="menu">
    <ul id="menuList">
        <?php foreach ($pages as $filename => $pageTitle) { 
            if ($filename == $currentPage) { ?>
        <li class="current"><?php echo $pageTitle ; ?></li>
            <?php } else { ?>
        <li><a href="<?php echo $filename ; ?>"><?php echo $pageTitle ; ?></a></li>
            <?php
            } //if 
         } //foreach 
            ?>
    </ul>
</div>