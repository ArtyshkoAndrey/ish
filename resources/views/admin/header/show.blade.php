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
      Главная страница
      <small>Управление контентом на главной странице</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Главная</a></li>
      <li class="active"><a href="{ route('header.index') }}" >Главная страница</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Главная страница</h3>
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
                                    <th>Заголовок</th>
                                    <th>Подзаголовок</th>
                                    {{--@can('course.update',Auth::user())--}}
                                        <th>Редактировать</th>
                                    {{--@endcan--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($headers as $header)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $header->name }}</td>
                                        <td>{{ $header->title }}</td>
                                        <td>{{ $header->subtitle }}</td>
                                        <td><a href="{{ route('header.edit', $header->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>№</th>
                                    <th>Имя</th>
                                    <th>Заголовок</th>
                                    <th>Подзаголовок</th>
                                    {{--@can('course.update',Auth::user())--}}
                                        <th>Редактировать</th>
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
<!-- <script>
  $(function () {
    $("#example1").DataTable();
  });
</script> -->
@endsection