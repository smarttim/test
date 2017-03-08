<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>网站系统管理员登录</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('backend/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('backend/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/css/style-responsive.css')}}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="" method="post">
        {{csrf_field()}}
        <h2 class="form-signin-heading">登录</h2>
        <div class="login-wrap">
            <input type="text" name="name" class="form-control" placeholder="账号" value="{{ old('name') }}" autofocus>
            <input type="password" name="password" class="form-control" placeholder="密码">
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> 记住登录
                <span class="pull-right"> <a href="#"> 忘记密码?</a></span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
            <p>或者您可以通过以下方式联系开发者</p>
            @if(session('msg'))
            <div class="alert alert-block alert-danger fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                {{session('msg')}}
            </div>
            @endif
            <div class="login-social-link">
                <a href="index.html" class="facebook">
                    <i class="icon-user-md"></i>
                    开发人员
                </a>
                <a href="index.html" class="twitter">
                    <i class=" icon-unlink"></i>
                    官网
                </a>
            </div>

        </div>

      </form>

    </div>


  </body>
</html>
