@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center mt-3 mb-5">
    <div class="col-3 mr-5 mt-5">
        <h1>Welcome to ReadIt, <strong>commander</strong>.</h1>
        <h2 class="text-justify">You can ask everything here. Before asking, check if similar question is already answered here.</h2>
        <div class="my-5">
            <form action="{{ route('search') }}" method="GET">
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback fa-lg"></span>
                    <input type="text" name="key" class="form-control" placeholder="Search questions">
                </div>
                @csrf
            </form>
        </div>
    </div>

    <div class="col-3 ml-5">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center mb-4">Ask the community!</h2>
                <form action="{{ route('ask') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name ="title_question" placeholder="What is up? Tell us.">
                    </div>
                    <div class="form-group">
                        <textarea name="detail_question" class="form-control" id="detail_question" cols="15" rows="5" style="resize: none;" placeholder="Provide details for your issues/questions."></textarea>
                    </div>
                    <button class="btn btn-outline-primary btn-block">
                        {{ __('Submit') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- fetching all question data retrived from HomeController@index --}}

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
                                    <a href="javascript:void(0)"><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ $question->name }}</a> | 
                                    @if($question->updated_at > $question->created_at)
                                    Last edit {{ Carbon\Carbon::parse($question->created_at)->timezone("Asia/Jakarta")->format('M d, Y \a\t H:i') }}
                                    @else
                                        Posted on {{ Carbon\Carbon::parse($question->updated_at)->timezone("Asia/Jakarta")->format('M d, Y \a\t H:i') }}
                                    @endif
                                </div>
                                <div class="text-muted">
                                    <div>Member since <strong>{{ Carbon\Carbon::parse($question->user_created_at)->timezone("Asia/Jakarta")->format('M d, Y') }}</strong></div>
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
    var currentTitle = 'Home';
</script>
@endsection
