@extends('admin.master')
@section('content')
    @include('partials.breadcrumb', ['title' => 'Flight Detail'])
    <section class="content">
        <div class="container-fluid">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <a class="float-right btn btn-primary" href="{{ route('flight.create')}}">Add Flight Record</a>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Airlines</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Flight Date</th>
                                <th style="width:200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($flights as $item)
                            <tr>
                                <td>1.</td>
                                <td>{{ $item->airlines }} </td>
                                <td>{{ $item->fromDestination->destination }} </td>
                                <td>{{ $item->toDestination->destination }} </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($item->flight_date)->format('Y-m-d H:i') }}
                                </td>
                                <td>
                                    <div class="row">
                                   <a href="{{ route('flight.edit',$item->id)}}" title="Edit" class="btn btn-primary">Edit</a>
                                    <form action="{{route('flight.destroy',$item->id)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                            <button  title="Delete" class="ml-2 pl-2 btn btn-danger">Delete</button>
                                    </form>
                                    </div>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $flights->links()}}
                </div>
            </div>
        </div>
    </section>
@endsection
