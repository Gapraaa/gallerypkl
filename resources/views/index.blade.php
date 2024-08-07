@extends('layouts.front')

@section('content')
    <section class="cta-section theme-bg-light py-5">
        <div class="container text-center single-col-max-width">
            <h2 class="heading">Anisa's Gallery </h2>
            <div class="intro">Welcome to my galleries</div>
            <div class="single-form-max-width pt-3 mx-auto">
                <form action="{{ route('home.search') }}" method="GET">
                    <input type="text" name="query" placeholder="Search titles or descriptions..." value="{{ request('query') }}">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
    </section>

    <section class="blog-list px-3 py-5 p-md-5">
        <div class="container single-col-max-width">
            @foreach ($galleries as $gallery)
                <div class="item mb-5">
                    <div class="row g-3 g-xl-0">
                        <div class="col-2 col-xl-3">
                            <a href="{{ route('galleries.show', $gallery->id)}}">
                                <img class="img-fluid post-thumb" src="{{ asset('storage/' . $gallery->image_path) }}" alt="image">
                            </a>
                        </div>
                        <div class="col">
                            <h3 class="title mb-1"><a class="text-link" href="{{ route('galleries.show', $gallery->id)}}">{{ $gallery->title }}</a></h3>
                            <div class="meta mb-1">
                                <span class="date">Published {{ $gallery->created_at }}</span>
                                <span class="time">5 min read</span>
                                <span class="comment"><a class="text-link" href="#">8 comments</a></span>
                            </div>
                            <div class="intro">
                                {{ Str::limit($gallery->description, 100) }}
                                @if (Str::length($gallery->description) > 100)
                                    <span class="more-text" style="display:none;">{{ $gallery->description }}</span>
                                    <button class="btn btn-link show-more">Read more &rarr;</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <nav class="blog-nav nav nav-justified my-5">
                <a class="nav-link-prev nav-item nav-link d-none rounded-left" href="#">Previous<i class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
                <a class="nav-link-next nav-item nav-link rounded" href="#">Next<i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
            </nav>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.show-more').forEach(function(button) {
                button.addEventListener('click', function() {
                    const moreText = this.previousElementSibling;
                    if (moreText.style.display === 'none' || moreText.style.display === '') {
                        moreText.style.display = 'inline';
                        this.textContent = 'Read less';
                    } else {
                        moreText.style.display = 'none';
                        this.textContent = 'Read more →';
                    }
                });
            });
        });
    </script>
@endsection
