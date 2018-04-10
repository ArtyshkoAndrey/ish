@extends('admin.layouts.app')

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @include('admin.layouts.pagehead')
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="{{ route('user.index') }}" >Пользователи</a></li>
        <li class="active">Редактирование пользователя</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Редактирование пользователя</h3>
            </div>

            @include('includes.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('user.update',$user->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
              <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="name">Имя пользователя</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="@if (old('name')){{ old('name') }}@else{{ $user->name }}@endif">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="email" value="@if (old('email')){{ old('email') }}@else{{ $user->email }}@endif">
                </div>

                <div class="form-group">
                  <label for="phone">Номер телефона</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="@if (old('phone')){{ old('phone') }}@else{{ $user->phone }}@endif">
                </div>

                <div class="form-group">
                  <label for="confirm_passowrd">Статуы</label>
                  <div class="checkbox">
                    <label ><input type="checkbox" name="status" 
                    @if (old('status')==1 || $user->status == 1)
                      checked
                    @endif value="1">Активен</label>
                  </div>
                </div>

                <div class="form-group">
                <label>Правила</label>
                <div class="row">
                  @foreach ($roles as $role)
                      <div class="col-lg-3">
                        <div class="checkbox">
                          <label ><input type="checkbox" name="role[]" value="{{ $role->id }}"
                          @foreach ($user->roles as $user_role)
                            @if ($user_role->id == $role->id)
                              checked
                            @endif
                          @endforeach> {{ $role->name }}</label>
                        </div>
                      </div>
                  @endforeach
                </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Редактровать</button>
                <a href='{{ route('user.index') }}' class="btn btn-warning">Назад</a>
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