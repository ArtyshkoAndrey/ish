@extends('admin.layouts.app')

@section('main-content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	  <!-- Content Header (Page header) -->
	  <section class="content-header">
	    <h1>
	      Редактирование категории
	      <small>Элемент расширенной формы</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Главная</a></li>
      	<li><a href="{{route('category.index')}}">Категории</a></li>
	      <li class="active">Редактирование категории</li>
	    </ol>
	  </section>

	  <!-- Main content -->
	  <section class="content">
	    <div class="row">
	      <div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <div class="box-header with-border">
	            <h3 class="box-title">Titles</h3>
	          </div>
	    		@include('includes.messages')      
	          <!-- /.box-header -->
	          <!-- form start -->
	          <form role="form" action="{{ route('category.update',$category->id) }}" method="post">
	          {{ csrf_field() }}
	          {{ method_field('PUT') }}
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	              <div class="form-group">
	                <label for="name">Заголовок категории</label>
	                <input type="text" class="form-control" id="name" name="name" placeholder="Заголовок категории" value="{{ $category->name }}">
	              </div>

	              <div class="form-group">
	                <label for="slug">Slug</label>
	                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ $category->slug }}">
	              </div>

	            <div class="form-group">
	              <button type="submit" class="btn btn-primary">Редактировать</button>
	              <a href='{{ route('category.index') }}' class="btn btn-warning">Назад</a>
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