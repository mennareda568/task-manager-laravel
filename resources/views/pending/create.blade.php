@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form action="{{ route('savepending') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <label>{{ 'TITLE' }}</label>
                   
                    <input type="text" name="title" class="form-control mb-4" value="{{ old('title') }}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label>{{ 'CONTENT' }}</label>
                    <input type="text" name="content" class="form-control mb-4"  value="{{ old('content') }}">
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <input type="hidden" name="date" value="<?php echo date('D, d M Y h:i A'); ?>">

                    <input type="submit" value='{{ 'CREATE TASK' }}' class="form-control btn btn-success">

                </form>
            </div>
        </div>
    </div>
@endsection
