<!DOCTYPE html>
<html lang="en" <?php
if (!$this->ion_auth->in_group(array('superadmin'))) {
    $this->db->where('hospital_id', $this->hospital_id);
    $settings_lang = $this->db->get('settings')->row()->language;
    if ($settings_lang == 'arabic') {
        ?>     
              dir="rtl"
          <?php } else { ?>
              dir="ltr"
              <?php
          }
      } else {
          $this->db->where('hospital_id', 'superadmin');
          $settings_lang = $this->db->get('settings')->row()->language;
          if ($settings_lang == 'arabic') {
              ?>
              dir="rtl"     
          <?php } else { ?> 
              dir="ltr"
              <?php
          }
      }
    ?>>

<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Clinic Plus">
    <meta name="keyword" content="EMR, Hospital, Clinic, Management, Software, Hms, Accounting">
    <link rel="shortcut icon" href="uploads/favicon.png">
    <title><?php echo $this->router->fetch_class(); ?> | 
            <?php
            if ($this->ion_auth->in_group(array('superadmin'))) {
                $this->db->where('hospital_id', 'superadmin');
            } else {
                $this->db->where('hospital_id', $this->hospital_id);
            }
            ?>
            <?php
            echo $this->db->get('settings')->row()->system_vendor;
        ?>  
    </title>

    <!-- BOOTSTRAP CORE CSS -->
    <link rel="stylesheet" href="common/core-assets/core/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="common/core-assets/core/css/vendor/bootstrap.rtl.only.min.css" />

    <!-- EXTERNAL CSS -->
    <link href="common/assets/DataTables/datatables.min.css" rel="stylesheet" />
    <link href="common/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />


    <link rel="stylesheet" href="common/core-assets/core/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="common/core-assets/core/font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="common/core-assets/core/css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="common/core-assets/core/css/vendor/perfect-scrollbar.css" />

    <!-- CUSTOM STYLES FOR THIS TEMPLATE -->
    <link rel="stylesheet" href="common/core-assets/core/css/main.css" />
    <link rel="stylesheet" href="common/core-assets/core/css/dore.light.bluenavy.min.css" />

    <!-- INBUILT -->
     <!-- <link href="common/css/style.css" rel="stylesheet"> -->
    <!-- <link href="common/css/style-responsive.css" rel="stylesheet" />    -->
    <link rel="stylesheet" href="common/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-timepicker/compiled/timepicker.css">
    <link rel="stylesheet" type="text/css" href="common/assets/jquery-multi-select/css/multi-select.css" />
    <link href="common/css/invoice-print.css" rel="stylesheet" media="print">
    <link href="common/assets/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="common/assets/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" /> 

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
    <![endif]-->

    <?php
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            if ($settings_lang == 'arabic') {
                ?>
                <style>
                    #main-content {
                        margin-right: 211px;
                        margin-left: 0px; 
                    }

                    body {
                        background: #f1f1f1;

                    }
                </style>

                <?php
            }
        } else {
            if ($settings_lang == 'arabic') {
                ?>
                <style>
                    #main-content {
                        margin-right: 211px;
                        margin-left: 0px; 
                    }

                    body {
                        background: #f1f1f1;

                    }
                </style>

                <?php
            }
        }
    ?>

</head>





