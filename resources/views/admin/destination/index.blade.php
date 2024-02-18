@extends('admin.master')
@section('content')
    @include('partials.breadcrumb', ['title' => 'Destination'])
    <section class="content">
        <div class="container-fluid">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <a class="float-right btn btn-primary" href="{{ route('destination.create')}}">Add Destination</a>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Destination</th>
                                <th style="width:200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($destinations as $item)
                            <tr>
                                <td>{{ $item->destination }} </td>
                                <td>
                                    <div class="row">
                                   <a href="{{ route('destination.edit',$item->id)}}" title="Edit" class="btn btn-primary">Edit</a>
                                    <form action="{{route('destination.destroy',$item->id)}}" method="POST">
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
                    {{ $destinations->links()}}
                </div>
            </div>
        </div>
    </section>
@endsection
