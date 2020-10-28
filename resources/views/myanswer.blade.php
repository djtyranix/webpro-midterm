@extends('layouts.app')

@section('content')

<div class="container   ">
    <div class="row justify-content-between">
        <div class="col-3">
            <h3>My Answer</h3>
        </div>
    </div>
    <div class="row justify-content-end">
        <div></div>
    </div>
</div>



@foreach ($answers as $answer)
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-hoverable mb-4">
                <div class="card-body">     
                    <a style="text-decoration: none; color: #000;" class="stretched-link" href="{{ route('thread', $answer->id_question) }}/#{{ sprintf('%06d', $answer->id) }}">
                        <div class="media flex-wrap w-100 align-items-center">
                            <div class="media-body truncate">
                                <h2><strong>Reply #{{ sprintf('%06d', $answer->id) }}</strong></h2>
                                <div class="text-muted"> 
                                    Posted on {{ Carbon\Carbon::parse($answer->created_at)->timezone("Asia/Jakarta")->format('M d, Y \a\t H:i') }} 
                                    @if($answer->updated_at > $answer->created_at)
                                     | Last edit {{ Carbon\Carbon::parse($answer->updated_at)->timezone("Asia/Jakarta")->format('M d, Y \a\t H:i') }}
                                    @endif
                                </div>
                                <div class="text-muted">
                                    <div>Thread: <strong>{{ $answer->title_question }}</strong></div>
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
            {{ $answers->links() }}
        </div>
    </div>
</div>

<script>
    var currentTitle = 'My Replies';
</script>
@endsection