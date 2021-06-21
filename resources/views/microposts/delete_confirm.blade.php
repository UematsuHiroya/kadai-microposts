@extends('layouts.app')

@section('content')
    <h1>{{ __("delete_confirm.message1") }}{{ $micropost->content }}{{__("delete_confirm.message2") }}</h1>

    <div class="row">
        <div class="col-sm-6">
            {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                {!! Form::submit(__('delete_confirm.delete'), ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-sm-6">
            {{Form::submit(__('delete_confirm.cancel'), ['class'=>'btn btn-success btn-sm', "onClick"=>"history.back()"])}}
        </div>
    </div>
@endsection