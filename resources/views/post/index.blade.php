@extends('main')

@section('body')
    <div class="row" xmlns="http://www.w3.org/1999/html">
		<div class="col-md-11">
    		<a href="{{ URL::route('posts.create') }}" class="btn btn-primary inline pull-right"><i class="fa fa-plus"></i>Create New Post</a>
		</div>
    </div>
    <br/>
	<div class="row">
		<div class="col-md-11 col-md-offset-0">
			<div class="panel panel-default">

			    @forelse($posts as $post)
				    <div class="panel-heading">
                        <h3> {!! $post->title !!} </h3>
                       </div>
                    <div class="panel-body">
                    <h5>{!! $post->description !!}</h5>
                    @if($post->post_pic)
                        <div class="col-lg-8">
                            {!! HTML::image($post->post_pic, 'a picture', array('class' => 'img-responsive')) !!}
                        </div>
                    @endif
                       </div>
                    <div class="well well-sm">
                        <div class="btn-toolbar">
                            <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="col-lg-1 btn btn-primary inline pull-right"><i class="fa fa-pencil">Edit</i></a>
                            {!! Form::open(['method'=> 'Delete', 'route' => ['posts.destroy', $post->id]]) !!}
                                {!! Form::submit('delete',['class' => 'col-lg-1 btn btn-primary inline pull-right']) !!}
                            {!! Form::close() !!}
                            {!! Form::close() !!}

                            {{--<form method="post" action="{!! route('posts.destroy', $post->id ) !!}">--}}
                                {{--<input name="_method" type="hidden" value="DELETE">--}}
                                {{--<input type="text" name="_token" hidden value="{{ csrf_token() }}">--}}
                                {{--<input type="submit" value="delete" class="col-lg-1 btn btn-primary inline pull-right">--}}
                            {{--</form>--}}
                        </div>
                    </div>
                <hr/>

                    <a> Likes  {!! $post->likes->count() !!} </a>
                    <div id="">
                        @foreach($post->comments()->orderBy('title')->get() as $comment)
                            <br/>
                            {!! Form::label('', $comment->title, array('id' => 'append'.$post->id)) !!}
                        @endforeach
                    </div>
                    <div class="row" >
                        <div class="form-group col-md-8 col-md-offset-0" >
                            {!! Form::text('title', '', $attributes = array('onblur' => "saveComment(this.id)" , 'id' => $post->id, 'class' => 'form-control', 'placeholder' =>'write a comment...')) !!}
                        </div>
                    </div>
                    <hr/>
			     @empty

			    {!! 'No post created yet!' !!}
                @endforelse

			</div>
		</div>
	</div>

@endsection

@section('javascript')
    <script src="js/jquery.js" type="text/javascript"></script>
    <script type="text/javascript">

        function saveComment(id) {

               var data = {title : $("#"+id).val(), post : id, "_token": "{{ csrf_token() }}"};

               var url = 'comment';
               ajaxHandle(data, url)
                   //alert();

        }
            function ajaxHandle(data, url) {
                jQuery.ajax({
                    type: 'post',
                    url: url,
                    data: data,
                    success: function(response) {
                        if($("#append"+data['post']).length){
                            $("#append"+data['post'] ).before("<label>"+data['title']+"</label></br>");
                      }
                      else {
                            $("#"+data['post']).before("<label>"+data['title']+"</label></br>");
                      }
                    }

                });
            }


    </script>

@endsection