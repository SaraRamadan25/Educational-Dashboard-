@extends('master')
@section('title', 'Add Question')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Add Question</strong>
            </div>
            <div class="card-body">
                @if (!isset($numAnswers))
                    <form action="{{ route('questions.create', ['subject' => $subject->name, 'exam' => $exam->id]) }}" method="GET">
                        <div class="form-group">
                            <label for="num_answers">Number of Answers:</label>
                            <input type="number" name="num_answers" id="num_answers" class="form-control" min="1">
                        </div>
                        <button type="submit" class="btn btn-primary">Next</button>
                    </form>
                @else
                    <form action="{{ route('questions.store', ['exam' => $exam->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="question">Question:</label>
                            <input type="text" name="question" id="question" class="form-control" placeholder="Enter your question here">
                            <label for="subject_id">Subject:</label>
                            <select name="subject_id" id="subject_id" class="form-control">
                                <option value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="answers">Answers:</label>
                            @for($i = 0; $i < $numAnswers; $i++)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_correct" id="is_correct{{ $i }}" value="{{ $i }}">
                                    <label class="form-check-label" for="is_correct{{ $i }}">
                                        Correct Answer
                                    </label>
                                </div>
                                <input type="text" class="form-control" name="answers[]" id="answer{{ $i }}" placeholder="Answer {{ $i + 1 }}">
                            @endfor
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
