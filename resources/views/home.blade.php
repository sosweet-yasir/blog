@extends('main')

@section('body')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-0">
			<div class="panel panel-default">
				<h1> Welcome {!! Auth::user()->f_name !!} </h1>
		</div>
	</div>
</div>
@endsection
