@extends('layout')

@section ('content')
<div id="wrapper">
    <div 
    id="page" 
    class="container">
        @forelse ($articles as $article)
		<div id="content">
			<div class="title">
            <h2>
            <a href="{{route('articles.show', $article)}}">
                {{ $article->title }}
            </a>
            </h2>

			<p>
                <img 
                src="/images/banner.jpg"
                alt="" 
                class="image image-full" />
            </p>
                {{ $article->excerpt }}
        </div>
        @empty
        <p>
            No articles found with the chosen tag!
        </p>
        @endforelse
	</div>
</div>

@endsection