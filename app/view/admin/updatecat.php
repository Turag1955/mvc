<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Category</h2>
        <?php
        if (isset($data['caterror']) && $data['caterror'] != '') {
           // print_r($data['categorycheck'][0]['id']);
            ?>
            <div class="error">
                <span><?= $data['caterror'] ?></span>
            </div>
            <?php
        }
        ?>
        <div class="block copyblock"> 
            <form action="<?= BASE_URL ?>admin/updatecategory" method="post">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="hidden" name="id" value="<?= (isset($data['categorycheck'][0]['id']))?$data['categorycheck'][0]['id']:$data['getCategoryById'][0]['id'] ?>" />
                            <input type="text" name="category" placeholder="Enter Category Name..." class="medium" value="<?= (isset($data['getCategoryById'][0]['category_name']) ? $data['getCategoryById'][0]['category_name'] : '') ?>" required="" />
                        </td>
                    </tr>
                    <tr> 
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>