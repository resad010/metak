<?php
$title = 'Post'.$post['id'];
include "layouts/header.php";
?>
    <div class="container p-5">
        <form method="post" enctype="multipart/form-data" action="/posts">
            <img src="../<?=$post['image'] ?>" height="400px">
            <h1><?=$post['title'] ?></h1>
            <p><?=$post['text'] ?></p>

        </form>
    </div>
<?php
include "layouts/footer.php";
?>