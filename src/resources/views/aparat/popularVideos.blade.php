@extends('layouts.app')

@section('content')

<section id="popularVideos">
    <h2 class="text-center bg-warning">Popular Videos</h2>
    <div class="container mt-5">
        <div class="row">
            @foreach ($videos as $video)
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                    <iframe id="{{$video['id']}}" width="100%" height="230" src="{{ $video['frame'] }}" frameborder="0" allowfullscreen></iframe>
                    <label class="my-3 border p-3 w-100 text-center" for="{{$video['id']}}">{{ $video['title'] }}</label>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
