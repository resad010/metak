<?php
$title = 'Add post';
include "layouts/header.php";
?>
    <div class="container p-5">
        <form method="post" enctype="multipart/form-data" action="/posts">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Title" name="title" required>
            </div>

            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>

            <label for="basic-url" class="form-label">Image</label>
            <div class="input-group mb-3">
                <input type="file" name="image" class="form-control">
            </div>

            <label for="basic-url" class="form-label">Text</label>
            <div class="input-group">
                <textarea class="form-control" aria-label="With textarea" name="text" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-5">Primary</button>
        </form>
    </div>
<?php
include "layouts/footer.php";
?>