```php
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Progress</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('progress.update', $progress->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="storyId" class="col-md-4 col-form-label text-md-right">Story ID</label>

                            <div class="col-md-6">
                                <input id="storyId" type="text" class="form-control @error('storyId') is-invalid @enderror" name="storyId" value="{{ $progress->storyId }}" required autocomplete="storyId" autofocus>

                                @error('storyId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="progress" class="col-md-4 col-form-label text-md-right">Progress</label>

                            <div class="col-md-6">
                                <textarea id="progress" class="form-control @error('progress') is-invalid @enderror" name="progress" required>{{ $progress->progress }}</textarea>

                                @error('progress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Progress
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```