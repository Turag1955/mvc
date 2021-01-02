<?php
//echo '<pre>';
//print_r($data);
?>
<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <div class="about">
            <h2><?= $data['postdetails'][0]['title'] ?></h2>
            <h4><?= date('D-M-Y', strtotime($data['postdetails'][0]['insertdate'])) ?>, By <?= $data['postdetails'][0]['author'] ?></h4>
            <img src="./app/view/assets/frontend/images/post2.png" alt="MyImage"/>
            <p><?= $data['postdetails'][0]['body'] ?></p>
        </div>
       





