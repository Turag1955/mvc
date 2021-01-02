<?php
include "inc/header.php";


// echo '<pre>';
// print_r($data);
?>
<h3>
    <?php
  
    if (isset($data)) {
        $title = $data[0]['title'];
        $subtitle = $data[0]['subtitle'];
        $id = $data[0]['id'];
    }
    ?>

</h3>
<form action="http://localhost/mvc/index.php?url=category/userupdate" method="post">

    <table>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" required="" value="<?= isset($title)?$title :''?>" /></td>
        </tr>
        <tr>
            <td> Sub Title</td>
            <td><input type="text" name="subtitle" required="" value="<?= $subtitle ?>" /></td>
        <input type="hidden" name="id" value="<?= $id ?>" />
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="update"  /></td>
        </tr>
    </table>
</form>
<?php include "inc/footer.php"; ?>