<?php include "header.php"; ?>
    <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
            <h4 class="title text-center">Search Bar</h4>
            <div class="nav-align-center">
                <ul class="nav nav-pills nav-pills-primary" role="tablist">
                    <li class="nav-item">
                        <a id="booksTab" class="nav-link" data-toggle="tab" href="#book" role="tablist" aria-expanded="false" rel="tooltip" title="Search Books" data-placement="bottom">
                            <i class="now-ui-icons files_single-copy-04"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a id="userTab" class="nav-link" data-toggle="tab" href="#user" role="tablist" aria-expanded="false" rel="tooltip" title="Search Users" data-placement="bottom">
                            <i class="now-ui-icons sport_user-run"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Tab panes -->
        <div class="tab-content gallery">
            <div class="tab-pane" id="book" role="tabpanel" aria-expanded="false">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="row collections">
                        <?php include 'searchBooks.php';?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="user" role="tabpanel" aria-expanded="false">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="row collections">
                        <?php include 'searchUsers.php';?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script type="text/javascript">
        if(window.location.href.indexOf('booksTab') > -1){
            $('.active').removeClass('active');
            document.getElementById('booksTab').classList.add('active');
            document.getElementById('book').classList.add('active');
        }
        if(window.location.href.indexOf('userTab') > -1){
            $('.active').removeClass('active');
            document.getElementById('userTab').classList.add('active');
            document.getElementById('user').classList.add('active');
        }

        $("#booksTab").click(function() {
            window.location="search.php#booksTab";
        });
        $("#userTab").click(function() {
            window.location="search.php#userTab";
        });
       
    </script>
<?php include "footer.php"; ?>