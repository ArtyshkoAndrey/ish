@extends('admin.layouts.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Преподаватели
                <small>Удалять, редоктировать, добавлять</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Главная</a></li>
                <li class="active"><a href="{{ route('teacher.index') }}" >Препдаватели</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Препдаватели</h3>
                    {{--@can('posts.create', Auth::user())--}}
                        <a class='col-lg-offset-5 btn btn-success' href="{{ route('teacher.create') }}">Добавить нового препдавателя</a>
                    {{--@endcan--}}
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
                                    <th>Имя</th>
                                    <th>Профессия</th>
                                    <th>Информация</th>
                                    <th>Создано</th>
                                    {{--@can('posts.update',Auth::user())--}}
                                    <th>Редактировать</th>
                                    {{--@endcan--}}
                                    {{--@can('posts.delete', Auth::user())--}}
                                    <th>Удалить</th>
                                    {{--@endcan--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->profession }}</td>

                                        <td>{{ str_limit(strip_tags($teacher->content), 20, '...') }}</td>
                                        <td>{{ $teacher->created_at }}</td>

                                        {{--@can('posts.update',Auth::user())--}}
                                        <td><a href="{{ route('teacher.edit',$teacher->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                        {{--@endcan--}}

                                        {{--@can('posts.delete', Auth::user())--}}
                                        <td>
                                            <form id="delete-form-{{ $teacher->id }}" method="post" action="{{ route('teacher.destroy',$teacher->id) }}" style="display: none">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                            <a href="" onclick="
                                                    if(confirm('Уверены что хотите удалить?'))
                                                    {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $teacher->id }}').submit();
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
                                    <th>Имя</th>
                                    <th>Профессия</th>
                                    <th>Информация</th>
                                    <th>Создано</th>
                                    {{--@can('posts.update',Auth::user())--}}
                                    <th>Редактировать</th>
                                    {{--@endcan--}}
                                    {{--@can('posts.delete', Auth::user())--}}
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