@extends('main')

@section('body')
    <div class="row">
		<div class="col-md-11">
    		<a href="{{ URL::route('posts.index') }}" class="btn btn-primary inline pull-right"><span class="fa fa-chevron-left"></span>Back</a>
		</div>
    </div>

    <div class="row">
        <div class="col-md-11 col-md-offset-0">
            <div class="panel panel-default">
                <header class="main-box-header clearfix">
                    <h2> {!! 'Create New Post' !!}</h2>
                </header>
                {!! Form::open(array('route' => 'posts.store', 'role' => 'form', 'files'=> true)) !!}
                    @include('post.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection