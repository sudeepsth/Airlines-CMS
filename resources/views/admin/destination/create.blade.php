@extends('admin.master')
@section('content')
    @include('partials.breadcrumb', ['title' => 'Destination'])
    <section class="content">
        <div class="container-fluid">
           <form method="POST" action="{{ route('destination.store')}}">
            @csrf
                @include('admin.destination.form',['button' => 'Submit'])
           </form>
        </div>
    </section>
@endsection
