<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bitfumes Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  {{--<link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}">--}}
  {{--<!-- Font Awesome -->--}}
  {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">--}}
  {{--<!-- Ionicons -->--}}
  {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">--}}
  <!-- Theme style -->
  {{--<link rel="stylesheet" href="{{asset('admin/dist/css/AdminLTE.min.css')}}">--}}
  {{--<!-- iCheck -->--}}
  {{--<link rel="stylesheet" href="{{asset('admin/plugins/iCheck/square/blue.css')}}">--}}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
  <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
  <![endif]-->
  <style>
    @import url('https://rsms.me/inter/inter-ui.css');
    ::selection {
      background: #2D2F36;
    }
    ::-webkit-selection {
      background: #2D2F36;
    }
    ::-moz-selection {
      background: #2D2F36;
    }
    body {
      background: white;
      font-family: 'Inter UI', sans-serif;
      margin: 0;
    }
    .page {
      background: #e2e2e5;
      display: flex;
      flex-direction: column;
      height: 100%;
      position: absolute;
      place-content: center;
      width: 100%;
    }
    @media (max-width: 767px) {
      .page {
        height: auto;
        margin-bottom: 20px;
        padding-bottom: 20px;
      }
    }
    .container {
      display: flex;
      height: 320px;
      margin: 0 auto;
      width: 640px;
    }
    @media (max-width: 767px) {
      .container {
        flex-direction: column;
        height: 630px;
        width: 320px;
      }
    }
    .left {
      background: white;
      height: calc(100% - 40px);
      top: 20px;
      position: relative;
      width: 50%;
    }
    @media (max-width: 767px) {
      .left {
        height: 100%;
        left: 20px;
        width: calc(100% - 40px);
        max-height: 270px;
      }
    }
    .login {
      font-size: 50px;
      font-weight: 900;
      margin: 50px 40px 40px;
    }
    .eula {
      color: #999;
      font-size: 14px;
      line-height: 1.5;
      margin: 40px;
    }
    .right {
      background: #474A59;
      box-shadow: 0px 0px 40px 16px rgba(0,0,0,0.22);
      color: #F1F1F2;
      position: relative;
      width: 50%;
    }
    @media (max-width: 767px) {
      .right {
        flex-shrink: 0;
        height: 100%;
        width: 100%;
        max-height: 350px;
      }
    }
    svg {
      position: absolute;
      width: 320px;
    }
    path {
      fill: none;
      stroke: url(#linearGradient);;
      stroke-width: 4;
      stroke-dasharray: 240 1386;
    }
    .form {
      margin: 40px;
      position: absolute;
    }
    label {
      color:  #c2c2c5;
      display: block;
      font-size: 14px;
      height: 16px;
      margin-top: 20px;
      margin-bottom: 5px;
    }
    input {
      background: transparent;
      border: 0;
      color: #f2f2f2;
      font-size: 20px;
      height: 30px;
      line-height: 30px;
      outline: none !important;
      width: 100%;
    }
    input::-moz-focus-inner {
      border: 0;
    }
    #submit {
      color: #707075;
      margin-top: 40px;
      transition: color 300ms;
    }
    #submit:focus {
      color: #f2f2f2;
    }
    #submit:active {
      color: #d0d0d2;
    }

  </style>
</head>
<body>
{{--<div class="login-box">--}}
  {{--<div class="login-logo">--}}
    {{--<a href="../../index2.html"><b>Admin</b> Bitfumes</a>--}}
  {{--</div>--}}

  {{--<div class="login-box-body">--}}
    {{--<p class="login-box-msg">Sign in to start your session</p>--}}
    {{----}}
    {{--@include('includes.messages')--}}
    {{----}}
    {{--<form action="{{ route('admin.login') }}" method="post">--}}
    {{--{{ csrf_field() }}--}}
      {{--<div class="form-group has-feedback">--}}
        {{--<input type="email" class="form-control" name="email" placeholder="Email">--}}
        {{--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>--}}
      {{--</div>--}}
      {{--<div class="form-group has-feedback">--}}
        {{--<input type="password" class="form-control" name="password" placeholder="Password">--}}
        {{--<span class="glyphicon glyphicon-lock form-control-feedback"></span>--}}
      {{--</div>--}}
      {{--<div class="row">--}}
        {{--<div class="col-xs-8">--}}
          {{--<div class="checkbox icheck">--}}
            {{--<label>--}}
              {{--<input type="checkbox"> Remember Me--}}
            {{--</label>--}}
          {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-xs-4">--}}
          {{--<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>--}}
        {{--</div>--}}

      {{--</div>--}}
    {{--</form>--}}

    {{--<a href="#">I forgot my password</a><br>--}}

  {{--</div>--}}

{{--</div>--}}

@include('includes.messages')

<div class="page">
  <div class="container">
    <div class="left">
      <div class="login">Вход</div>
      <div class="eula">Войдя в систему, вы соглашаетесь с смехотворно длинными терминами, которые вы не удосужились прочитать</div>
    </div>
    <div class="right">
      <svg viewBox="0 0 320 300">
        <defs>
          <linearGradient
                  inkscape:collect="always"
                  id="linearGradient"
                  x1="13"
                  y1="193.49992"
                  x2="307"
                  y2="193.49992"
                  gradientUnits="userSpaceOnUse">
            <stop
                    style="stop-color:#ff00ff;"
                    offset="0"
                    id="stop876" />
            <stop
                    style="stop-color:#ff0000;"
                    offset="1"
                    id="stop878" />
          </linearGradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
      </svg>
      <form action="{{ route('admin.login') }}" method="post" novalidate autocomplete="off">
        {{ csrf_field() }}
        <div class="form">
          <label for="email">Почта</label>
          <input type="text" id="email" name="email" AUTOCOMPLETE="off">
          <label for="password">Пароль</label>
          <input type="password" id="password" name="password" AUTOCOMPLETE="off">
          <input type="submit" id="submit" value="Войти">
        </div>
      </form>
    </div>
  </div>
</div>




<!-- jQuery 2.2.3 -->
<script src="{{ asset('admin/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js"></script>
{{--<!-- Bootstrap 3.3.6 -->--}}
{{--<script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>--}}
{{--<!-- iCheck -->--}}
{{--<script src="{{ asset('admin/plugins/iCheck/icheck.min.js') }}"></script>--}}
<script>
  var current = null;
  document.querySelector('#email').addEventListener('focus', function(e) {
      if (current) current.pause();
      current = anime({
          targets: 'path',
          strokeDashoffset: {
              value: 0,
              duration: 700,
              easing: 'easeOutQuart'
          },
          strokeDasharray: {
              value: '240 1386',
              duration: 700,
              easing: 'easeOutQuart'
          }
      });
  });
  document.querySelector('#password').addEventListener('focus', function(e) {
      if (current) current.pause();
      current = anime({
          targets: 'path',
          strokeDashoffset: {
              value: -336,
              duration: 700,
              easing: 'easeOutQuart'
          },
          strokeDasharray: {
              value: '240 1386',
              duration: 700,
              easing: 'easeOutQuart'
          }
      });
  });
  document.querySelector('#submit').addEventListener('focus', function(e) {
      if (current) current.pause();
      current = anime({
          targets: 'path',
          strokeDashoffset: {
              value: -730,
              duration: 700,
              easing: 'easeOutQuart'
          },
          strokeDasharray: {
              value: '530 1386',
              duration: 700,
              easing: 'easeOutQuart'
          }
      });
  });
</script>
</body>
</html>
