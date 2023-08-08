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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newDocumentation">
                        Add Image
                      </button>
                </div>
            </div>
        </div>
        <div class="card-body row">
            @if(isset($docs) && $docs->count() > 0)
            @foreach ($docs as $doc)
                <div class="col-md-3 col-sm-4 col-12 shadow-sm position-static mt-3">
                    <a href="{{ asset('/storage/assets/images/' . $doc->image) }}" data-lightbox="lightbox-img" data-title="{{ $doc->caption }}" data-alt="{{ $doc->caption }}">
                        <img src="{{ asset('/storage/assets/images/' . $doc->image) }}" alt="{{ $doc->caption }}" class="img-fluid">
                    </a>
                </div>
            @endforeach
        @else
            <div class="alert alert-danger">Sorry, there are no files or documentations at the moment</div>
        @endif        
        </div>
    </form>
</div>
@include('admin.documentation.partials._script')
@include('admin.documentation.partials._modal')
@endsection
