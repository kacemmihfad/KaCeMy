<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- Basic page needs -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <title>Login</title>
        <!-- fevicon -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="/dist/modules/core/common/img/favicon.ico" rel="shortcut icon">
<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">


    <!-- VENDORS -->
    <!-- v2.0.0 -->
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/bootstrap/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/perfect-scrollbar/css/perfect-scrollbar.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/ladda//dist/ladda-themeless.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/bootstrap-select//dist/css/bootstrap-select.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/select2//dist/css/select2.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/fullcalendar//dist/fullcalendar.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/bootstrap-sweetalert//dist/sweetalert.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/summernote//dist/summernote.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/owl.carousel//dist/assets/owl.carousel.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/ionrangeslider/css/ion.rangeSlider.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/datatables/media/css/dataTables.bootstrap4.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/c3/c3.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/chartist//dist/chartist.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/nprogress/nprogress.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/jquery-steps/demo/css/jquery.steps.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/dropify//dist/css/dropify.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/font-linearicons/style.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/font-icomoon/style.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/font-awesome/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/cleanhtmlaudioplayer/src/player.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/vendors/cleanhtmlvideoplayer/src/player.css') !!}">
    <script src="{!! asset('/dist/vendors/jquery//dist/jquery.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/popper.js//dist/umd/popper.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/jquery-ui/jquery-ui.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/bootstrap/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/jquery-mousewheel/jquery.mousewheel.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/perfect-scrollbar/js/perfect-scrollbar.jquery.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/spin.js/spin.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/ladda//dist/ladda.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/bootstrap-select//dist/js/bootstrap-select.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/select2//dist/js/select2.full.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/html5-form-validation//dist/jquery.validation.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/jquery-typeahead//dist/jquery.typeahead.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/jquery-mask-plugin//dist/jquery.mask.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/autosize//dist/autosize.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/bootstrap-show-password/bootstrap-show-password.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/moment/min/moment.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/fullcalendar//dist/fullcalendar.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/bootstrap-sweetalert//dist/sweetalert.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/remarkable-bootstrap-notify//dist/bootstrap-notify.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/summernote//dist/summernote.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/owl.carousel//dist/owl.carousel.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/ionrangeslider/js/ion.rangeSlider.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/nestable/jquery.nestable.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/datatables/media/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/datatables/media/js/dataTables.bootstrap4.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/datatables-fixedcolumns/js/dataTables.fixedColumns.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/datatables-responsive/js/dataTables.responsive.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/editable-table/mindmup-editabletable.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/d3/d3.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/c3/c3.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/chartist//dist/chartist.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/peity/jquery.peity.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/chartist-plugin-tooltip//dist/chartist-plugin-tooltip.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/jquery-countTo/jquery.countTo.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/nprogress/nprogress.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/jquery-steps/build/jquery.steps.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/chart.js//dist/Chart.bundle.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/dropify//dist/js/dropify.min.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/cleanhtmlaudioplayer/src/jquery.cleanaudioplayer.js') !!}"></script>
    <script src="{!! asset('/dist/vendors/cleanhtmlvideoplayer/src/jquery.cleanvideoplayer.js') !!}"></script>

    <!-- CLEAN UI ADMIN TEMPLATE MODULES-->
    <!-- v2.0.0 -->
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/modules/core/common/core.cleanui.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/modules/vendors/common/vendors.cleanui.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/modules/layouts/common/layouts-pack.cleanui.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/modules/themes/common/themes.cleanui.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/modules/menu-left/common/menu-left.cleanui.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/modules/menu-right/common/menu-right.cleanui.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/modules/top-bar/common/top-bar.cleanui.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/modules/footer/common/footer.cleanui.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/modules/pages/common/pages.cleanui.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/modules/ecommerce/common/ecommerce.cleanui.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/dist/modules/apps/common/apps.cleanui.css') !!}">
    <script src="{!! asset('/dist/modules/menu-left/common/menu-left.cleanui.js') !!}"></script>
    <script src="{!! asset('/dist/modules/menu-right/common/menu-right.cleanui.js') !!}"></script>
        
    </head>
	<body class="cat__pages__login">
<!-- START: pages/login -->
<div class="cat__pages__login cat__pages__login--fullscreen" style="background-image: url(dist/modules/pages/common/img/login/1.jpg)">
    <div class="cat__pages__login__block">
        <div class="row">
            <div class="col-xl-12">
                 
                <div class="cat__pages__login__block__inner">
                <h2 align="center" class="mb-3">
                        <strong  style="color:black"><b style="color:#0190fe">S</b>.<b style="color:#0190fe">IE</b>tudiant</strong></br>
                        <b style="color:black"><b style="color:#0190fe">U</b>niversité <b style="color:#0190fe">C</b>houaib <b style="color:#0190fe">D</b>oukkali</b>
                    </h2>
                    <div class="cat__pages__login__block__form">
                       <br />
						@if(session()->has('erreurAuth'))
							<div class="don-t-print alert alert-danger alert-dismissible">
								<button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
								<h4><i class="icon fa fa-ban"></i> Alert!</h4>
								<p>{{ session()->get('erreurAuth') }}</p>
							</div>
						@endif
                        <form id="form-validation" name="form-validation" method="POST" action="{{ url('Home') }}">
						@csrf
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input id="validation-email"
                                       class="form-control"
                                       placeholder="Email"
                                       name="login"
                                       type="text"
                                        >
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input id="validation-password"
                                       class="form-control password"
                                       name="pwd"
                                       type="password"  
                                       placeholder="Password">
                            </div>
                            
                            <div align="center" class="form-actions">
                                <button type="submit" class="btn btn-primary mr-3" name="login" value="login">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
</div>
<!-- END: pages/login-alpha -->

<!-- START: page scripts -->
<script>
    $(function() {

        // Form Validation
        $('#form-validation').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-control-error',
                    errorClass: 'has-danger'
                }
            }
        });

        // Show/Hide Password
        $('.password').password({
            eyeClass: '',
            eyeOpenClass: 'icmn-eye',
            eyeCloseClass: 'icmn-eye-blocked'
        });
        /*
        // Change BG
        var min = 1, max = 5,
            next = Math.floor(Math.random()*max) + min,
            final = next > max ? min : next;
        $('.random-bg-image').data('img', final);
        $('.cat__pages__login').data('img', final).css('backgroundImage', 'url(dist/modules/pages/common/img/login/' + final + '.jpg)');
    */
    });
</script>
<!-- END: page scripts -->
</body>
</html>