@extends('layouts.front')

@section('content')
    <section class="cta-section theme-bg-light py-5">
        <div class="container text-center single-col-max-width">
            <h2 class="heading">Anisa's Gallery </h2>
            <div class="intro">Welcome to my galleries</div>
            <div class="single-form-max-width pt-3 mx-auto">
                <form action="{{ route('home.search') }}" method="GET">
                <input type="text" name="query" placeholder="Search titles..." value="{{ request('query') }}">
                <button type="submit">Search</button>
                </form>
                <!--//signup-form-->
            </div><!--//single-form-max-width-->
        </div><!--//container-->
    </section>

    <section class="blog-list px-3 py-5 p-md-5">
        <div class="container single-col-max-width">
            @foreach ($galleries as $gallery)
                <div class="item mb-5">
                    <div class="row g-3 g-xl-0">
                        <div class="col-2 col-xl-3">
                            <img class="img-fluid post-thumb " src="{{ asset('storage/' . $gallery->image_path) }}"
                                alt="image">
                        </div>
                        <div class="col">
                            <h3 class="title mb-1"><a class="text-link" href="blog.post.html">{{ $gallery->title }}</a></h3>
                            <div class="meta mb-1"><span class="date">Published {{ $gallery->created_at }}</span><span
                                    class="time">5
                                    min read</span><span class="comment"><a class="text-link" href="#">8
                                        comments</a></span></div>
                            <div class="intro">{{ $gallery->description }}</div>
                            <a class="text-link" href="{{ route('galleries.show', $gallery->id) }}">Read more &rarr;</a>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
            @endforeach
            <nav class="blog-nav nav nav-justified my-5">
                <a class="nav-link-prev nav-item nav-link d-none rounded-left" href="#">Previous<i
                        class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
                <a class="nav-link-next nav-item nav-link rounded" href="#">Next<i
                        class="arrow-next fas fa-long-arrow-alt-right"></i></a>
            </nav>

        </div>
    </section>
@endsection
