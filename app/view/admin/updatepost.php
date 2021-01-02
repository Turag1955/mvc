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
            <form action="<?= BASE_URL ?>admin/updatepost" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                             <input type="hidden" name="id" value="<?= (isset($data['getPostById'][0]['id']))?$data['getPostById'][0]['id']:''?>" />
                             <input type="text" name="title" placeholder="Enter Post Title..." class="medium" value="<?= (isset($data['getPostById'][0]['title']) ? $data['getPostById'][0]['title'] : (isset($_POST['title'])?$_POST['title']:''))?>" />
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
                                if(isset($data['getPostById'][0]['category_id'])){
                                    $category = $data['getPostById'][0]['category_id'];
                                } else {
                                    $category = $_POST['category_id'];
                                }
                                if ($data['categorylist']) {
                                    foreach ($data['categorylist'] as $val) {
                                        ?>
                                <option <?= $category == $val['id']? 'selected' :''?> value="<?= $val['id'] ?>"><?= $val['category_name'] ?></option>
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
                            <input type="text" id="" name="author" placeholder="author" value="<?= (isset($data['getPostById'][0]['author']) ? $data['getPostById'][0]['author'] : (isset($_POST['author'])?$_POST['author']:''))?>" />
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
                            <input type="text" id="" name="tags" placeholder="tags" value="<?= (isset($data['getPostById'][0]['tags']) ? $data['getPostById'][0]['tags'] : (isset($_POST['tags'])?$_POST['tags']:''))?>" />
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
                              <div>  <img src="./app/view/assets/frontend/upload/post/<?=$data['getPostById'][0]['image']?>" width="50px" height="50px" alt="" /></div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea name="body" class="tinymce" rows="15" cols="40"><?= (isset($data['getPostById'][0]['body']) ? $data['getPostById'][0]['body'] : (isset($_POST['body'])?$_POST['body']:''))?></textarea>
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
