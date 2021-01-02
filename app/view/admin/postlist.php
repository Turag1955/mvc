<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <?php
        if (isset($_GET['msg']) && $_GET['msg'] != '') {
            $msg = unserialize(urldecode($_GET['msg']));
            ?>
            <div class="success">
                <span><?= $msg ?></span>
            </div>
            <?php
        }
        ?>
        <div class="block">  
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Post</th>
                        <th>Author</th>
                        <th>Tags</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($data['getpost']) {
                        $i = 1;
                        foreach ($data['getpost'] as $val) {
                            ?>
                            <tr class="odd gradeX">
                                <td><?= $i ?></td>
                                <td>
                                    <?php
                                    if ($data['categorylist']) {
                                        foreach ($data['categorylist'] as $cat) {
                                            if ($val['category_id'] == $cat['id']) {
                                                echo $cat['category_name'];
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                                <td><?= $val['title'] ?></td>
                                <td><?= tool::textshort($val['body'], 50) ?></td>
                                <td><?= $val['author'] ?></td>
                                <td><?= $val['tags'] ?></td>
                                <td><img src="./app/view/assets/frontend/upload/post/<?= $val['image'] ?>" alt="" width="50px" height="50px" /></td>
                                <td>
                                    <a href="<?=BASE_URL?>admin/updatepostshow/<?=$val['id']?>">Edit</a> || 
                                    <a onclick="return confirm('are your sure..?')" href="<?=BASE_URL?>admin/deletepost/<?=$val['id']?>" >Delete</a></td>
                            </tr>
                            <?php
                            $i++;
                        }
                    }
                    ?>

                </tbody>
            </table>

        </div>
    </div>
</div>
