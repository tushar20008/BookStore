<?php include "header.php"; ?>
    <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
            <h4 class="title text-center">Bookbar</h4>
            <div class="nav-align-center">
                <ul class="nav nav-pills nav-pills-primary" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#add" role="tablist" aria-expanded="false" rel="tooltip" title="Add Books" data-placement="bottom">
                            <i class="now-ui-icons ui-1_simple-add"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#pending" role="tablist" aria-expanded="false" rel="tooltip" title="Pending Books" data-placement="bottom">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#return" role="tablist" aria-expanded="true" rel="tooltip" title="Return Books" data-placement="bottom">
                            <i class="now-ui-icons shopping_box"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Tab panes -->
        <div class="tab-content gallery">
            <?php include "return.php"; ?>
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
            <div class="tab-pane active" id="return" role="tabpanel" aria-expanded="true">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="row collections">
                        <?php include 'returnBooks.php';?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "footer.php"; ?>