<!-- Navbar -->
    <nav class="navbar navbar-toggleable-md navbar-custom {{ Request::path() == '/' ? '' : 'fixed-top'  }}">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{route('index')}}"><img src="{{asset('upload/header/' . $headers->logo)}}" alt="" class="img-fluid" style="height:40px;"></a>
            
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Request::path() == '/' ? '#services' : route('index').'/#services'  }}">Курсы на выбор</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Request::path() == '/' ? '#plan' : route('index').'/#plan'  }}">Учебный план</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Request::path() == '/' ? '#teacher' : route('index').'/#teacher'  }}">Преподаватели</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Request::path() == '/' ? '#gallery' : route('index').'/#gallery'  }}">Галлерея</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Request::path() == '/' ? '#map' : route('index').'/#map'  }}">Где мы находимся</a>
                    </li>
                    <li class='nav-item {{{ Request::is('news') ? 'active' : ' '  }}}'>
                        <a class="nav-link" href="{{ route('news') }}">Новости</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->