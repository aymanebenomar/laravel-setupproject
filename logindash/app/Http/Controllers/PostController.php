<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * FEED PAGE (Facebook middle column)
     * --------------------------------
     * Route: GET /   OR   GET /posts
     * What happens:
     *  - We fetch posts from DB (newest first)
     *  - We also load the author (user) for each post
     *  - We paginate (10 per page) like a real social feed
     *  - We return the Blade view that renders the 3-column layout
     */
    public function index()
    {
        $posts = Post::with('user')     // include author data to avoid N+1 queries
            ->latest()                 // ORDER BY created_at DESC
            ->paginate(10);            // 10 posts per page (better than get())

        return view('posts.index', compact('posts'));
    }

    /**
     * CREATE PAGE (separate page opened by the + button)
     * --------------------------------------------------
     * Route: GET /posts/create
     * What happens:
     *  - Just shows the form page where user can write title + content
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * STORE (save new post)
     * ---------------------
     * Route: POST /posts
     * Trigger:
     *  - When user submits the create form
     * What happens:
     *  1) Block guests (must be logged in)
     *  2) Validate inputs (security + clean DB)
     *  3) Create the post linked to the logged-in user
     *  4) Redirect to feed with a success message
     */
    public function store(Request $request)
    {
        // Extra safety: if route middleware is missing, still block guests
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Validate the request data
        $data = $request->validate([
            'title'   => ['required', 'string', 'max:150'],
            'content' => ['required', 'string', 'max:2000'],
        ]);

        // Create post attached to current user
        // Requires User model relation: user()->posts()
        $request->user()->posts()->create($data);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post created!');
    }

    /**
     * SHOW ONE POST (optional but clean)
     * ---------------------------------
     * Route: GET /posts/{post}
     * What happens:
     *  - Laravel automatically finds the Post by ID via Route Model Binding
     *  - We load the author
     *  - Return a single-post page
     */
    public function show(Post $post)
    {
        $post->load('user');

        return view('posts.show', compact('post'));
    }

    /**
     * DESTROY (delete post)
     * ---------------------
     * Route: DELETE /posts/{post}
     * Trigger:
     *  - When user clicks delete button in the feed
     * What happens:
     *  1) Only the owner can delete (authorization)
     *  2) Delete from DB
     *  3) Redirect back to feed with message
     */
    public function destroy(Post $post)
    {
        // Only the author (owner) can delete
        if ($post->user_id !== Auth::id()) {
            abort(403); // Forbidden
        }

        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post deleted!');
    }
}
