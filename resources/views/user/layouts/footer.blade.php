<!--Footer-->
<footer class="page-footer font-small indigo pt-0">

    <!--Footer Links-->
    <div class="container">

        <!--Grid row-->
        <div class="row pt-5 mb-3 text-center d-flex justify-content-center">

            <!--Grid column-->
            <div class="col-md-2 mb-3">
                <h6 class="title font-weight-bold"><a href="{{ Request::path() == '/' ? '#services' : route('index').'/#services'  }}">Курсы на выбор</a></h6>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-2 mb-3">
                <h6 class="title font-weight-bold"><a href="{{ Request::path() == '/' ? '#plan' : route('index').'/#plan'  }}">Учебный план</a></h6>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-2 mb-3">
                <h6 class="title font-weight-bold"><a href="{{ Request::path() == '/' ? '#teacher' : route('index').'/#teacher'  }}">Преподаватели</a></h6>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-2 mb-3">
                <h6 class="title font-weight-bold"><a href="{{ Request::path() == '/' ? '#gallery' : route('index').'/#gallery'  }}">Галерея</a></h6>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-2 mb-3">
                <h6 class="title font-weight-bold"><a href="{{ Request::path() == '/' ? '#map' : route('index').'/#map'  }}">Где мы находимся</a></h6>
            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

        <hr class="rgba-white-light" style="margin: 0 15%;">

        <!--Grid row-->
        <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

            <!--Grid column-->
            <div class="col-md-8 col-12 mt-5">
                <p style="line-height: 1.7rem">
                    Муниципальное автономное образовательное учреждение "Красноярская университетская гимназия №1 Универс", г. Красноярск Красноярского края / Универс
                </p>
            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

        <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">

        <!--Grid row-->
        <div class="row pb-3">

            <!--Grid column-->
            <div class="col-md-12">

                <div class="mb-5 text-center">
                    @forelse($links as $link)
                        <a class="fb-ic" href="{{ $link->link }}" target="_blank"><i class="fa {{$link->icon}} fa-lg white-text mr-md-4"> </i></a>
                    @empty

                    @endforelse
                </div>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->

    </div>
    <!--/Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
        <div class="container-fluid">
            © 2018, Красноярская университетская гимназия №1 «Универс»
        </div>
        <div class="container-fluid" style="font-size: 12px; margin-top: 20px;">
            Powered by <a href="https://artyshko.ru" target="_blank" style="text-transform: none;">Fulliton</a>
        </div>
    </div>
    <!--/Copyright-->

</footer>
<!--/Footer-->