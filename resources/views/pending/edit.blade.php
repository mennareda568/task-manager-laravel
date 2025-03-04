@extends("layouts.app")
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
         <form enctype="multipart/form-data" action="{{route('updatepending')}}" method="post" >
            @csrf
                <input type="hidden" name="old_id" value="{{ $result->id }}">

                <label>{{'TITLE'}}</label>
                <input type="text" name="title" class="form-control mb-4" value="{{old('title', $result->title)}}">
                @error('title')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        

                <label>{{'CONTENT'}}</label>
                <input type="text" name="content" class="form-control mb-4" value="{{old('content', $result->content)}}">
                @error('content')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="hidden" name="date" value="<?php echo date("D, d M Y h:i A") ?>">         
         
  

                <input type="submit" value='{{'UPDATE TASK'}}' class="form-control btn btn-success">

            </form>
        </div>
    </div>
</div>

@endsection
