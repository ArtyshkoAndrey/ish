@extends('user/app')

@section('title', "Инженерная школа - Гимназия Универс № 1")
@section('meta_keyword', "Гимназия, ИШ, Инженерная школа, Красноярск Универс, События Гимназии, Инженерная школа Гимназия Универс № 1")
@section('meta_description', "официальный сайт")

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
@endsection

@section('content')

	<section id="home" class="pfblock-image screen-height">
        <div class="home-overlay"></div>
        <div class="intro">
            <div class="start">
                 {{$headers->title}}
            </div>
            <h1>
                {{$headers->name}}
            </h1>
            <div class="start">{{$headers->subtitle}}</div>
        </div>
    
        <a href="#services">
            <div class="scroll-down">
                <span>
                    <i class="fa fa-angle-down fa-4x"></i>
                </span>
            </div>
        </a>
    
    </section>
    
    <section class="pfblock pfblock-gray" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="pfblock-header">
                        <h2 class="pfblock-title">
                            Чем мы занимаемся?
                        </h2>
                        <div class="pfblock-line"></div>
                        <div class="pfblock-subtitle">
                            Курсы на выбор
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @forelse($courses as $course)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="iconbox wow slideInLeft">
                            <div class="iconbox-icon">
                                <span class="{{$course->icon}}"></span>
                            </div>
                            <div class="iconbox-text">
                                <h3 class="iconbox-title">
                                    {{$course->name}}
                                </h3>
                                <div class="iconbox-desc">
                                    {{$course->content}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>На данный момент курсов нет</p>
                @endforelse
            </div>
        </div>
    </section>
    <section class="pfblock" id="plan">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="pfblock-header">
                        <h2 class="pfblock-title">
                            Учебный план
                        </h2>
                        <div class="pfblock-line"></div>
                        <div class="pfblock-subtitle">
                            Обучение по интегрированному учебному плану
                        </div>
                    </div>
                </div>
            </div>
            <div class="row resume-container justify-content-center">
                <div class="col-md-4 left">
                    <h3>10 класс</h3>
                    <div class="resume-icon"><i class="icon-book-open"></i></div>
                    @forelse($plansTen as $planTen)
                        <div class="resume-item">
                            <div class="resume-title">{{$planTen->title}}</div>
                            <p>{{$planTen->content}}</p>
                        </div>
                        @empty
                        <p>Плана для 10 класса нет</p>
                    @endforelse
                </div>
                <div class="col-md-4 right">
                    <h3>8 класс</h3>
                    <div class="resume-icon"><i class="icon-note"></i></div>
                    @forelse($plansEight as $planEight)
                        <div class="resume-item">
                            <div class="resume-title">{{$planEight->title}}</div>
                            <p>{{$planEight->content}}</p>
                        </div>
                    @empty
                        <p>Плана для 8 класса нет</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <section class="pfblock pfblock-gray" id="teacher">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="pfblock-header">
                        <h2 class="pfblock-title">
                            Преподавательский состав
                        </h2>
                        <div class="pfblock-line"></div>
                        <div class="pfblock-subtitle">
                            Преподаватели с высоким стажем
                        </div>
                    </div>
                </div>
            </div>
            @forelse($teachers as $teacher)
            <div class="row justify-content-center text-center align-items-center">
                <div class="col-md-4 col-sm-4">
                    <div class="teacher">
                        <div class="teacher-foto">
                            <img src="{{asset('upload/teacher/'.$teacher->photo)}}" alt="{{$teacher->name}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="teacher">
                        <div class="teacher-name">
                            <div class="fio">{{$teacher->name}}</div>
                        </div>
                        <div class="teacher-description text-left">
                            <p>{{$teacher->profession}}</p>
                            {!! $teacher->content !!}
                        </div>
                    </div>
                </div>
            </div>
                <hr class="my-4">
            @empty
                <h4 class="text-center">На данный момент преподавателей нет</h4>
            @endforelse
        </div>
    </section>

    <section class="pfblock" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="pfblock-header">
                        <h2 class="pfblock-title">
                            Галерея
                        </h2>
                        <div class="pfblock-line"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="main">
                        <div class="slider slider-for">
                            @forelse($galleries as $gallery)
                                <div>
                                    <img src="{{asset('upload/gallery/original/'.$gallery->photo)}}" class="img-fluid rounded mx-auto d-block" alt="{{$gallery->title}}">
                                </div>
                            @empty
                                <div>
                                    <h4 class="text-center">Фотографий нет</h4>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-md-10" style="margin-top: 50px;">
                    <div class="slider slider-nav">
                        @forelse($galleries as $gallery)
                            <div>
                                <img src="{{asset('upload/gallery/miniature/'.$gallery->photo)}}" class="img-thumbnail" alt="{{$gallery->title}}">
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pfblock pfblock-gray" id="map">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="pfblock-header">
                        <h2 class="pfblock-title">
                            Где мы находимся
                        </h2>
                        <div class="pfblock-line"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8">
                    {!! $about[0]['body'] !!}
                </div>
            </div>
            <div class="row justify-content-center align-items-center" style="padding-top: 20px">
                <div class="col-lg-7 col-sm-12">
                    {!! $about[0]['map'] !!}
                </div>
                <div class="col-lg-4">
                    {!! $about[0]['address'] !!}
                </div>
            </div>
        </div>
    </section>

    @include('user.layouts.footer')

@endsection


@section('script')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection