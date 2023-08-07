@extends('layouts.app')

@section('content')
<div class="card">
    <form action="{{ route('documentation.store') }}" method="POST" enctype="multipart/form-data">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h1>Documentation</h1>
                </div>
                <div class="col-md-4 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Documentation_add">
                        Add Image
                      </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            @csrf
            <div class="container">
                <div class="row">
                  <div class="col-md-4 col-12">
                    <img src="{{ asset('assets/images/anime.jpg') }}" class="img-fluid" alt="#">
                  </div>
                  <div class="col-md-4 col-12">
                    <img src="{{ asset('assets/images/anime.jpg') }}" class="img-fluid" alt="#">
                  </div>
                  <div class="col-md-4 col-12">
                    <img src="{{ asset('assets/images/anime.jpg') }}" class="img-fluid" alt="#">
                  </div>
                </div>
              </div>
        </div>
    </form>
</div>
@include('admin.documentation.partials._script')
@include('admin.documentation.partials._modal')
@endsection
