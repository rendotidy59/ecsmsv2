@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="mb-4">Test Data CSMS</h1>

  @foreach($contractors as $contractor)
  <div class="card mb-4">
    <div class="card-header">
      <strong>Contractor:</strong> {{ $contractor->name }}
    </div>
    <div class="card-body">

      @forelse($contractor->questionaires as $q)
        <div class="mb-3 p-3 border rounded">
          <h5>Questionnaire #{{ $q->id }}</h5>
          <ul class="list-group mb-2">
            @for($i = 1; $i <= 13; $i++)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Q{{ $i }} Answer: <strong>{{ $q->{'question'.$i.'_answer'} }}</strong>
                <em>{{ $q->{'question'.$i.'_attachment'} }}</em>
              </li>
            @endfor
          </ul>

          @if($q->assessment)
            <h6>Assessment by {{ $q->assessment->assessor->name }}</h6>
            <p><strong>Summary:</strong> {{ $q->assessment->summary }}</p>
            <ul class="list-group">
              @for($i = 1; $i <= 13; $i++)
                <li class="list-group-item">
                  <strong>Q{{ $i }} Score:</strong> {{ $q->assessment->{'question'.$i.'_score'} }}<br>
                  <strong>Comment:</strong> {{ $q->assessment->{'question'.$i.'_comment'} }}
                </li>
              @endfor
            </ul>
          @else
            <p class="text-muted"><em>No assessment yet.</em></p>
          @endif

        </div>
      @empty
        <p class="text-muted">No questionnaires for this contractor.</p>
      @endforelse

    </div>
  </div>
  @endforeach

  @if($contractors->isEmpty())
    <p class="text-center text-muted">No contractors found.</p>
  @endif
</div>
@endsection
