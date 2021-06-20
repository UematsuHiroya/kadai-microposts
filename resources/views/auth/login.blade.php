@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>{{ __("login.logIn") }}</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', __('login.email')) !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', __('login.password')) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit(__('login.logIn'), ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}

            {{-- ユーザ登録ページへのリンク --}}
            <p class="mt-2">{{ __("login.newUser") }} {!! link_to_route('signup.get', __('login.signUp')) !!}</p>
        </div>
    </div>
@endsection