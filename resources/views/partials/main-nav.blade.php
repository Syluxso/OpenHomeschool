<div class="global-nav">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-link nav--main--toggle" data-bs-toggle="modal" data-bs-target="#main--nav">CHOP<span class="text-muted">CRM</span></button>
            </div>
            <div class="col text-center">

            </div>
            <div class="col text-end">

            </div>
        </div>
    </div>
</div>

<!-- Full Screen Nav -->
<div class="modal fade" id="main--nav" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h6 ><a href="#" data-bs-dismiss="modal">CHOP<span class="text-muted">CRM</span></a></h6>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6 offset-md-3">
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <h6>MY ACTIVITY</h6>
                        <div class="list-group">
                            <a href="/" class="list-group-item">
                                <i class="fa fa-person-walking"></i> Start
                            </a>
                            <a href="/#" class="list-group-item">
                                <i class="fa fa-chart-simple"></i> Stats
                            </a>
                        </div>
                        <br />

                        <h6>MY ACCOUNT</h6>
                        <div class="list-group">
                            <a href="/account/update" class="list-group-item">
                                <i class="fa fa-user"></i> Update account
                            </a>
                            <a href="/logout" class="list-group-item">
                                <i class="fa fa-right-from-bracket"></i> Logout
                            </a>
                        </div>
                        <br />

                        @if(Auth::id() == 1)
                            <h6>ADMIN</h6>
                            <div class="list-group">
                                <a href="/admin/users" class="list-group-item">
                                    <i class="fa fa-users"></i> Users
                                </a>
                                <a href="/logs" class="list-group-item">
                                    <i class="fa fa-list"></i> Logs
                                </a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
