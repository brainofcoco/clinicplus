<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Rizvi">
    <meta name="keyword" content="Php, Hospital, Clinic, Management, Software, Php, CodeIgniter, Hms, Accounting">
    <link rel="shortcut icon" href="common/core-assets/logo/PLUS_CIRC_BLUE.svg">
    <title>1# EMR
        <?php
        $this->db->where('hospital_id', 'superadmin');
        echo $this->db->get('settings')->row()->system_vendor;
        ?>
    </title>
    <link rel="stylesheet" type="text/css" href="common/core-assets/login/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="common/core-assets/login/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="common/core-assets/login/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="common/core-assets/login/css/iofrm-theme4.css">
</head>
<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="#">
                <div class="logo">
                    <img class="logo-size" src="common/core-assets/logo/PLUS_CIRC_BLUE.svg" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="common/core-assets/login/images/medicine.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3> <?php
                    $this->db->where('hospital_id', 'superadmin');
                    echo $this->db->get('settings')->row()->title;
                    ?></h3>
                        <p>Powerful Affordable solutions to quality healthcare for everyone.</p>
                        <div class="page-links">
                            <a href="#" class="active">Login</a>
                            <!-- <a href="register4.html">Register</a> -->
                        </div>
                        <form method="post" action="auth/login">
                        <div id="infoMessage"><?php echo $message; ?></div>
                            <input class="form-control" type="email" name="identity" placeholder="E-mail Address" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button> <a data-toggle="modal" href="#myModal">Forget password?</a>
                            </div>
                        </form>
                        <div class="other-links">
                            <!-- <span>Or login with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="auth/forgot_password">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>

                    <div class="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <input class="btn btn-success" type="submit" name="submit" value="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="common/core-assets/login/js/jquery.min.js"></script>
<script src="common/core-assets/login/js/popper.min.js"></script>
<script src="common/core-assets/login/js/bootstrap.min.js"></script>
<script src="common/core-assets/login/js/main.js"></script>
</body>
</html>