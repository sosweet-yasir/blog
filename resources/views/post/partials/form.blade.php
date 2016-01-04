<div class="row" >
    <div class="form-group col-md-9 col-md-offset-1" >
        {!! Form::label('title', 'Post Title') !!}
        {!! Form::text('title', $value = null, $attributes = array('class' => 'form-control')) !!}
    </div>
</div>

<div class="row" >
    <div class="form-group col-md-9 col-md-offset-1" >
        {!! Form::label('description', 'Post Description') !!}
        {!! Form::textarea('description', $value = null, $attributes = array('class' => 'form-control')) !!}
    </div>
</div>
<div class="row" >
    <div class="form-group col-md-9 col-md-offset-1" >
        {!! Form::label('post_pic', 'Chose an Image') !!}
        {!! Form::file('post_pic', $attributes = array('class' => 'btn btn-default', 'onchange'=> "document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" )) !!}
        <img src="@if(isset($post)){!! asset($post->post_pic) !!} @endif" id="blah" alt="your image" width="100" height="100" />
        {{--<input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">--}}
    </div>
</div>
<div class="form-group">
    <div class=" col-lg-offset-10">
        {!! Form::submit('Save', $attributes = array( 'class' => 'btn btn-primary btn-block')) !!}
    </div>
</div>