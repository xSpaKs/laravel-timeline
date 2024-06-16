<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

        <!-- Styles -->
        <style>
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-item {
            margin: 0 5px;
        }

        .pagination .page-link {
            color: #007bff;
            background-color: #fff;
            border: 1px solid #007bff;
        }

        .pagination .page-link:hover {
            color: #0056b3;
            background-color: #e9ecef;
            border-color: #007bff;
        }

        .pagination .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
    </head>
    <body>
    @if (Auth::check())
        <x-app-layout>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <form action="/post" method="post" style="margin-bottom: 20px; padding-top:20px">
                @csrf
                <textarea name="body" placeholder="Say something..."></textarea>
                <button type="submit">Post</button>
            </form>
            <div class="timeline">
                @foreach ($posts as $post)
                    <div class="post">
                        <div style="display:flex; align-items: flex-end; gap:20px">
                            <h3 style="margin:0">{{ $post->user->name }}</h3>
                            <small>Posted on {{ $post->created_at->diffForHumans() }}</small>
                        </div>

                        <p>{{ $post->body }}</p>

                        <div style="display:flex; align-items: center; gap:10px;">
                            <form action="/like" method="POST">
                            @csrf
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <button type="submit" style="padding: 0; margin:0; background: none;">
                                    <i class="fa fa-heart" style="color: {{ auth()->user()->likedPosts->contains($post) ? 'red' : 'gray' }}"></i>
                                </button>
                            </form>
                            <p>{{$post->likes()->count()}}</p>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <div class="pagination">
                    {{ $posts->links() }}
                </div>
            </div>
        </x-app-layout>
    @else
        <x-guest-layout>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <form action="/post" method="post" style="margin-bottom: 20px; padding-top:20px">
                @csrf
                <textarea name="body" placeholder="Say something..."></textarea>
                <button type="submit">Post</button>
            </form>
            <div class="timeline">
                @foreach ($posts as $post)
                    <div class="post">
                        <div style="display:flex; align-items: flex-end; gap:20px">
                            <h3 style="margin:0">{{ $post->user->name }}</h3>
                            <small>Posted on {{ $post->created_at->diffForHumans() }}</small>
                        </div>

                        <p>{{ $post->body }}</p>

                        <div style="display:flex; align-items: center; gap:10px;">
                            <form action="/like" method="POST">
                            @csrf
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <button type="submit" style="padding: 0; margin:0; background: none;">
                                    <i class="fa fa-heart" style="color: {{ 'gray' }}"></i>
                                </button>
                            </form>
                            <p>{{$post->likes()->count()}}</p>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <div class="pagination">
                    {{ $posts->links() }}
                </div>
            </div>
        </x-guest-layout>
    @endif
    </body>
</html>

