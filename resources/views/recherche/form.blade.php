@extends('welcome')

@section('content')

<div class="container">
    <div class="content">
        <div class="title">Laravel 5</div>
        https://github.com/adamwathan/bootforms
	        {!! BootForm::open()->post()->action('/recherche') !!}
			{!! BootForm::text('Field Label', 'field_name')  !!}
			{!! BootForm::close() !!}
			
    </div>
</div>
@endsection