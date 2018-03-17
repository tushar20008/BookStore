<?php include "header.php"; ?>
    <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
            <h4 class="title text-center">Search Bar</h4>
            <div class="nav-align-center">
                <ul class="nav nav-pills nav-pills-primary" role="tablist">
                    <li class="nav-item">
                        <a id="addTab" class="nav-link" data-toggle="tab" href="#user" role="tablist" aria-expanded="false" rel="tooltip" title="Search Users" data-placement="bottom">
                            <i class="now-ui-icons ui-1_simple-add"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a id="pendingTab" class="nav-link" data-toggle="tab" href="#book" role="tablist" aria-expanded="false" rel="tooltip" title="Search Books" data-placement="bottom">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Tab panes -->
        <div class="tab-content gallery">
            <?php include "return.php"; ?>
            <?php include "add.php"; ?>
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
<?php include "footer.php"; ?>