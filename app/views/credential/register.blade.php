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
                @include('credential.login.register')
            </div>
        </div>
    </div>
@overwrite
