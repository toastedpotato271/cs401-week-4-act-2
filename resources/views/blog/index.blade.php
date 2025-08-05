<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Database Demo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .card { border: 1px solid #ddd; border-radius: 5px; padding: 15px; margin: 10px 0; }
        .tag { background: #e7f3ff; padding: 3px 8px; border-radius: 3px; margin: 2px; display: inline-block; }
        .comment { background: #f9f9f9; padding: 10px; margin: 5px 0; border-left: 3px solid #007cba; }
        .stats { display: flex; gap: 20px; margin: 20px 0; }
        .stat-card { background: #f5f5f5; padding: 15px; border-radius: 8px; text-align: center; }
    </style>
</head>
<body>
    <h1>Database Operation and Eloquent ORM Demo</h1>
    
    <p><a href="{{ route('blog.create-sample') }}">Create Sample Post</a></p>
    
    <div class="stats">
        <div class="stat-card">
            <h3>Users</h3>
            <p>{{ $users->count() }} total</p>
        </div>
        <div class="stat-card">
            <h3>Categories</h3>
            <p>{{ $categories->count() }} total</p>
        </div>
        <div class="stat-card">
            <h3>Tags</h3>
            <p>{{ $tags->count() }} total</p>
        </div>
        <div class="stat-card">
            <h3>Posts</h3>
            <p>{{ $posts->count() }} total</p>
        </div>
    </div>

    <h2>Users with Roles</h2>
    @foreach($users as $user)
        <div class="card">
            <strong>{{ $user->name }}</strong> ({{ $user->email }})
            <br>Role: {{ $user->role ? $user->role->role_name : 'No Role' }}
            <br>Posts: {{ $user->posts->count() }}
            <br>Comments: {{ $user->comments->count() }}
        </div>
    @endforeach

    <h2>Categories with Post Count</h2>
    @foreach($categories as $category)
        <div class="card">
            <strong>{{ $category->category_name }}</strong>
            <br>{{ $category->description }}
            <br>Posts: {{ $category->posts_count }}
        </div>
    @endforeach

    <h2>Tags with Post Count</h2>
    @foreach($tags as $tag)
        <div class="card">
            <strong>{{ $tag->tag_name }}</strong>
            <br>{{ $tag->description }}
            <br>Posts: {{ $tag->posts_count }}
        </div>
    @endforeach

    <h2>Posts with Relationships</h2>
    @if($posts->count() > 0)
        @foreach($posts as $post)
            <div class="card">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
                <p><strong>Author:</strong> {{ $post->author->name }} ({{ $post->author->role->role_name }})</p>
                <p><strong>Category:</strong> {{ $post->category ? $post->category->category_name : 'No Category' }}</p>
                <p><strong>Publication Date:</strong> {{ $post->publication_date ? $post->publication_date->format('M d, Y') : 'Not published' }}</p>
                
                @if($post->tags->count() > 0)
                    <p><strong>Tags:</strong>
                        @foreach($post->tags as $tag)
                            <span class="tag">{{ $tag->tag_name }}</span>
                        @endforeach
                    </p>
                @endif

                @if($post->comments->count() > 0)
                    <h4>Comments ({{ $post->comments->count() }}):</h4>
                    @foreach($post->comments as $comment)
                        <div class="comment">
                            <strong>{{ $comment->commenter->name }}:</strong>
                            {{ $comment->comment_content }}
                            <br><small>{{ $comment->comment_date->format('M d, Y H:i') }}</small>
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach
    @else
        <p>No posts available. <a href="{{ route('blog.create-sample') }}">Create a sample post</a></p>
    @endif
</body>
</html>
