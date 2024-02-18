@extends('admin.master')
@section('content')
@include('partials.breadcrumb',['title'=> 'Dashboard'])
<section class="content">
<div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Flight</span>
                <span class="info-box-number">
                  {{ $record['total_flight']}}
                </span>
              </div>
            </div>
          </div>


          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Booked</span>
                <span class="info-box-number">{{ $record['total_booked']}}</span>
              </div>
            </div>
          </div>
        </div>


      </div><!--/. container-fluid -->
</section>
@endsection
