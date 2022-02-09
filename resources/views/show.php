<?php
$title = 'Detail';
include "layouts/header.php";
?>
    <body>
    <div class="container p-5">
        <form action="" method="post">
            <input type="password" name="password" class="form-control" placeholder="password">
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
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