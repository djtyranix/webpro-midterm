@extends('layouts.app')

@section('content')

<!-- <div class="container mt-4 mb-3">
    <div class="row justify-content-start">
        <div class="col-md-12" style="padding-left: 2rem;">
            <h1><a href="{{ route('home') }}"><i class="fa fa-home fa-fw" style="font-size: 2.7rem;"></i></a> <i class="fa fa-chevron-right fa-fw" style="font-size: 1rem; position:relative; top: -.3rem;" aria-hidden="true"></i> #{{ sprintf('%06d', $question->id) }} <i class="fa fa-chevron-right fa-fw" style="font-size: 1rem; position:relative; top: -.3rem;" aria-hidden="true"> Edit Thread</h1>
        </div>
    </div>
</div> -->

<div class="container mt-4 mb-3">
    <div class="row justify-content-start">
        <div class="col-md-12">
            <h1><a href="{{ route('home') }}"><i class="fa fa-home fa-fw" style="font-size: 2.7rem;"></i></a> <i class="fa fa-chevron-right fa-fw" style="font-size: 1rem; position:relative; top: -.3rem;" aria-hidden="true"></i> <a href="/thread/{{ $question->id }}">#{{ sprintf('%06d', $question->id) }}</a> <i class="fa fa-chevron-right fa-fw" style="font-size: 1rem; position:relative; top: -.3rem;" aria-hidden="true"></i> Edit Thread</h1>
        </div>
    </div>
</div>

<div class="container">
    <form method="POST" action="{{ route('update_thread') }}">
        @method('PUT')
        @csrf
        <input type="hidden" class="form-control" name ="id" placeholder="Example input" value="{{$question->id}}">
        <div class="form-group">
            <label for="title_question">Title</label>
            <input type="text" class="form-control" name ="title_question" id ="title_question" value="{{$question->title_question}}">
        </div>
        <div class="form-group">
            <label for="detail_question">Description</label>
            <textarea class="form-control" name="detail_question" id="detail_question" cols="30" rows="8" placeholder="Edit your reply here" style="resize: none;">{{$question->detail_question}}</textarea>
        </div>
        <button class="btn btn-warning">
            {{ __('Update') }}
        </button>
    </form>
</div>

<script>
    var currentTitle = 'Edit Thread: {{ $question->title_question }}';
</script>
@endsection