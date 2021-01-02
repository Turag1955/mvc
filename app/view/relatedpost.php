<?php 
//echo '<pre>';
//print_r($data);
?>

<div class="relatedpost clear">
    <h2>Related articles</h2>
    <?php
    foreach ($data['relatedpost'] as $val) {
        ?>
        <a href="<?= BASE_URL ?>index/postDetails/<?= $val['id'] ?>"><img src="./app/view/assets/frontend/images/post1.jpg" alt="post image"/></a>
    <?php } ?>
</div>
</div>