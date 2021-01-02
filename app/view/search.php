
<?php ?>

<div class="searchbtn clear">
    <form action="<?= BASE_URL ?>index/search" method="post">
        <input type="text" name="keyword" placeholder="Search keyword..."/>
        <select class="searchcat" name="category" id="">
            <option value=""> Category</option>
<?php
foreach ($data['category'] as $val) {
    ?>
                <option value="<?= $val['id'] ?>"><?= $val['category_name'] ?></option>
            <?php } ?>
        </select>
        <input type="submit" name="submit" value="Search"/>
    </form>
</div>
</div>
</div>
<div class="navsection templete">
    <ul>
        <li><a id="active" href="http://localhost/mvc">Home</a></li>
        <li><a href="<?= BASE_URL ?>index/about">About</a></li>	
        <li><a href="<?= BASE_URL ?>index/contact">Contact</a></li>
    </ul>
</div>