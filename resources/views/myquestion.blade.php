@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-3">
    <div class="row justify-content-between">
        <div class="col-3">
            <h2>My <strong>Question</strong></h2>
        </div>
    </div>
    <div class="row justify-content-end">
        <div></div>
    </div>
</div>

@foreach ($questions as $question)
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-hoverable mb-4">
                <div class="card-body">     
                    <a style="text-decoration: none; color: #000;" class="stretched-link" href="{{ route('thread', $question->id) }}">
                        <div class="media flex-wrap w-100 align-items-center">
                            <div class="media-body truncate">
                                <h2><strong>{{ $question->title_question }}</strong></h2>
                                <div class="text-muted">
                                    Posted on {{ Carbon\Carbon::parse($question->created_at)->timezone("Asia/Jakarta")->format('M d, Y \a\t H:i') }}
                                    @if($question->updated_at > $question->created_at)
                                     | Last edit {{ Carbon\Carbon::parse($question->updated_at)->timezone("Asia/Jakarta")->format('M d, Y \a\t H:i') }}
                                   @endif
                                </div>
                            </div>
                        </div>              
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Pagination -->
<div class="row">
    <div class="col-md-12">
        <div class="container d-flex justify-content-end">
            {{ $questions->links() }}
        </div>
    </div>
</div>

<script>
    var currentTitle = 'My Thread';
</script>
@endsection