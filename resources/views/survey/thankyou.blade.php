@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h1 class="mt-5">Thank You!</h1>
        <p class="lead">We've received your survey. Thank you for taking the time to complete this survey.</p>
        <a class="btn btn-primary" href="{{ route('surveys.show', [$questionnaire->id, Str::slug($questionnaire->title)]) }}">Take Another Survey</a>
    </div>
</div>
@endsection
