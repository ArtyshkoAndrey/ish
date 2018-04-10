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
    Редактирование новости
      <small>Элемент расширенной формы</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Главная</a></li>
      <li><a href="{{ route('post.index') }}">Новости</a></li>
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
            <h3 class="box-title">Редактирование</h3>
          </div>
          @include('includes.messages')
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="box-body">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Заголовок</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $post->title }}">
                </div>

                <div class="form-group">
                  <label for="subtitle">Подзаголовок</label>
                  <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub Title" value="{{ $post->subtitle }}">
                </div>

                <div class="form-group">
                  <label for="slug">Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ $post->slug }}" readonly tabIndex="-1" style="pointer-events: none;" disabled>
                </div>

                <div class="form-group">
                  <label for="subtitle">Meta_description(Коротко о новости. Для SEO)</label>
                  <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta_description" value="{{ $post->meta_description }}">
                </div>

                <div class="form-group">
                  <label for="subtitle">Meta_keywords(Вводить через запятую. Для SEO)</label>
                  <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta_keywords" value="{{ $post->meta_keywords }}">
                </div>
                
              </div>
              <div class="col-lg-6">
                <br>
                <div class="form-group">
                  <div class="pull-right">
                    <label for="image">Основная картинка</label>
                    <input type="file" name="image" id="image">
                  </div>
                  <div class="checkbox pull-left">
                    <label>
                      <input type="checkbox" name="status" value="1" @if ($post->status == 1)
                        {{'checked'}}
                      @endif> Опубликовать
                    </label>
                    <label style="margin-left: 20px">
                      <input type="checkbox" name="top" value="1" @if ($post->top == 1)
                        {{'checked'}}
                              @endif> В топ
                    </label>
                  </div>
                </div>
                <br>
                <div class="form-group" style="margin-top:18px;">
                  <label>Выберите теги</label>
                  <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}"
                      @foreach ($post->tags as $postTag)
                        @if ($postTag->id == $tag->id)
                          selected
                        @endif
                      @endforeach
                    >{{ $tag->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group" style="margin-top:18px;">
                  <label>Выберите категории</label>
                  <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                    @foreach ($post->categories as $postCategory)
                      @if ($postCategory->id == $category->id)
                        selected
                      @endif
                    @endforeach
                    >{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                
              </div>
            </div>
            <!-- /.box-body -->
            
            <div class="box">
             <div class="box-header">
               <h3 class="box-title">Текст новости
                 <small>Поддерживается загрузка картонок и видео</small>
               </h3>
               <!-- tools box -->
               <div class="pull-right box-tools">
                 <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                   <i class="fa fa-minus"></i></button>
                 </div>
                 <!-- /. tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body pad">
                <textarea name="body" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">{{ $post->body }}</textarea>
              </div>
             </div>

             <div class="box-footer">
              <input type="submit" class="btn btn-primary">
              <a href='{{ route('post.index') }}' class="btn btn-warning">Назад</a>
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
<script src="{{  asset('admin/ckeditor/ckeditor.js') }}"></script>
<script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1');
      //bootstrap WYSIHTML5 - text editor
      $(".textarea").wysihtml5();
    });
</script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>
@endsection