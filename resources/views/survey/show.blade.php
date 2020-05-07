@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $questionnaire->title }}</h1>

            <form action="{{ route('surveys.store', [$questionnaire->id, Str::slug($questionnaire->title)]) }}" method="POST">
                @csrf

                @foreach($questionnaire->questions as $key => $question)
                    <div class="card mt-4">
                        <div class="card-header"><strong>{{ $loop->iteration }}</strong> {{ $question->question }}</div>

                        <div class="card-body">

                            @error('responses.' . $key . '.answer_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                    <li class="list-group-item">
                                        <label for="answer{{ $answer->id }}">
                                            <input type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer->id }}" 
                                                    {{ (old('responses.' . $key . '.answer_id') == $answer->id) ? 'checked' : ''}}
                                                    class="mr-2" value="{{ $answer->id }}">
                                            {{ $answer->answer }}
                                        </label>
                                        <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach

                <div class="card mt-4">
                    <div class="card-header">Your Information</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" name="survey[name]" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name" value="{{ old('survey.name') }}">
                            <small id="nameHelp" class="form-text text-muted">Hello! What's your name?</small>
                            @error('survey.name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="survey[email]" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email" value="{{ old('survey.email') }}">
                            <small id="emailHelp" class="form-text text-muted">Your Email Please!</small>
                            @error('survey.email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Complete Survey</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
