<?php
    require "../config/db_connection.php";
    require "../require/common.php";





    require "layout/header.php";
?>
    <div class="content-body">

    <!-- <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div> -->

    <div class="container-fluid">
        <div class="justify-content-between d-flex mb-3">
            <h1>Students List</h1>
        </div>

        <div class="row">            
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th class="col-1">No</th>
                                    <th class="col-5">Name</th>
                                    <th class="col-2">Created at</th>
                                    <th class="col-2">Updated at</th>
                                    <th class="col-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
    require "layout/footer.php";
?>