<body id="app-container" class="menu-default show-spinner">
    <nav class="navbar fixed-top">
        <div class="d-flex align-items-center navbar-left">
            <a href="#" class="menu-button d-none d-md-block">
                <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg>
                <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg>
            </a>

            <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                    <rect x="0.5" y="0.5" width="25" height="1" />
                    <rect x="0.5" y="7.5" width="25" height="1" />
                    <rect x="0.5" y="15.5" width="25" height="1" />
                </svg>
            </a>

            <div class="search" data-search-path="Pages.Search.html?q=">
                <input placeholder="Search...">
                <span class="search-icon">
                    <i class="simple-icon-magnifier"></i>
                </span>
            </div>

                <!-- <a class="btn btn-sm btn-outline-primary ml-3 d-none d-md-inline-block"
                    href="#">&nbsp;BUY&nbsp;</a> -->
        </div>

        <!-- WORK HERE ON THE LOGO DISPLAY -->
        <a class="" href="#">
        <?php
                if (!$this->ion_auth->in_group(array('superadmin'))) {
                    $this->db->where('hospital_id', $this->hospital_id);
                    $settings_title = $this->db->get('settings')->row()->title;
                    $settings_title = explode(' ', $settings_title);
                    ?>
                    <a href="" class="logo">
                        <strong>
                            <?php echo $settings_title[0]; ?><span><?php
                                if (!empty($settings_title[1])) {
                                    echo $settings_title[1];
                                }
                                ?></span>
                        </strong>
                    </a>
 
                <?php } else { ?>

                    <a href="" class="">
                        <strong>
                            Clinic
                            <span>
                                Plus
                            </span>
                        </strong>
                    </a>

                <?php } ?>
            <!-- <span class="logo d-none d-xs-block"></span>
            <span class="logo-mobile d-block d-xs-none"></span> -->
        </a>

        <div class="navbar-right">
            <div class="header-icons d-inline-block align-middle">
                <div class="d-none d-md-inline-block align-text-bottom mr-3">
                        <!-- <div class="custom-switch custom-switch-primary-inverse custom-switch-small pl-1" 
                            data-toggle="tooltip" data-placement="left" title="Dark Mode">
                            <input class="custom-switch-input" id="switchDark" type="checkbox" checked>
                            <label class="custom-switch-btn" for="switchDark"></label>
                        </div>   -->
                </div>

                <!--    WORK ON THIS PAGE FOR TABS -->
                
                <!-- <div class="position-relative d-none d-sm-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="iconMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-grid"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3  position-absolute" id="iconMenuDropdown">
                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-equalizer d-block"></i>
                            <span>Settings</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-male-female d-block"></i>
                            <span>Users</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-puzzle d-block"></i>
                            <span>Components</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-bar-chart-4 d-block"></i>
                            <span>Profits</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-file d-block"></i>
                            <span>Surveys</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-suitcase d-block"></i>
                            <span>Tasks</span>
                        </a>

                    </div>
                </div> -->

                <!-- NOTIFICATION PAGE 1ST BED AVAILABLE -->
                <!-- 1 -->

                <!-- Bed Notification start -->
                <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse'))) { ?> 
                <?php if (in_array('bed', $this->modules)) { ?>
                <div class="position-relative d-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="notificationButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-hdd-o"></i>
                        <span class="count">
                            <!-- ARROW COUNTER -->
                        <?php
                        $this->db->where('hospital_id', $this->hospital_id);
                        $query = $this->db->get('bed')->result();
                        $available_bed = 0;
                        foreach ($query as $bed) {
                            $last_a_time = explode('-', $bed->last_a_time);
                            $last_d_time = explode('-', $bed->last_d_time);
                            if (!empty($last_d_time[1])) {
                                $last_d_h_am_pm = explode(' ', $last_d_time[1]);
                                $last_d_h = explode(':', $last_d_h_am_pm[1]);
                                if ($last_d_h_am_pm[2] == 'AM') {
                                    $last_d_m = ($last_d_h[0] * 60 * 60) + ($last_d_h[1] * 60);
                                } else {
                                    $last_d_m = (12 * 60 * 60) + ($last_d_h[0] * 60 * 60) + ($last_d_h[1] * 60);
                                }
                                $last_d_time_s = strtotime($last_d_time[0]) + $last_d_m;
                                if (time() > $last_d_time_s) {
                                    $available_bed = $available_bed + 1;
                                }
                            } else {
                                $available_bed = $available_bed + 1;
                            }
                        }
                        echo $available_bed;
                        ?>
                        <!-- END ARROW COUNTER -->
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
                        <div class="scroll">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <div class="pl-3">
                                    <a href="bed/bedAllotment">
                                        <p class="font-weight-medium mb-1">
                                        <?php
                                        if (!empty($query)) {
                                            echo $available_bed;
                                        } else {
                                            $available_bed = 0;
                                            echo $available_bed;
                                        }
                                        ?> 
                                        <?php
                                        if ($available_bed <= 1) {
                                            echo lang('bed_is_available');
                                        } else {
                                            echo lang('beds_are_available');
                                        }
                                        ?>
                                        </p>
                                        <p class="text-muted mb-0 text-small">
                                        <?php
                                        if ($available_bed > 0) {
                                            echo lang('add_a_allotment');
                                        } else {
                                            echo lang('no_bed_is_available_for_allotment');
                                        }
                                        ?>
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>

                <!-- BED NOTIFICATION END -->

                <!-- 2 -->
                <!-- Payment notification start-->
                <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?> 
                <?php if (in_array('finance', $this->modules)) { ?>
                <div class="position-relative d-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="notificationButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-money"></i>
                        <span class="count">
                            <!-- counter -->
                        <?php
                        $this->db->where('hospital_id', $this->hospital_id);
                        $query = $this->db->get('payment');
                        $query = $query->result();
                        foreach ($query as $payment) {
                            $payment_date = date('y/m/d', $payment->date);
                            if ($payment_date == date('y/m/d')) {
                                $payment_number[] = '1';
                            }
                        }
                        if (!empty($payment_number)) {
                            echo $payment_number = array_sum($payment_number);
                        } else {
                            $payment_number = 0;
                            echo $payment_number;
                        }
                        ?>      
                        <!-- end counter -->
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
                        <div class="scroll">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <div class="pl-3">
                                    <a href="finance/payment">
                                        <p class="font-weight-medium mb-1">
                                        <?php
                                        echo $payment_number . ' ';
                                        if ($payment_number <= 1) {
                                            echo lang('payment_today');
                                        } else {
                                            echo lang('payments_today');
                                        }
                                        ?>
                                        </p>
                                        <p class="text-muted mb-0 text-small"><?php echo lang('see_all_payments'); ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php } ?>
                <?php } ?>
                <!-- payment notification end -->  


                <!-- 3 -->
                <!-- patient notification start-->
                <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'Nurse', 'Laboratorist'))) { ?> 
                <?php if (in_array('patient', $this->modules)) { ?>
                <div class="position-relative d-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="notificationButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        <span class="count">
                            <!-- counter -->
                            <?php
                            $this->db->where('hospital_id', $this->hospital_id);
                            $this->db->where('add_date', date('m/d/y'));
                            $query = $this->db->get('patient');
                            $query = $query->result();
                            foreach ($query as $patient) {
                                $patient_number[] = '1';
                            }
                            if (!empty($patient_number)) {
                                echo $patient_number = array_sum($patient_number);
                            } else {
                                $patient_number = 0;
                                echo $patient_number;
                            }
                            ?>
                            <!-- end counter -->
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
                        <div class="scroll">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <div class="pl-3">
                                    <a href="patient">
                                        <p class="font-weight-medium mb-1">
                                        <?php
                                        echo $patient_number . ' ';
                                        if ($patient_number <= 1) {
                                            echo lang('patient_registerred_today');
                                        } else {
                                            echo lang('patients_registerred_today');
                                        }
                                        ?> 
                                        </p>
                                        <p class="text-muted mb-0 text-small"><?php echo lang('see_all_patients'); ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
                <!-- patient notification end -->  
                <!-- end 3 -->

                <!-- 4 -->
                <!-- donor notification start-->
                <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Laboratorist', 'Patient'))) { ?> 
                <?php if (in_array('donor', $this->modules)) { ?>
                <div class="position-relative d-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="notificationButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i style="color:red;" class="fa fa-user"></i>
                        <span class="count">
                            <!-- counter -->
                            <?php
                            $this->db->where('hospital_id', $this->hospital_id);
                            $this->db->where('add_date', date('m/d/y'));
                            $query = $this->db->get('donor');
                            $query = $query->result();
                            foreach ($query as $donor) {
                                $donor_number[] = '1';
                            }
                            if (!empty($donor_number)) {
                                echo $donor_number = array_sum($donor_number);
                            } else {
                                $donor_number = 0;
                                echo $donor_number;
                            }
                            ?>
                            <!-- end counter -->
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
                        <div class="scroll">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <div class="pl-3">
                                    <a href="donor">
                                        <p class="font-weight-medium mb-1">
                                        <?php
                                                echo $donor_number . ' ';
                                                if ($donor_number <= 1) {
                                                    echo lang('donor_registerred_today');
                                                } else {
                                                    echo lang('donors_registerred_today');
                                                }
                                                ?>
                                        </p>
                                        <p class="text-muted mb-0 text-small"><?php echo lang('see_all_donors'); ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php } ?>
                <?php } ?> 
                <!-- donor notification end --> 
                <!-- end 4 -->

                <!-- 5 -->
                <!-- medicine notification start-->
                <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist', 'Doctor'))) { ?> 
                <?php if (in_array('medicine', $this->modules)) { ?>
                <div class="position-relative d-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="notificationButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-medkit"></i>
                        <span class="count">
                        <?php
                        $this->db->where('hospital_id', $this->hospital_id);
                        $this->db->where('add_date', date('m/d/y'));
                        $query = $this->db->get('medicine');
                        $query = $query->result();
                        foreach ($query as $medicine) {
                            $medicine_number[] = '1';
                        }
                        if (!empty($medicine_number)) {
                            echo $medicine_number = array_sum($medicine_number);
                        } else {
                            $medicine_number = 0;
                            echo $medicine_number;
                        }
                        ?>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
                        <div class="scroll">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <div class="pl-3">
                                    <a href="medicine">
                                        <p class="font-weight-medium mb-1">
                                        <?php
                                        echo $medicine_number . ' ';
                                        if ($medicine_number <= 1) {
                                            echo lang('medicine_registerred_today');
                                        } else {
                                            echo lang('medicines_registered_today');
                                        }
                                        ?>
                                        </p>
                                        <p class="text-muted mb-0 text-small"><?php echo lang('see_all_medicines'); ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php } ?> 
                <!-- medicine notification end -->  
                <!-- end 5 -->

                <!-- 6 -->
                <!-- report notification start-->
                <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Laboratorist', 'Nurse'))) { ?> 
                <?php if (in_array('report', $this->modules)) { ?>
                <div class="position-relative d-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="notificationButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-bell"></i>
                        <span class="count">
                        <?php
                        $this->db->where('hospital_id', $this->hospital_id);
                        $this->db->where('add_date', date('m/d/y'));
                        $query = $this->db->get('report');
                        $query = $query->result();
                        foreach ($query as $report) {
                            $report_number[] = '1';
                        }
                        if (!empty($report_number)) {
                            echo $report_number = array_sum($report_number);
                        } else {
                            $report_number = 0;
                            echo $report_number;
                        }
                        ?>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
                        <div class="scroll">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <div class="pl-3">
                                    <a href="report">
                                        <p class="font-weight-medium mb-1">
                                        <?php
                                        echo $report_number . ' ';
                                        if ($report_number <= 1) {
                                            echo lang('report_added_today');
                                        } else {
                                            echo lang('reports_added_today');
                                        }
                                        ?>
                                        </p>
                                        <p class="text-muted mb-0 text-small">
                                        <?php echo lang('see_all_reports'); ?>
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
                <!-- end 6 -->

                <!-- 7 -->
                <?php if ($this->ion_auth->in_group('Patient')) { ?> 
                <?php if (in_array('report', $this->modules)) { ?>
                <div class="position-relative d-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="notificationButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-bell"></i>
                        <span class="count">
                        <?php
                        $this->db->where('hospital_id', $this->hospital_id);
                        $query = $this->db->get('report');
                        $query = $query->result();
                        foreach ($query as $report) {
                            if ($this->ion_auth->user()->row()->id == explode('*', $report->patient)[1]) {
                                $report_number[] = '1';
                            }
                        }
                        if (!empty($report_number)) {
                            echo $report_number = array_sum($report_number);
                        } else {
                            $report_number = 0;
                            echo $report_number;
                        }
                        ?>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
                        <div class="scroll">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <div class="pl-3">
                                    <a href="report/myreports">
                                        <p class="font-weight-medium mb-1">
                                        <?php
                                        echo $report_number . ' ';
                                        if ($report_number <= 1) {
                                            echo lang('report_is_available_for_you');
                                        } else {
                                            echo lang('reports_are_available_for_you');
                                        }
                                        ?>
                                        </p>
                                        <p class="text-muted mb-0 text-small"><?php echo lang('see_your_reports'); ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  <?php } ?>
                <?php } ?>
                <!-- end 7 -->
                <!-- report notification ends-->

                <!-- END BELL -->

                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                    <i class="simple-icon-size-fullscreen"></i>
                    <i class="simple-icon-size-actual"></i>
                </button>

            </div>

            <div class="user d-inline-block">
                <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="name"><?php echo $this->ion_auth->user()->row()->username; ?></span>
                    <span>
                        <img alt="Profile Picture" src="uploads/favicon.png" />
                    </span>
                </button>

                <div class="dropdown-menu dropdown-menu-right mt-3">
                <?php if (!$this->ion_auth->in_group('admin')) { ?> 
                    <a class="dropdown-item" href="#"><?php echo lang('dashboard'); ?></a>
                <?php } ?>
                    <a class="dropdown-item" href="profile"><?php echo lang('profile'); ?></a>
                <?php if (!$this->ion_auth->in_group('admin')) { ?> 
                    <a class="dropdown-item" href="settings"><?php echo lang('settings'); ?></a>
                <?php } ?>
                    <!-- <a class="dropdown-item" href="#">History</a>
                    <a class="dropdown-item" href="#">Support</a> -->
                    <a class="dropdown-item" href="auth/logout"><?php echo lang('log_out'); ?></a>
                </div>
                <!-- ADDED THIS TO KNOW WHAT -->
                <?php
                    $message = $this->session->flashdata('feedback');
                    if (!empty($message)) {
                        ?>
                        <code class="flashmessage pull-right"> <?php echo $message; ?></code>
                    <?php } ?> 
            </div>
        </div>
    </nav>

    <!-- MENU EDIT ASIDE -->
    <div class="menu">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                    <li>
                        <a href="#dashboard">
                            <i class="iconsminds-shop-4"></i>
                            <span><?php echo lang('dashboard'); ?></span>
                        </a>
                    </li>
                    <!-- doctors -->
                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                    <?php if (in_array('doctor', $this->modules)) { ?>
                    <li>
                        <a href="#doctors">
                            <i class="fa fa-users"></i>
                            <?php echo lang('doctor'); ?>
                        </a>
                    </li>
                    <?php } ?>
                    <?php } ?>
                    <!-- end doctors -->
                    <!-- start patient -->
                    <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Nurse', 'Doctor', 'Laboratorist', 'Receptionist'))) { ?>
                    <?php if (in_array('patient', $this->modules)) { ?>
                    <li>
                        <a href="#patient">
                            <i class="fa fa-users"></i> <?php echo lang('patient'); ?>
                        </a>
                    </li>
                    <?php } ?>
                    <?php } ?>
                    <!-- end patient -->
                    <li>
                        <a href="#Schedule">
                            <i class="iconsminds-pantone"></i> Appointment
                        </a>
                    </li>
                    <li>
                        <a href="#menu">
                            <i class="iconsminds-three-arrow-fork"></i> Menu
                        </a>
                    </li>
                    <li class="active">
                        <a href="Blank.Page.html">
                            <i class="iconsminds-bucket"></i> Blank Page
                        </a>
                    </li>
                    <li>
                        <a href="https://dore-jquery-docs.coloredstrategies.com" target="_blank">
                            <i class="iconsminds-library"></i> Docs
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="sub-menu">
            <div class="scroll">
                <ul class="list-unstyled" data-link="dashboard">
                    <li>
                        <a href="home">
                            <i class="simple-icon-rocket"></i> <span class="d-inline-block">Default</span>
                        </a>
                    </li>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <?php if (in_array('department', $this->modules)) { ?>
                    <li>
                        <a href="department">
                            <i class="fa fa-sitemap"></i> <span class="d-inline-block"><?php echo lang('departments'); ?></span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php } ?>

                    <!-- <li>
                        <a href="Dashboard.Ecommerce.html">
                            <i class="simple-icon-basket-loaded"></i> <span class="d-inline-block">Ecommerce</span>
                        </a>
                    </li> -->
                    <!-- <li>
                        <a href="Dashboard.Content.html">
                            <i class="simple-icon-doc"></i> <span class="d-inline-block">Content</span>
                        </a>
                    </li> -->
                </ul>



                <ul class="list-unstyled" data-link="doctor" id="doctor">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="true"
                            aria-controls="collapseAuthorization" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Management</span>
                        </a>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="doctor">
                                        <i class="fa fa-user"></i> <span
                                            class="d-inline-block">
                                            <?php echo lang('list_of_doctors'); ?>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="appointment/treatmentReport">
                                        <i class="fa fa-money"></i> <span
                                            class="d-inline-block">
                                            <?php echo lang('treatment_history'); ?>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- add more here -->
                    <!-- end add more -->
                </ul>
                <ul class="list-unstyled" data-link="patient">
                    <li>
                        <a href="patient">
                            <i class="fa fa-user"></i> <span class="d-inline-block">
                            <?php echo lang('patient_list'); ?>
                            </span>
                        </a>
                    </li>
                    <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'Receptionist'))) { ?>
                    <li>
                        <a href="patient/patientPayments">
                            <i class="fa fa-dollar"></i> <span class="d-inline-block">
                            <?php echo lang('payments'); ?>
                            </span>
                        </a>
                    </li>
                    <?php } ?>

                    <?php if (!$this->ion_auth->in_group(array('Accountant', 'Receptionist'))) { ?>
                    <li>
                        <a href="patient/caseList">
                            <i class="fa fa-book"></i> <span class="d-inline-block">
                            <?php echo lang('case'); ?> <?php echo lang('manager'); ?>
                            </span>
                        </a>
                        <a href="patient/documents">
                            <i class="fa fa-file-text"></i> <span class="d-inline-block">
                            <?php echo lang('documents'); ?>
                            </span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>

                <!-- SCHEDULE & APPOINTMENT -->
                <ul class="list-unstyled" data-link="Schedule">
                    <!-- schedule -->
                    <?php if ($this->ion_auth->in_group(array('admin', 'Nurse', 'Receptionist'))) { ?>
                    <?php if (in_array('appointment', $this->modules)) { ?>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                            aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block"><?php echo lang('schedule'); ?></span>
                        </a>
                        <div id="collapseForms" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="schedule">
                                        <i class="fa fa-list-alt"></i> <span class="d-inline-block">
                                        <?php echo lang('all'); ?> <?php echo lang('schedule'); ?>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="schedule/allHolidays">
                                        <i class="fa fa-list-alt"></i> <span class="d-inline-block">
                                        <?php echo lang('holidays'); ?>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    <?php } ?>
                    <!-- end schedule -->

                    <!-- doctor appointment -->
                    <?php
                        if ($this->ion_auth->in_group(array('Doctor'))) {
                            ?>
                    <?php if (in_array('appointment', $this->modules)) { ?>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseDataTables" aria-expanded="true"
                            aria-controls="collapseDataTables" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block"><?php echo lang('schedule'); ?></span>
                        </a>
                        <div id="collapseDataTables" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="schedule/timeSchedule">
                                        <i class="fa fa-list-alt"></i> <span class="d-inline-block">Full
                                        <?php echo lang('all'); ?> <?php echo lang('schedule'); ?>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="schedule/holidays">
                                        <i class="fa fa-list-alt"></i> <span class="d-inline-block">
                                        <?php echo lang('holidays'); ?>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    <?php } ?>
                    <!-- end doctor appointment -->

                    <!-- start appointment -->
                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Receptionist'))) { ?>
                    <?php if (in_array('appointment', $this->modules)) { ?>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseComponents" aria-expanded="true"
                            aria-controls="collapseComponents" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">C<?php echo lang('appointment'); ?></span>
                        </a>
                        <div id="collapseComponents" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="appointment">
                                        <i class="simple-icon-bell"></i> <span class="d-inline-block"><?php echo lang('all'); ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="appointment/addNewView">
                                        <i class="fa fa-plus-circle"></i> <span class="d-inline-block"><?php echo lang('add'); ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="appointment/todays">
                                        <i class="fa fa-list-alt"></i> <span class="d-inline-block"><?php echo lang('todays'); ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="appointment/upcoming">
                                        <i class="fa fa-list-alt"></i> <span class="d-inline-block"><?php echo lang('upcoming'); ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="appointment/calendar">
                                        <i class="fa fa-list-alt"></i> <span class="d-inline-block"><?php echo lang('calendar'); ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="appointment/request">
                                        <i class="fa fa-list-alt"></i> <span class="d-inline-block"><?php echo lang('request'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    <?php } ?>
                    <!-- end appointment -->

                </ul>

                <ul class="list-unstyled" data-link="menu" id="menuTypes">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuTypes" aria-expanded="true"
                            aria-controls="collapseMenuTypes" class="rotate-arrow-icon">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Menu Types</span>
                        </a>
                        <div id="collapseMenuTypes" class="collapse show" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="Menu.Default.html">
                                        <i class="simple-icon-control-pause"></i> <span
                                            class="d-inline-block">Default</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Menu.Subhidden.html">
                                        <i class="simple-icon-arrow-left mi-subhidden"></i> <span
                                            class="d-inline-block">Subhidden</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Menu.Hidden.html">
                                        <i class="simple-icon-control-start mi-hidden"></i> <span
                                            class="d-inline-block">Hidden</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Menu.Mainhidden.html">
                                        <i class="simple-icon-control-rewind mi-hidden"></i> <span
                                            class="d-inline-block">Mainhidden</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Menu Levels</span>
                        </a>
                        <div id="collapseMenuLevel" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="#">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">Sub
                                            Level</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel2"
                                        aria-expanded="true" aria-controls="collapseMenuLevel2"
                                        class="rotate-arrow-icon collapsed">
                                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Another
                                            Level</span>
                                    </a>
                                    <div id="collapseMenuLevel2" class="collapse">
                                        <ul class="list-unstyled inner-level-menu">
                                            <li>
                                                <a href="#">
                                                    <i class="simple-icon-layers"></i> <span class="d-inline-block">Sub
                                                        Level</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuDetached" aria-expanded="true"
                            aria-controls="collapseMenuDetached" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Detached</span>
                        </a>
                        <div id="collapseMenuDetached" class="collapse">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="#">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">Sub
                                            Level</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="dont-close-menu">
                            <a href="#">
                                <i class="simple-icon-arrow-right"></i> <span class="d-inline-block">Keep Sub Open</span>
                            </a>
                        </div>
                    </li>
                </ul>
                
            </div>
        </div>
    </div>

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- <h1>Blank Page</h1>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Library</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </nav> -->
                    <div class="separator mb-5"></div>
                    <div>
                        <!-- CONTENT HERE CHECK FOOTER FOR END -->
                  