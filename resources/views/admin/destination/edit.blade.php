@extends('admin.master')
@section('content')
    @include('partials.breadcrumb', ['title' => 'Destination'])
    <section class="content">
        <div class="container-fluid">
           <form method="POST" action="{{ route('destination.update',$destination->id )}}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" value={{$destination->id}}>
                @include('admin.destination.form',['button' => 'Update'])
           </form>
        </div>
    </section>
@endsection
