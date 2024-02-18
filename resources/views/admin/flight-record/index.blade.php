@extends('admin.master')
@section('content')
    @include('partials.breadcrumb', ['title' => 'Booked Flight Records'])
    <section class="content">
        <div class="container-fluid">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card">


                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Booking Reference#</th>
                                <th>Name</th>
                                <th>Destination</th>
                                <th>Email</th>
                                <th>Flight Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($flightRecords as $item)
                            <tr>
                                <td>{{$item->booking_number}}</td>
                                <td>{{ $item->first_name }} {{ $item->last_name}}</td>
                                <td>{{ $item->from }} - {{$item->to}}</td>
                                <td>{{ $item->email }} </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($item->flight_date)->format('Y-m-d H:i') }}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $flightRecords->links()}}
                </div>
            </div>
        </div>
    </section>
@endsection
