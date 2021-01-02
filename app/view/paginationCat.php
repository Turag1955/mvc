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
            $concetNext = $data['category_id'] . ',' . $next;
            $nexPath = BASE_URL . "index/catbypost/" . urlencode(serialize($concetNext));

            $concetPrev = $data['category_id'] . ',' . $prev;
            $prevPath = BASE_URL . "index/catbypost/" . urlencode(serialize($concetPrev));

            if ($prev == 0) {
                $disabled = 'disabled';
            }
        }
        ?>
        <li class="page-item <?= $disabled ?>"><a class="page-link" href="<?= $prevPath ?>">Previous</a></li>
        <?php
        for ($i = 1; $i <= $pagii; $i++) {
            $concet = $data['category_id'] . ',' . $i;
            $path = BASE_URL . "index/catbypost/" . urlencode(serialize($concet));
            $class = '';
            if ($currentpage == $i) {
                $class = 'active';
            }
            ?>
            <li  class=" page-item <?= $class ?>"><a class="page-link" href="<?= $path ?>"><?= $i ?></a></li>
            <?php
        }
        ?>
        <li class=" page-item  "><a class="page-link" href="<?= $nexPath ?>">Next</a></li>
    </ul>
</nav>


</div>