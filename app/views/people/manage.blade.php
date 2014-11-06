@extends('layouts.body')

@section('content')

            <div class="row-fluid">
				@if(Session::has('flash_error'))
						<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							{{ Session::get('flash_error') }}
						</div>
					@endif
					@if(Session::has('flash_success'))
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							{{ Session::get('flash_success') }}
						</div>
					@endif
            </div>
            <div class="row-fluid">
               <a href="{{url('people/add')}}" class="btn btn-primary  btn-sm" role="button">Add People</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Hobby</th>
                            @if(Auth::check())
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($people as $key => $pe)
                        <tr>
                            <td>{{ $pe->id }}</td>
                            <td>{{ $pe->name }}</td>
                            <td>{{ $pe->email }}</td>
                            <td>{{ $pe->address }}</td>
                            <td>{{ $pe->hobby }}</td>
                            @if(Auth::check())
                                <td>
                                    <div class="btn-group">
                                        <a href="{{url('people/edit', $pe->id)}}"><i class="icon icon-pencil"></i>Edit</a>
                                        <a href="#" onclick="deletePeople({{ $pe->id }})"><i class="icon icon-trash"></i>Delete</a>
                                    </div>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row-fluid">
                <nav>
                  <ul class="pagination">
                        {{ $people->links(); }}
                  </ul>
                </nav>
            </div>

@stop


@section('script-end')

    <script type="text/javascript">
		function deletePeople(id){
			if(confirm("Are you sure to delete this data?")) {
				window.location.href = "{{url('people/delete')}}" + '/' + id;
			};
		}
    </script>
@stop
