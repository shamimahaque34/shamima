@extends('front.master')
@section('title')
Category
@endsection
@section('body')
<section class="page-header">
    <div class="container">
        <div class="row align-items-center">
            <div class=" col-md-6">
                <div class="page-title">
                    <h2>{{ $category->name }}</h2>
                </div>
            </div>
            <div class=" col-md-6">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-5">
    <div class="container">
        <div class="more-content-grid ">
            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="{{ route('blogs', ['id' => $blog->id]) }}">
                            <img src="{{ asset($blog->image) }}" class="card-img-top" alt="Blog Tumbnail">
                        </a>
                        <div class="card-body px-0">
                            <ul class="category-tag-list">
                                <li class="category-tag-name">
                                    <a href="{{ route('category', ['id' => $blog->category->id]) }}">{{ $blog->category->name }}</a>
                                </li>
                            </ul>
                            <h5 class="card-title title-font">
                                <a href="{{ route('blog', ['id' => $blog->id]) }}">
                                    {{ Str::limit($blog->title, 26, '...') }}
                                </a>
                            </h5>
                            <div class="blog-desc">
                                <p>
                                    {{ Str::limit($blog->description, 200, '...') }}
                                </p>
                            </div>
                            <div class="author-date">
                                <a class="author" href="javascript:void(0)">
                                    <img src="{{ asset($blog->author_image) }}" alt="Author" class="rounded-circle">
                                    <span class="writer-name-small">{{ $blog->author}}</span>
                                </a>
                                <a class="date" href="#">
                                        <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y')}}</span>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{$blogs->links('front.includes.pagination')}} 
        </div>
    </div>
</section>
{{-- <section class="pagination-section">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="javascript:void(0)" tabindex="-1">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </li>
            <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
            <li class="page-item">
                <a class="page-link" href="javascript:void(0)">
                    <i class="fas fa-arrow-right"></i>
                </a>
            </li>
        </ul>
    </nav>
</section> --}}
@endsection
