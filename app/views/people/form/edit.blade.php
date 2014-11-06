                {{ Form::open(array(
                    "route"         => array("peopleEdit", $people->id),
                    "method"        => "post",
                    "role"          => "form",
                    "class"         => "form",

                )) }}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit {{ $people->name }}</h3>
                        </div>
                        <div class="panel-body">

                            @if(Session::has('flash_error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {{ Session::get('flash_error') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <span class="err"> {{$errors->first('name')}} </span>
                                {{ Form::text(
                                    "name",
                                    (Input::old("name")) ? Input::old("name") : $people->name,
                                    array(
                                        "placeholder" => "Name",
                                        "class" => "form-control"
                                    ))
                                }}
                            </div>

                            <div class="form-group">
                                <span class="err"> {{$errors->first('email')}} </span>
                                {{ Form::text(
                                    "email",
                                    (Input::old("email")) ? Input::old("email") : $people->email,
                                    array(
                                        "placeholder" => "Email",
                                        "class" => "form-control"
                                    ))
                                }}
                            </div>

                            <div class="form-group">
                                <span class="err"> {{$errors->first('address')}} </span>
                                {{ Form::textarea(
                                    "address",
                                    (Input::old("address")) ? Input::old("address") : $people->address,
                                    array(
                                        "placeholder" => "Address",
                                        "class" => "form-control"
                                    ))
                                }}
                            </div>

                            <div class="form-group">
                                <span class="err"> {{$errors->first('hobby')}} </span>
                                {{ Form::textarea(
                                    "hobby",
                                    (Input::old("hobby")) ? Input::old("hobby") : $people->hobby,
                                    array(
                                        "placeholder" => "Hobby",
                                        "class" => "form-control"
                                    ))
                                }}
                            </div>

                        </div>
                        <div class="panel-footer">
                            {{ Form::submit("Edit People", array("class" => 'btn btn-primary')) }}
                            <a href="{{route('people')}}" class="btn btn-link">List People</a>
                        </div>
                    </div>
                {{ Form::close() }}
