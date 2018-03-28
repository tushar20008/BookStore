<h3 class="title">Add New Books</h3>
<div class="card card-signup" data-background-color="orange">
    <form class="form" enctype="multipart/form-data" method="post" action="">
        <div class="header text-center">
            <h4 class="title title-up">Book Information</h4>
        </div>
        <div class="card-body">
            <div class="input-group form-group-no-border">
                <img class="photo-container rounded img-raised" src=<?php echo '../assets/img/books/default-book.jpg';?> alt="book image">
            </div>
            <div class="input-group form-group-no-border">
                <input class="btn btn-primary btn-round" type="file" name="image">
            </div>
            <div class="input-group form-group-no-border">
                <span class="input-group-addon" style='color: black'>Book Code :</span>
                <input type="text" id="bookCode" class="form-control" name ="bookCode" value="">
            </div>
            <div class="input-group form-group-no-border">
                <span class="input-group-addon" style='color: black'>Title :</span>
                <input type="text" id="title" value="" name="title" class="form-control">
            </div>
            <div class="input-group form-group-no-border">
                <span class="input-group-addon" style='color: black'>Author :</span>
                <input type="text" id="author" value="" name ="author" class="form-control">
            </div>
            <div class="input-group form-group-no-border">
                <span class="input-group-addon" style='color: black'>Quantity :</span>
                <input type="text" id="qty" value="" name ="qty" class="form-control">
            </div>
        </div>
        <div class="footer text-center">
            <button id="edit" class="btn btn-neutral btn-round btn-lg" name="submit">Add</button>
        </div>
    </form>
</div>