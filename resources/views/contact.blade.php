@extends('layouts.site')

@section('content')

    <div class="formated-content">
        {!! $text->text !!}
    </div>

    {!! Form::open(['route' => 'contact.post']) !!}

    @include('blocks.errors')

    @include('blocks.messages')

    <div class="form-group">
        {!! Form::label('name', 'Votre Nom') !!}
        {!! Form::text('name', null, [
            'required',
            'class'=>'form-control',
            'placeholder'=>'Nom'
                  ])
        !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Votre courriel') !!}
        {!! Form::email('email', null,[
            'required',
            'class'=>'form-control',
            'placeholder'=>'courriel'
            ])
        !!}
    </div>

    <div class="form-group">
        {!! Form::label('message', 'Votre message') !!}
        {!! Form::textarea('message', null,[
            'required',
            'class'=>'form-control',
            'placeholder'=>'message'
            ])
        !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Envoyer', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

@endsection
