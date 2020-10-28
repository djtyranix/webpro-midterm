@extends('layouts.app')

@section('content')

<!-- Title Bar + Mini-Info -->
<div class="container mt-4 mb-3">
    <div class="row justify-content-start">
        <div class="col-md-12" style="padding-left: 2rem;">
            <h1><a href="{{ route('home') }}"><i class="fa fa-home fa-fw" style="font-size: 2.7rem;"></i></a> <i class="fa fa-chevron-right fa-fw" style="font-size: 1rem; position:relative; top: -.3rem;" aria-hidden="true"></i> {{ $questions->title_question }}<span style="color: #B8B8B8;"> #{{ sprintf('%06d', $questions->id) }}</span></h1>
            @if($questions->updated_at > $questions->created_at)
                Posted by <a href="javascript:void(0)">{{ $questions->name }}</a> | Last edited on {{ Carbon\Carbon::parse($questions->created_at)->timezone("Asia/Jakarta")->format('M d, Y \a\t H:i') }}
            @else
                Posted by <a href="javascript:void(0)">{{ $questions->name }}</a> on {{ Carbon\Carbon::parse($questions->updated_at)->timezone("Asia/Jakarta")->format('M d, Y \a\t H:i') }}
            @endif |
                @if ($count > 1)
                    {{ $count }} replies
                @else
                    {{ $count }} reply
                @endif
        </div>
    </div>
</div>

<!-- THREAD DELETE MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteThreadModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Warning!</strong> Delete Thread Confirmation!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the thread? You'll not be able to recover it for a long time(forever). Proceed with caution!</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('delete_thread', $questions->id) }}" class="btn btn-danger">Delete Thread</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nah, I've changed my mind</button>
            </div>
        </div>
    </div>
</div>

<!-- Fetching question -->
<div class="container">
    <div class="row align-items-start">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="forum-content user-detail">
                        <div class="container">
                            <center><img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar rounded-circle img-thumbnail" alt="avatar" style="width: 7em;"></center>
                        </div>
                        <div class="mt-2">
                            <a href="javascript:void(0)"><center>{{ $questions->name }}</center></a>
                        </div>
                        <div>Member since <strong>{{ Carbon\Carbon::parse($questions->user_created_at)->timezone("Asia/Jakarta")->format('M d, Y') }}</strong></div>
                    </div>
                    <div class="forum-content content-detail">
                        <div class="d-flex justify-content-between" style="font-size: .7rem;">
                            <div>
                                @if($questions->updated_at > $questions->created_at)
                                    Last edit {{ Carbon\Carbon::parse($questions->updated_at)->timezone("Asia/Jakarta")->format('M d, Y') }}
                                @else
                                    Posted on {{ Carbon\Carbon::parse($questions->created_at)->timezone("Asia/Jakarta")->format('M d, Y') }}
                                @endif
                            </div>
                        </div>
                        <hr class="w-100">
                        <div style="font-size: 1.1rem;">
                            {{ $questions->detail_question }}
                        </div>
                    </div>
                </div>
                @if ($user_id == $questions->id_question)
                <div class="card-footer">
                    <div class="container d-flex justify-content-end">
                        <a href="{{ route('edit_thread', $questions->id) }}" class="pr-3">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="modal" data-target="#deleteThreadModal">Delete Thread <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </div>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>

{{-- Fetching all answers data retrieved from HomeController@index --}}
@foreach ($answers as $answer)
<!-- Reply Delete Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteReplyModal{{ $answer->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Warning!</strong> Delete Reply Confirmation!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete your reply? You'll not be able to recover it for a long time(forever)!</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('delete_reply', ['answer_id'=>$answer->id, 'id'=>$questions->id]) }}" class="btn btn-danger">Delete Reply</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nah, I've changed my mind</button>
            </div>
        </div>
    </div>
</div>

<a name="{{ sprintf('%06d', $answer->id) }}"></a>
<div class="container">
    <div class="row align-items-start">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="forum-content user-detail">
                        <div class="container">
                            <center><img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar rounded-circle img-thumbnail" alt="avatar" style="width: 7em;"></center>
                        </div>
                        <div class="mt-2">
                            <a href="javascript:void(0)" data-abc="true"><center>{{ $answer->name }}</center></a>
                        </div>
                        <div>Member since <strong>{{ Carbon\Carbon::parse($answer->user_created_at)->timezone("Asia/Jakarta")->format('M d, Y') }}</strong></div>
                    </div>
                    <div class="forum-content content-detail">
                        <div class="d-flex justify-content-between" style="font-size: .7rem;">
                            <div>
                                @if($answer->updated_at > $answer->created_at)
                                    Last edit {{ Carbon\Carbon::parse($answer->created_at)->timezone("Asia/Jakarta")->format('M d, Y') }}
                                @else
                                    Posted on {{ Carbon\Carbon::parse($answer->updated_at)->timezone("Asia/Jakarta")->format('M d, Y') }}
                                @endif
                            </div>
                            <div>
                                #{{ sprintf('%06d', $answer->id) }}
                            </div>
                        </div>
                        <hr class="w-100">
                        <div style="font-size: 1.1rem;">
                            {{ $answer->the_answer }}
                        </div>
                    </div>
                </div>
                @if ($user_id == $answer->id_answer)
                <div class="card-footer">
                    <div class="container d-flex justify-content-end">
                        <a href="javascript:editOpen{{ $answer->id }}()" class="pr-3">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="modal" data-target="#deleteReplyModal{{ $answer->id }}">Delete <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </div>
                </div>
                @endif
            </div>
            <div class="card mb-4" id="form{{ $answer->id }}" style="display: none;">
                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('update_reply') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" class="form-control" name ="id" value="{{ $answer->id }}">
                            <input type="hidden" class="form-control" name ="question_id" value="{{ $answer->question_id }}">
                            <div class="form-group">
                                <label for="the_answer" style="font-size: 1.5rem;">Edit Reply <span style="color: #B8B8B8;">#{{ sprintf('%06d', $answer->id) }}</span></label>
                                <textarea class="form-control" name="the_answer" id="the_answer" cols="30" rows="8" placeholder="Edit your reply here" style="resize: none;">{{ $answer->the_answer }}</textarea>
                                <input type="hidden" name="id_question" value="{{ $questions->id }}">
                            </div>
                        
                            <button class="btn btn-success">
                                {{ __('Save Changes') }}
                            </button>
                            <button type="button" class="btn btn-primary" onclick="editClose{{ $answer->id }}()">
                                Cancel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function editOpen{{ $answer->id }}()
    {
        $("#form{{ $answer->id }}").toggle();
        window.location.href = "#{{ sprintf('%06d', $answer->id) }}";
    }

    function editClose{{ $answer->id }}()
    {
        $("#form{{ $answer->id }}").hide();
    }
</script>

@endforeach
<!-- Pagination -->
<div class="row">
    <div class="col-md-12">
        <div class="container d-flex justify-content-end">
            {{ $answers->links() }}
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <form method="POST" action="{{ route('reply') }}">
                            @csrf
                            <div class="form-group">
                                <label for="the_answer" style="font-size: 1.5rem;">Your Answer</label>
                                <textarea class="form-control" name="the_answer" id="the_answer" cols="30" rows="8" placeholder="Your comment here" style="resize: none;"></textarea>
                                <input type="hidden" name="id_question" value="{{ $questions->id }}">
                            </div>
                        
                            <button class="btn btn-primary">
                                {{ __('Post Your Answer') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var currentTitle = '{{ $questions->title_question }}';
</script>
@endsection