<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <?php
        foreach ($data['catpost'] as $val) {
            ?>
            <div class="samepost clear">
                <h2><a href="<?= BASE_URL ?>index/postDetails/<?= $val['id'] ?>"><?= $val['title'] ?></a></h2>
                <h4><?= date('D-M-Y', strtotime($val['insertdate'])) ?>, By <a href="#"><?= ucwords($val['author']) ?></a></h4>
                <a href="<?= BASE_URL ?>index/postDetails/<?= $val['id'] ?>"><img src="./app/view/assets/frontend/images/post1.jpg" alt="post image"/></a>
                <p>
                    <?= substr($val['body'], 0, 200) ?>...
                </p>
                <div class="readmore clear">
                    <a href="<?= BASE_URL ?>index/postDetails/<?= $val['id'] ?>">Read More</a>
                </div>
            </div>
            <?php
        }
        ?>


