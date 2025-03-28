<?php include("header.php"); ?>

<div class="nk-content">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-sub">
                </div>
                <div class="nk-block-between-md g-4 card-bordered">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title fw-normal">SMTP Settings.</h4>
                        <div class="nk-block-des">
                            <p>
                            </p>
                        </div>
                    </div>
                    <div class="nk-block-head-content">
                        <ul class="nk-block-tools gx-3">
                            <li><a onclick="window.history.go(-1);" class="btn btn-primary"><span>Back</span> <em
                                        class="icon ni ni-arrow-left"></em></a></li>
                            <li><a href="fund_user" class="btn btn-success"><span>Fund an account</span> <em
                                        class="icon ni ni-invest"></em></a></li>
                        </ul>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
        </div>
    </div>


    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Email configuration</h4>
                <div class="nk-block-des">
                </div>
            </div>
        </div>
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-head">
                    <h5 class="card-title">Email Setting</h5>
                </div>
                <form action="#" class="gy-3">
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">SMTP host</label>
                                <span class="form-note">Specify your smtp Host. (e.g gmail.com)</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="host" value="<?php echo $smtp_host ?>"
                                        name="host">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Username</label>
                                <span class="form-note">Specify the username of your SMTP. (eg.
                                    admin@example.com).</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="username"
                                        value="<?php echo $smtp_username ?>" name="username">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <span class="form-note">Specify the password of your SMTP.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="password"
                                        value="<?php echo $smtp_password ?>" name="password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">SMTP</label>
                                <span class="form-note">SMTP authentication (TLS/SSL).</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="auth" value="<?php echo $smtp_auth ?>"
                                        name="auth">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Port</label>
                                <span class="form-note">Specify your smtp port.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="port" value="<?php echo $smtp_port ?>"
                                        name="port">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Display Name</label>
                                <span class="form-note">Specify the Name that your mail will be displayed with.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" value="<?php echo $display_name ?>"
                                        name="name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-7 offset-lg-5">
                            <div class="updateResult"></div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-lg btn-primary emailBtn">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- card -->
    </div><!-- .nk-block -->
</div><!-- .components-preview -->
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.emailBtn').on('click', function () {
            var $this = $(this);
            var loadingText = '<i class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></i>&nbsp;Processing...';
            if ($(this).html() !== loadingText) {
                $this.data('original-text', $(this).html());
                $this.html(loadingText);
            }
            setTimeout(function () {
                $this.html($this.data('original-text'));
            }, 2000);
        });
    })
    $(document).ready(function () {
        $('.emailBtn').click(function (e) {
            e.preventDefault();
            var host = $('#host').val();
            var username = $('#username').val();
            var port = $('#port').val();
            var auth = $('#auth').val();
            var password = $('#password').val();
            var name = $('#name').val();
            $.ajax
                ({
                    type: "POST",
                    url: "../scripts/update_smtp",
                    data: { "host": host, "username": username, "port": port, "auth": auth, "name": name, "password": password },
                    success: function (data) {
                        $('.updateResult').html(data);
                        $('#form')[0].reset();
                    }
                });
        });
    });
</script>
<?php include("footer.php") ?>