<?php include "header.php"; ?>
    <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
            <h4 id="bookBar" class="title text-center">Bookbar</h4>
            <div class="nav-align-center">
                <ul class="nav nav-pills nav-pills-primary" role="tablist">
                    <li class="nav-item">
                        <a id="addTab" class="nav-link" data-toggle="tab" href="#add" role="tablist" aria-expanded="false" rel="tooltip" title="Add Books" data-placement="bottom">
                            <i class="now-ui-icons ui-1_simple-add"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a id="pendingTab" class="nav-link" data-toggle="tab" href="#pending" role="tablist" aria-expanded="false" rel="tooltip" title="Pending Books" data-placement="bottom">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a id="returnTab" class="nav-link" data-toggle="tab" href="#return" role="tablist" aria-expanded="true" rel="tooltip" title="Return Books" data-placement="bottom">
                            <i class="now-ui-icons shopping_box"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Tab panes -->
        <div class="tab-content gallery">
            <?php include "return.php"; ?>
            <?php include "add.php"; ?>
            <div class="tab-pane" id="add" role="tabpanel" aria-expanded="false">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="row collections">
                        <?php include 'addBooks.php';?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="pending" role="tabpanel" aria-expanded="false">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="row collections">
                        <?php include 'pendingBooks.php';?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="return" role="tabpanel" aria-expanded="true">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="row collections">
                        <?php include 'returnBooks.php';?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        if(window.location.href.indexOf('returnTab') > -1){
            $('.active').removeClass('active');
            document.getElementById('returnTab').classList.add('active');
            document.getElementById('return').classList.add('active');
        }
        if(window.location.href.indexOf('addTab') > -1){
            $('.active').removeClass('active');
            document.getElementById('addTab').classList.add('active');
            document.getElementById('add').classList.add('active');
        }
        if(window.location.href.indexOf('pendingTab') > -1){
            $('.active').removeClass('active');
            document.getElementById('pendingTab').classList.add('active');
            document.getElementById('pending').classList.add('active');
        }

        $("#addTab").click(function() {
            window.location="books.php#addTab";
        });
        $("#pendingTab").click(function() {
            window.location="books.php#pendingTab";
        });
        $("#returnTab").click(function() {
            window.location="books.php#returnTab";
        });
    </script>
<?php include "footer.php"; ?>

