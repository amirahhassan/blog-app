<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class PostController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch any data you need for the dashboard
        $posts = Post::all();
        $postCount = $posts->count();

        // Return the Inertia dashboard page with the data
        return Inertia::render('Posts/Index', [
            'postCount' => $postCount,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|string',
        ]);

        $user = Auth::user();

        $post = Post::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'user_id' => $user->id,
        ]);
        //dd($post);

        //return redirect()->route('posts.show', $post->id);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // You can retrieve the post using the id
        $post = Post::findOrFail($id);

        // Pass the post data to the Inertia component
        return Inertia::render('Posts/Show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
{
    dd($post);
    // Ensure the user is the owner of the post
    if (Auth::id() !== $post->user_id) {
        abort(403, 'Unauthorized action.');
    }

    return Inertia::render('Posts/Edit', [
        'post' => $post,
    ]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //dd($request);
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post->update($validated);

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function userPosts(Request $request)
    {
        //$user = Auth::user();

        // Get the current user's posts
        //$posts = $request->user()->userpost()->get();
        //dd($userPosts);

        // Pass the posts to the Inertia component
        // return Inertia::render('Posts/UserPosts', [
        //     'posts' => $posts,
        // ]);

        // Get the authenticated user
    $user = Auth::user();

    // Retrieve the posts created by the authenticated user
    $posts = Post::where('user_id', $user->id)->get();

    // Pass the posts to the Inertia component
    return Inertia::render('Posts/UserPosts', [
        'posts' => $posts,
    ]);
    }
    }

?>
