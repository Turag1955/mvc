   <div class="grid_10">

                <div class="box round first grid">
                    <h2>Add New Category</h2>
                    <?php
                    if(isset( $data['caterror']) &&  $data['caterror'] != ''){
                        ?>
                    <div class="error">
                        <span><?=$data['caterror']?></span>
                    </div>
                    <?php
                    }
                    
                    ?>
                    <div class="block copyblock"> 
                        <form action="<?=BASE_URL?>admin/categoryadd" method="post">
                            <table class="form">					
                                <tr>
                                    <td>
                                        <input type="text" name="category" placeholder="Enter Category Name..." class="medium" value="<?= (isset($_POST['category']) ? $_POST['category'] : '') ?>" required="" />
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