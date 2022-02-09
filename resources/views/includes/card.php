<img src="<?= $post['image'] ?>" class="card-img-top" alt="">
<div class="card-body">
    <h1 class="card-title"><?=$post['title'] ?></h1>
    <h6 class="card-title"><?=$post['created_at']?></h6>
    <a href="posts/<?=$post['id'] ?>" class="btn btn-primary">Go</a>
</div>
