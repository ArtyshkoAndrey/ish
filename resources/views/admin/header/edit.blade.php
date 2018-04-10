@extends('admin.layouts.app')

@section('main-content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	  <!-- Content Header (Page header) -->
	  <section class="content-header">
	    <h1>
	      Редактирование тега
      	<small>Элемент расширенной формы</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Главная</a></li>
      	<li><a href="{ route('tag.index') }}" >Теги</a></li>
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
	          <form role="form" action="{{ route('header.update') }}" method="post">
	          {{ csrf_field() }}
	          {{ method_field('PUT') }}
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
					<div class="form-group">
						<label for="input1">Поле 1</label>
						<input type="text" class="form-control" id="input1" name="input1" placeholder="Поле 1" value="{{$headers[0]['content']}}">
					</div>

					<div class="form-group">
						<label for="input2">Поле 2</label>
						<input type="text" class="form-control" id="input2" name="input2" placeholder="Поле 2" value="{{$headers[1]['content']}}">
					</div>
					<div class="form-group">
						<label for="input3">Поле 3</label>
						<input type="text" class="form-control" id="input3" name="input3" placeholder="Поле 3" value="{{$headers[2]['content']}}">
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