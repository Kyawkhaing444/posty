@props(['post'])
<div class="mb-4">
    <a href="{{ route('user.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a><span
        class="text-gray-600 text-sm px-2">{{ $post->created_at->diffForHumans() }}</span>
    <p class="mb-2">{{ $post->body }}</p>
    <div class="flex item-center">
        @auth
        @if (!$post->likedBy(Auth::user()))
        <form action="{{ route('posts.like', $post) }}" method="post" class="mr-1">
            @csrf
            <button class="text-blue-500" type="submit">Like</button>
        </form>
        @else
        <form action="{{ route('posts.like', $post) }}" method="post" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="text-blue-500" type="submit">Unlike</button>
        </form>
        @endif
        @can('delete', $post)
        <form action="{{ route('posts.delete', $post) }}" class="px-3" method="post">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
        @endcan
        @endauth
        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count())}}</span>
    </div>
</div>