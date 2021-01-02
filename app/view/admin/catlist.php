<?php
/*
  echo '<pre>';
  print_r($data['categorylist']);
  die;
 * 
 */
?>      


<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
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
        <div class = "block">
            <table class = "data display datatable" id = "example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($data['categorylist']) {
                        $i = 1;
                        foreach ($data['categorylist'] as $val) {
                            ?>
                            <tr class="odd gradeX">
                                <td><?= $i ?></td>
                                <td><?= $val['category_name'] ?></td>
                                <td>
                                    <a href="<?=BASE_URL?>admin/updatecategoryshow/<?=$val['id']?>">Edit</a> 
                                    || <a onclick="return confirm('are your sure..?')" href="<?=BASE_URL?>admin/deletecategory/<?=$val['id']?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                    } else {
                        echo 'category empty';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>