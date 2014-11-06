                {{ Form::open(array(
                    "url"           => "login",
                    "method"        => "post",
                    "role"          => "form",
                    "class"         => "form",

                )); }}

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Login user</h3>
                        </div>
                        <div class="panel-body">

                            @if(Session::has('flash_error'))
                                <div class="alert alert-danger alert-dismissable">
                                    {{ Session::get('flash_error') }}
                                </div>
                            @endif

                                <div class="form-group">
                                    {{ Form::text(
                                        "username",
                                        Input::old("username"),
                                        array(
                                            "placeholder" => "Username",
                                            "class" => "form-control"
                                        ))
                                    }}
                                </div>

                                <div class="form-group">
                                    {{ Form::password(
                                        "password",
                                        array(
                                            "placeholder" => "Password",
                                            "class" => "form-control"
                                        ))
                                    }}
                                </div>

                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('remember') }}
                                        Remember Me
                                    </label>
                                </div>
                        </div>
                        <div class="panel-footer">
                            {{ Form::submit("Login", array("class" => 'btn btn-primary')) }}
                            <a href="{{route('register')}}" class="btn btn-link">Register</a>
                        </div>
                    </div>
                {{ Form::close() }}
