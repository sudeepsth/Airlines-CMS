@extends('admin.master')
@section('content')
    @include('partials.breadcrumb', ['title' => 'Flight Record'])
    <section class="content">
        <div class="container-fluid">
           <form method="POST" action="{{ route('flight.store')}}">
            @csrf
                @include('admin.flight.form',['button' => 'Submit'])
           </form>
        </div>
    </section>
@endsection
