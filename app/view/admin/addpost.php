<?php
/*
  if (isset($data)) {

  echo '<pre>';
  print_r($data);
  echo '</pre>';
  }
 * 
 */
?>
<div class="grid_10">


    <div class="box round first grid">
        <h2>Add New Post</h2>
        <div class="block">               
            <form action="<?= BASE_URL ?>admin/addpost" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name="title" placeholder="Enter Post Title..." class="medium" value="<?= (isset($_POST['title']) ? $_POST['title'] : '') ?>" />
                            <?php
                            if (isset($data['title'])) {
                                ?>
                                <div class="error"><?= $data['title'] ?></div>
                                <?php
                            }
                            ?>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="category_id">
                                <option>Category</option>
                                <?php
                                if ($data['categorylist']) {
                                    foreach ($data['categorylist'] as $val) {
                                        ?>
                                <option <?= isset($_POST['category_id']) == $val['id']? 'selected' :''?> value="<?= $val['id'] ?>"><?= $val['category_name'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <?php
                            if (isset($data['category_id'])) {
                                ?>
                                <div class="error"><?= $data['category_id'] ?></div>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Author</label>
                        </td>
                        <td>
                            <input type="text" id="" name="author" placeholder="author" value="<?= (isset($_POST['author']) ? $_POST['author'] : '') ?>" />
                            <?php
                            if (isset($data['author'])) {
                                ?>
                                <div class="error"><?= $data['author'] ?></div>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tags</label>
                        </td>
                        <td>
                            <input type="text" id="" name="tags" placeholder="tags" value="<?= (isset($_POST['tags']) ? $_POST['tags'] : '') ?>" />
                            <?php
                            if (isset($data['tags'])) {
                                ?>
                                <div class="error"><?= $data['tags'] ?></div>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="image" />
                            <?php
                            if (isset($data['extention'])) {
                                ?>
                                <div class="error"><?= $data['extention'] ?></div>
                                <?php
                            }
                            if (isset($data['size'])) {
                                ?>
                                <div class="error"><?= $data['size'] ?></div>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea name="body" class="tinymce" rows="15" cols="40"><?= isset($_POST['body'])?$_POST['body'] :''?></textarea>
                            <?php
                            if (isset($data['body'])) {
                                ?>
                                <div class="error"><?= $data['body'] ?></div>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
