@extends('layouts.body')

@section('content')
    <div class="container">

        @if(Session::has('flash_notice'))
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-success alert-dismissable ac">
                    {{ Session::get('flash_notice') }}
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                @include('people.form.edit')
            </div>
        </div>
    </div>
@overwrite

@section('script-end')
    @parent
	<script type="text/javascript">
		$(function(){
			$('.form').on('submit', function(e){
				$('body').block();
			});
		});
	</script>
@stop