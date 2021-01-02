<?php
//echo '<pre>';
//print_r($data);
?>

<div class="sidebar clear">
    <div class="samesidebar clear">
        <h2>Categories</h2>
        <ul>
            <?php
            foreach ($data['category'] as $val) {
                $path = BASE_URL."index/catbypost/". urlencode(serialize($val['id']));
                ?>
                <li><a href="<?=$path?>"><?= $val['category_name'] ?></a></li>
            <?php } ?>
        </ul>
    </div>

    <div class="samesidebar clear">
        <h2>Latest articles</h2>
        <?php
        foreach ($data['latestpost'] as $val) {
            ?>
            <div class="popular clear">
                <h3><a href="<?= BASE_URL ?>index/postDetails/<?= $val['id'] ?>"><?=$val['title']?></a></h3>
                <a href="<?= BASE_URL ?>index/postDetails/<?= $val['id'] ?>"><img src="./app/view/assets/frontend/images/post1.jpg" alt="post image"/></a>
                <p><?= substr($val['body'], 0,100)?>...</p>	
            </div>
        <?php } ?>
    </div>

</div>
