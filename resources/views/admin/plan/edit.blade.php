@extends('admin.layouts.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
@endsection
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавление нового плана
                <small>Элемент расширенной формы</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Главная</a></li>
                <li><a href="{{ route('plan.index') }}">План</a></li>
                <li class="active">Добавление нового плана</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Добавить</h3>
                        </div>
                    @include('includes.messages')
                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('plan.update', $plan->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="box-body">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="title">Заголовок</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$plan->title}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle">Подзаголовок</label>
                                        <input type="text" class="form-control" id="subtitle" name="body" placeholder="Sub Title" value="{{$plan->content}}">
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            @if($plan->class==10)
                                            <input type="radio" name="class" value="10" checked> 10 класс
                                            <input type="radio" name="class" value="8"> 8 класс
                                            @else
                                                <input type="radio" name="class" value="10"> 10 класс
                                                <input type="radio" name="class" value="8" checked> 8 класс
                                            @endif
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary">
                                <a href='{{ route('plan.index') }}' class="btn btn-warning">Назад</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('footerSection')
    <script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
@endsection