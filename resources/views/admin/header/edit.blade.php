@extends('admin.layouts.app')

@section('main-content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	  <!-- Content Header (Page header) -->
	  <section class="content-header">
	    <h1>
	      Редактирование шапки
      	<small>Элемент расширенной формы</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Главная</a></li>
      	<li><a href="{ route('header.index') }}" >Шапка</a></li>
	      <li class="active">Редактирование</li>
	    </ol>
	  </section>

	  <!-- Main content -->
	  <section class="content">
	    <div class="row">
	      <div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <div class="box-header with-border">
	            <h3 class="box-title">Редактирование тега</h3>
	          </div>

	          @include('includes.messages')
	          <!-- /.box-header -->
	          <!-- form start -->
	          <form role="form" action="{{ route('header.update', $header->id) }}" method="post" enctype="multipart/form-data">
	          {{ csrf_field() }}
	          {{ method_field('PUT') }}
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
					<div class="form-group">
						<label for="input1">Наименование</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Имя" value="{{$header->name}}">
					</div>

					<div class="form-group">
						<label for="input2">Заголвок</label>
						<input type="text" class="form-control" id="title" name="title" placeholder="Заголовок" value="{{$header->title}}">
					</div>
					<div class="form-group">
						<label for="input3">Подзаголовок</label>
						<input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Подзаголовок" value="{{$header->subtitle}}">
					</div>
					<div class="form-group">
						<label for="logo">Лого</label>
						<input type="file" name="logo" id="logo">
					</div>
					<div class="form-group">
						<label for="background_img">Задний фон</label>
						<input type="file" name="background_img" id="background_img">
					</div>
	            <div class="form-group">
	              <button type="submit" class="btn btn-primary">Редактировать</button>
	              <a href='{{ route('header.index') }}' class="btn btn-warning">Назад</a>
	            </div>
	            	
	            </div>
					
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