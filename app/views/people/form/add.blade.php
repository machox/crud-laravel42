                {{ Form::open(array(
                    "route"         => "peopleAdd",
                    "method"        => "post",
                    "role"          => "form",
                    "class"         => "form",

                )) }}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add People</h3>
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
                                    Input::old("name"),
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
                                    Input::old("email"),
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
                                    Input::old("address"),
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
                                    Input::old("hobby"),
                                    array(
                                        "placeholder" => "Hobby",
                                        "class" => "form-control"
                                    ))
                                }}
                            </div>

                        </div>
                        <div class="panel-footer">
                            {{ Form::submit("Add People", array("class" => 'btn btn-primary')) }}
                            <a href="{{route('people')}}" class="btn btn-link">List People</a>
                        </div>
                    </div>
                {{ Form::close() }}
