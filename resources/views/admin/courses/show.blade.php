@extends('admin.layouts.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
@endsection

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Курсы на выбору
                <small>Удалять, редоктировать, добавлять</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Главная</a></li>
                <li class="active"><a href="{{ route('course.index') }}" >Курсы на выбору</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Курсы</h3>
                    @can('posts.create', Auth::user())
                        <a class='col-lg-offset-5 btn btn-success' href="{{ route('course.create') }}">Добавить новый курс</a>
                    @endcan
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Таблица всех записей</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Заголовок</th>
                                    <th>Подзаголовок</th>
                                    <th>Иконка</th>
                                    <th>Создано</th>
                                    {{--@can('course.update',Auth::user())--}}
                                        <th>Редактировать</th>
                                    {{--@endcan--}}
                                    {{--@can('course.delete', Auth::user())--}}
                                        <th>Удалить</th>
                                    {{--@endcan--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $course->name }}</td>
                                        <td>{{ $course->content }}</td>
                                        <td><span class="{{$course->icon}}"></span></td>
                                        <td>{{ $course->created_at }}</td>

                                        {{--@can('course.update',Auth::user())--}}
                                            <td><a href="{{ route('course.edit',$course->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                        {{--@endcan--}}

                                        {{--@can('course.delete', Auth::user())--}}
                                            <td>
                                                <form id="delete-form-{{ $course->id }}" method="post" action="{{ route('course.destroy',$course->id) }}" style="display: none">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>
                                                <a href="" onclick="
                                                        if(confirm('Уверены что хотите удалить?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $course->id }}').submit();
                                                        }
                                                        else{
                                                        event.preventDefault();
                                                        }" ><span class="glyphicon glyphicon-trash"></span></a>
                                            </td>
                                        {{--@endcan--}}
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>№</th>
                                    <th>Заголовок</th>
                                    <th>Подзаголовок</th>
                                    <th>Иконка</th>
                                    <th>Создано</th>
                                    {{--@can('course.update',Auth::user())--}}
                                        <th>Редактировать</th>
                                    {{--@endcan--}}
                                    {{--@can('course.delete', Auth::user())--}}
                                        <th>Удалить</th>
                                    {{--@endcan--}}
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('footerSection')
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>
@endsection