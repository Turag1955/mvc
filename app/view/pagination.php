<nav>
    <ul class="pagination justify-content-center">

        <?php
        $pagii = $data['pagi'];
        $currentpage = 0;

        if (isset($data['current_page'])) {
            $disabled = '';
            $currentpage = $data['current_page'];
            $next = $currentpage;
            $prev = $currentpage;
            $next++;
            $prev--;
            if ($prev == 0) {
                $disabled = 'disabled';
            } 
    
        }
        ?>
        <li class="page-item <?= $disabled ?>"><a class="page-link" href="<?= BASE_URL ?>index/home/<?= $prev ?>">Previous</a></li>
        <?php
        for ($i = 1; $i <= $pagii; $i++) {
            $class = '';
            if ($currentpage == $i) {
                $class = 'active';
            }
            ?>
            <li  class=" page-item <?= $class ?>"><a class="page-link" href="<?= BASE_URL ?>index/home/<?= $i ?>"><?= $i ?></a></li>
            <?php
        }
        ?>
        <li class=" page-item  "><a class="page-link" href="<?= BASE_URL ?>index/home/<?= $next ?>">Next</a></li>
    </ul>
</nav>


</div>