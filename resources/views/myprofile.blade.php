@extends('layouts.app')

@section('content')

<?php use \App\Http\Controllers\myProfileController; ?>

<div class="row mt-4 py-5">
    <div class="col-md-12">
        <div class="container">
            <div>
                <center><img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar rounded-circle img-thumbnail" alt="avatar" style="width: 12em;"></center>
            </div>
            <div>
                <h1 class="mt-2 mb-5"><center>Hello, <strong>{{ $myDetails->name }}</strong></center></h1>
            </div>
        </div>
    </div>
</div>

<!-- CARD DECK -->
<div class="row">
    <div class="col-md-12">
        <div class="container">
            <div class="card-deck">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-4"><center>Your <strong>Profile</strong></center></h3>
                        <p class="card-text mb-1"><small class="text-muted">Username</small></p>
                        <p class="card-text">{{ $myDetails->name }}</p>
                        <p class="card-text mb-1"><small class="text-muted">Login Email</small></p>
                        <p class="card-text">{{ $myDetails->email }}</p>
                        <p class="card-text mb-1"><small class="text-muted">Password</small></p>
                        <p class="card-text"><a href="{{ route('changepassword') }}">Change password</a></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-4"><center>Your <strong>Thread</strong></center></h3>                        
                        @foreach ($myQuestion as $myQuestions)
                            <h5 class="mb-0"><a href="{{ route('thread', $myQuestions->id) }}">{{ $myQuestions->title_question }}</a></h5>
                            <p class="card-text mb-0"><small class="text-muted">
                                @if($myQuestions->updated_at > $myQuestions->created_at)
                                    Last edit {{ Carbon\Carbon::parse($myQuestions->created_at)->timezone("Asia/Jakarta")->format('M d, Y \a\t H:i') }}
                                @else
                                    Posted on {{ Carbon\Carbon::parse($myQuestions->updated_at)->timezone("Asia/Jakarta")->format('M d, Y \a\t H:i') }}
                                @endif</small></p>
                            <p class="card-text mb-4"><small class="text-muted">{{ myProfileController::countReplies($myQuestions->id) }} 
                            @if (myProfileController::countReplies($myQuestions->id) > 1)
                                replies
                            @else
                                reply    
                            @endif
                            </small></p>
                        @endforeach
                        @if ($questionCount > 5)
                            <a href="{{ route('userquestion') }}">See more</a>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-4"><center>Your <strong>Reply</strong></center></h3>
                        @foreach ($myAnswer as $myAnswers)
                            <h5 class="mb-0"><a href="{{ route('thread', $myAnswers->question_id) }}/#{{ sprintf('%06d', $myAnswers->id) }}">Reply #{{ sprintf('%06d', $myAnswers->id) }}</a></h5>
                            <p class="card-text mb-0"><small class="text-muted">Thread: {{ $myAnswers->title_question }}</small></p>
                            <p class="card-text mb-4"><small class="text-muted">
                                @if($myAnswers->updated_at > $myAnswers->created_at)
                                Last edit {{ Carbon\Carbon::parse($myAnswers->created_at)->timezone("Asia/Jakarta")->format('M d, Y \a\t H:i') }}
                            @else
                                Posted on {{ Carbon\Carbon::parse($myAnswers->updated_at)->timezone("Asia/Jakarta")->format('M d, Y \a\t H:i') }}
                            @endif</small></p>
                        @endforeach
                        @if ($answerCount > 5)
                            <a href="{{ route('useranswer') }}">See more</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var currentTitle = 'My Profile';
</script>
@endsection