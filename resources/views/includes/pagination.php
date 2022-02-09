<?php
// config
$link_limit = 6; // maximum number of links (a little bit inaccurate, but will be ok for now)
$lastPage = ceil($count/5);
$currentPage = request('page') ?? 1;
?>

<?php if(($count/5) > 1){ ?>
<div class="container">
    <div class="category-pag">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item <?php echo (($currentPage == 1) ? ' disabled' : '') ?>">
                    <a class="page-link" href="?page=1"><i class="fad fa-chevron-double-left"></i></a>
                </li>
                <?php
                for ($i = 1; $i <= $lastPage; $i++){
                $half_total_links = floor($link_limit / 2);
                $from = $currentPage - $half_total_links;
                $to = $currentPage + $half_total_links;
                if ($currentPage < $half_total_links) {
                    $to += $half_total_links - $currentPage;
                }
                if ($lastPage - $currentPage < $half_total_links) {
                    $from -= $half_total_links - ($lastPage - $currentPage) - 1;
                }
                ?>
                <?php if ($from < $i && $i < $to){ ?>
                <li class="page-item <?php echo (($currentPage == $i) ? ' active ' : '') ?>">
                    <a class="page-link" href="?page=<?=$i ?>"><?=$i ?></a>
                </li>
                <?php }} ?>
                <li class="page-item <?php echo(($currentPage == $lastPage) ? ' disabled' : '')  ?>">
                    <a class="page-link" href="?page=<?=$lastPage ?>"><i class="fad fa-chevron-double-right"></i></a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<?php
}
?>
