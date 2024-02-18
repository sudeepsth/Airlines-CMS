@extends('admin.master')
@section('content')
    @include('partials.breadcrumb', ['title' => 'Flight Detail'])
    <section class="content">
        <div class="container-fluid">
           <form method="POST" action="{{ route('flight.update',$flight->id )}}">
                @csrf
                @method('PATCH')
                @include('admin.flight.form',['button' => 'Update'])
           </form>
        </div>
    </section>
@endsection
