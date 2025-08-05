<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with(['author', 'category', 'tags', 'comments.commenter'])
                    ->orderBy('created_at', 'desc')
                    ->get();

        $users = User::with('role')->get();
        $categories = Category::withCount('posts')->get();
        $tags = Tag::withCount('posts')->get();

        return view('blog.index', compact('posts', 'users', 'categories', 'tags'));
    }

    public function createSamplePost()
    {
        $author = User::where('role_id', 2)->first(); 
        $category = Category::first();
        $tags = Tag::take(2)->get();

        $post = Post::create([
            'title' => 'Sample Blog Post',
            'slug' => 'sample-blog-post',
            'content' => 'This is a sample blog post content demonstrating Eloquent relationships.',
            'publication_date' => now(),
            'author_id' => $author->id,
            'category_id' => $category->id,
        ]);

        $post->tags()->attach($tags->pluck('id'));

        Comment::create([
            'comment_content' => 'Great post! Very informative.',
            'comment_date' => now(),
            'commenter_id' => User::where('role_id', 3)->first()->id,
            'post_id' => $post->id,
        ]);

        return response()->json([
            'message' => 'Sample post created successfully',
            'post' => $post->load(['author', 'category', 'tags', 'comments'])
        ]);
    }
}
