@extends('admin.layouts.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Домашняя страница админ. панели
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Главная</a></li>
      <li><a href="#">Пример</a></li>
      <li class="active">Пустая страница</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Карта сайта</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        Карта сайта предназначена для SEO оптимзации. Она автоматически генерируется с появлением новой новости, категории, тега.
        <a href="{{route('sitemap')}}" target="_blank">Cсылка</a> на карту сайта.
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Новости</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <p>На данный момент в активном режиме <strong>{{$count_posts}}</strong> <a href="{{route('post.index')}}">новостей</a>. Общее кол-во просмотров <strong>{{$viewed_posts}}</strong></p>
          @if($popular_post != null)
        <p>Самый популярный пост <a href="{{route('post', $popular_post->slug)}}" target="_blank">{{$popular_post->title}}</a>, у него <strong>{{$popular_post->viewed}}</strong> просмотров</p>
          @endif
        <p>Для более удобной модификации новостей подключен плагин <a href="https://ckeditor.com/">CKEditor</a>. Более подробно об использовании см. в
          <a href="https://docs.ckeditor.com/">документации</a></p>
        <p>
          <strong>Meta description</strong> — это мета-описание страницы сайта. Meta-тег description, в отличие от meta keywords, является действующим и достаточно эффективным способом влияния на представление сайта в результатах поиска. Содержимое meta name description content используется при формировании сниппета для описания сайта в поиске.
          <img src="https://convertmonster.ru/wp-content/uploads/meta-description-google.png" alt="" class="img-fluid" width="400px" height="auto">
        </p>
        <p><strong>Meta keywords</strong> — список ключевых слов (key words), соответствующих содержимому страницы сайта. Поисковые системы могут использовать ключевые слова тега meta name keywords content при индексации. Однако в отличие от meta description, значение атрибута content тега meta name keywords уже существенно менялось и никто достоверно не может сказать, в какой степени ключевые слова из мета кейвордс используются различными поисковыми системами.</p>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Галерея в новостях</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
      <p>Для добавления слайдера в новостях, нужно выполнить пару операций:</p>
        <ul>
          <li>Выбрать курсором в пустое место в поле контента</li>
          <li>Кликнуть по значку с надписью div</li>
          <li>Указать класс блока slider</li>
          <li>Загружать картинка в этот блок</li>
          <li>Картинки трубуются не слишком болшого разрешения и не слишком малого. Оптимальное разрешение по высоте будет 400-600 пикселей, по ширине соответственно больше. Для загрузки требуются горизонтальные картинки </li>
        </ul>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Метрика</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div id="chart1">

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

@section('script')
    @if($highcharts == true)
        <script>
            $('#chart1').highcharts({
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Активность посетителей за последние 7 дней'
                },
                xAxis: {
                    categories: {!! $categories!!}
                },
                yAxis: {
                    title: {
                        text: 'Количество'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                series: {!! $series !!}
            });
        </script>
    @else
        <script>
            $('#chart1').highcharts({
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'На данный момент активности нет'
                },
                xAxis: {
                    categories: 1
                },
                yAxis: {
                    title: {
                        text: 'Количество'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                series: 1
            });
        </script>
    @endif
@endsection