<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    // Show create form post
    public function create(Post $post) {
        // $asd = Post::latest()->get()->where('id','=',auth()->user()->id);
        return view('post.create')->with('posts', Post::latest()->where('user_id','=',auth()->id())->limit(5)->get());
    }

    // Store new post
    public function store(StorePostRequest $request) {

        //Validate
        $formFields = $request->validated();
        
        $formFields['user_id'] = auth()->id();

        //File upload
        if($request->hasFile('file')) {
            $formFields['img_path'] = $request->file('file')->store('posts/user-'.auth()->id().'/','public');
        }

        Post::create($formFields);

        return redirect()->route('home')->with('message','Post created successfully');
    }

    //Delete post
    public function destroy(Post $post) {
        if(!auth()->id()) {
            abort(403,'Unauthorized request');
        }
        //Delete related file
        if($post->img_path) {
            if(Storage::disk('public')->exists($post->img_path)) {
                Storage::disk('public')->delete($post->img_path);
            }
        }
        $post->delete();
        return redirect()->back()->with('message', 'post deleted successfully');
    }

    //List posts by user id
    public function listPosts(User $user) {
        return view('post.list', [ "user" => $user ]);
    }

    // Show edit post form
    public function edit(Post $post) {
        return view('post.edit', ['post' => $post]);
    }

    // Update post
    public function update(Request $request, Post $post) {
        //Validate
        $formFields = $request->validate([
            "heading" => "required|max:255",
            "text" => "required|min:4|max:420",
            'file' => 'mimes:jpeg,png,jpg,gif',
        ]);
        if(!auth()->id()) {
            abort(403,'Unauthorized request');
        }
        $formFields['user_id'] = auth()->id();
        //File upload
        if($request->hasFile('file')) {
            if(Storage::disk('public')->exists($post->img_path)) {
                Storage::disk('public')->delete($post->img_path);
            }
            $formFields['img_path'] = $request->file('file')->store('user/user-'.auth()->id().'/','public');
        }

        $post->update($formFields);

        return redirect()->back()->with('message','Post updated successfully');
    }

}

//Common routes:
//index - show all listings
//show - show single listing
//create - show form to create new listing
//store - store new listing
//edit - show form to edit listing
//update - update listing
//destroy - delete listing
