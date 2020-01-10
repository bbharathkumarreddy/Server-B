<?php include('top.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Commands Help</h1>
    </div>

    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card shadow mb-12" id="services">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Info</h6>
                </div>
                <div class="card-body row">
                    <div class="col-xl-12 col-md-12 mb-12">
                        <div>
                            <p class="text-dark mb-0">Gives current process info</p>
                            <h6><small><kbd class="exe">top</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd class="exe">htop</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0">Creates a folder</p>
                            <h6><small><kbd>top</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd>htop</kbd></small></h6>
                            <hr>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Info Modal-->
<div class="modal fade" id="info_modal" tabindex="-1" role="dialog" aria-labelledby="info_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-gray-100">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Information</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="info_modal_body" class="bg-white" style="width: 100%;height:100%;">

                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<?php include('bottom.php'); ?>