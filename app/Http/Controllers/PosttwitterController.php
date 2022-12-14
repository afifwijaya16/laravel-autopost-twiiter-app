<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posttwitter;
use File;
use App\Imports\PostsImport;
use Maatwebsite\Excel\Facades\Excel;
use Response;
class PosttwitterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Posttwitter::get();
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    public function importpost(Request $request) {
        Excel::import(new PostsImport, $request->file('fileImport'));
        return redirect()->route('post.index')->with('status', 'Import Data Berhasil');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'post' => 'required|max:281',
            'day_post' => 'required',
            'url_image_post' => 'required',
            // 'date_post' => 'required',
            'time_post' => 'required',
            // 'image_post' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // $image_post = $request->image_post;
        // $new_image_post = time().'.'.$image_post->getClientOriginalExtension();

        $post = Posttwitter::create([
            'post' => $request->post,
            // 'date_post' => $request->date_post,
            'time_post' => $request->time_post,
            'url_image_post' => $request->url_image_post,
            'day_post' => $request->day_post,
            // 'image_post' => 'assets/post-twitter/'.$new_image_post,
        ]);

        // $image_post->move('assets/post-twitter/', $new_image_post);

        return redirect()->route('post.index')->with('status', 'Berhasil menambah Data');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posttwitter::findorfail($id);
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'post' => 'required|max:281',
            'day_post' => 'required',
            'url_image_post' => 'required',
            // 'date_post' => 'required',
            'time_post' => 'required',
            'status_post' => 'required',
            // 'image_post' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $post = Posttwitter::findorfail($id);

        // if($request->has('image_post')) {
        //     File::delete($post->image_post);
        //     $image_post = $request->image_post;
        //     $new_image_post = time().'.'.$image_post->getClientOriginalExtension();
        //     $image_post->move('assets/post-twitter/', $new_image_post);
        //     $post_data = [
        //         'post' => $request->post,
        //         'date_post' => $request->date_post,
        //         'url_image_post' => $request->url_image_post,
        //         'day_post' => $request->day_post,
        //         'time_post' => $request->time_post,
        //         'image_post' => 'assets/post-twitter/'.$new_image_post,
        //     ];
        // } else {
            $post_data = [
                'post' => $request->post,
                'url_image_post' => $request->url_image_post,
                'day_post' => $request->day_post,
                // 'date_post' => $request->date_post,
                'time_post' => $request->time_post,
                'status_post' => $request->status_post,
            ];
        // }

        $post->update($post_data);

        return redirect()->route('post.index')->with('status', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posttwitter::findorfail($id);
        $post->delete();
        return redirect()->route('post.index')->with('status', 'Berhasil menghapus data');
    }

    public function deleteselect(Request $request) 
    {
        $ids = $request->data;
        $post = Posttwitter::whereIn('id', $ids);
        $post->delete();
        return Response::json(array(
            'success' => true,
            'status'   =>'Berhasil menghapus data'
        )); 
    }
}
