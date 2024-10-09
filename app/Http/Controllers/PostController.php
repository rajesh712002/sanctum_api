<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $data['post'] = Post::all();
        return response()->json([
            'status' => true,
            'message' => 'All Post Data',
            'data' => $data
        ], 200);
    }


    public function store(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|min:3|max:30',
                'description' => 'required',
                'image' => 'required',
            ]
        );

        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'error' => $validateUser->errors()->all()
            ], 401);
        }

        $img = $request->image;
        $ext = $img->Extension();
        $imageName = time() . '.' . $ext;
        $img->move(public_path('/uploads'), $imageName);

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Post Created Successfully',
            'post' => $post,
        ], 200);
    }


    // public function show(string $id)
    // {
    //     $data['post'] = Post::select('id', 'title', 'description', 'image')->where(['id' => $id])->first();
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Your Single Post',
    //         'data' => $data,
    //     ], 200);
    // }

    public function show(string $id)
    {
        $post = Post::select('id', 'title', 'description', 'image')->where('id', $id)->first();

        // Check if the post exists
        if (!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post not found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Your Single Post',
            'data' => $post,
        ], 200);
    }



    public function update(Request $request, string $id)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|min:3|max:30',
                'description' => 'required',
                'image' => 'nullable',
            ]
        );

        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'error' => $validateUser->errors()->all()
            ], 401);
        }

        $postImage = Post::select('id', 'image')->where('id', $id)->first();

        if ($request->image != '') {
            $path = public_path() . '/uploads/';
            if ($postImage->image != '' && $postImage->image != null) {
                $old_file = $path . $postImage->image;
                if (file_exists($old_file)) {
                    unlink($old_file);
                }
            }

            $img = $request->image;
            $ext = $img->Extension();
            $imageName = time() . '.' . $ext;
            $img->move(public_path('/uploads'), $imageName);
        } else {
            $imageName = $postImage->image;
        }

        $post = Post::where(['id' => $id])->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Post Updated Successfully',
            'post' => $post,
        ], 200);
    }


    // public function destroy(string $id)
    // {
    //     $imagePath = Post::select('image')->where('id', $id)->get();
    //     $filePath = public_path() . '/uploads' . $imagePath[0]['image'];
    //     unlink($filePath);

    //     $post = Post::where('id', $id)->delete();

    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Your Post Has Been Removed',
    //         'post' => $post,
    //     ], 200);
    // }


    public function destroy(string $id)
    {
        // Check if the post exists
        $post = Post::where('id', $id)->first();

        if (!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post not found',
            ], 404);
        }

        // Delete the image from the storage
        $filePath = public_path('/uploads/') . $post->image;
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete the post from the database
        $post->delete();

        return response()->json([
            'status' => true,
            'message' => 'Your Post Has Been Removed',
        ], 200);
    }
}
