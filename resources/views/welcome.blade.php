<html>
	<head>
		<title>Laravel</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}
			a {
                /*background-color: rgb(200,110,255);*/
                color: #10BEC5;
                font-size: 25px;
            }

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 26px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Blog App</div>
				{{--@foreach($users as $user)--}}
				{{--{!! link_to_route('post', $user->f_name.' '.$user->l_name, [$user->id], ['class="btn btn-sm btn-success"']) !!}--}}
				{{--</br>--}}
				{{--@endforeach--}}
			</div>
		</div>
	</body>
</html>
