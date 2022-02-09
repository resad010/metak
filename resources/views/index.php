<?php
$title = 'Main page';
include "layouts/header.php";
?>
<body>
    <div class="container p-5">
        <a class="btn btn-primary btn-lg mb-5 w-100" href="posts/create" role="button">Add post</a>
        <div class="row">
            <?php
            while($row = mysqli_fetch_assoc($post)){?>
                    <div class="card p-3 m-2" style="width: 18rem;min-height: 10rem">
                        <label>Enter password for card</label>
                        <input class="form-control mt-2 card-password" post_id="<?=$row['id'] ?>" type="password" name="password">
                    </div>
                <?php
            }
            ?>
        </div>
        <?php include 'includes/pagination.php' ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    </body>
<script>
    $(".card-password").on('keyup',function (){
        id = $(this).attr('post_id');
        item = $(this);
        password = $(this).val()
        $.ajax({
            url: 'posts/'+id+'/ajax',
            type: 'POST',
            data: {
                "password": password,
            },
            success: function (result) {
                if(!result.valid){
                    item.closest(".card").html(result)
                }
            },
            error: function (response) {

            },
        });
    })
</script>
<?php
include "layouts/footer.php";
?>