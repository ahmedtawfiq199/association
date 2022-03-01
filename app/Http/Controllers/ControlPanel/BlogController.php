<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate();
        return view('control-panel.blogs.index',[
            'blogs' => $blogs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control-panel.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();

        $image = null;


        DB::beginTransaction();

        try
        {
            if($request->hasFile('main_image') && $request->file('main_image')->isValid())
            {
                $image = $request->file('main_image')->store('blogs','public');
            }

            $data['main_image'] = $image;

            $blog = Blog::create($data);

            $this->insertTags($data['tags'],$blog);

            if($request->hasFile('gallery'))
            {
                foreach($request->file('gallery') as $file)
                {
                    $image = $file->store('blogs','public');
                    $blog->images()->create([
                        'image' => $image,
                    ]);
                }
            }

            DB::commit();

        }catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('blogs.index')
                ->with('error', 'Operation failed');
        }

        return redirect()->route('blogs.index')->with('success' ,'Blog '.$blog->name.' Created Done!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('control-panel.blogs.show',[
            'blog' => $blog,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $tags = $blog->tags()->pluck('name')->toArray();
        $tags = implode(', ', $tags);


        return view('control-panel.blogs.edit',[
            'blog' => $blog,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->validated();

        $image = $blog->main_image;

        DB::beginTransaction();

        try
        {

            if($request->hasFile('main_image') && $request->file('main_image')->isValid())
            {
                Storage::disk('public')->delete($image);
                $image = $request->file('main_image')->store('blogs','public');
                $data['main_image'] = $image;
            }



            foreach($blog->images as $gallery)
            {
                if($request->has("check_".$gallery->id) == 1)
                {
                    Storage::disk('public')->delete($gallery->image);
                    $gallery->delete();
                }
            }


            $blog->update($data);
            $this->insertTags($data['tags'],$blog);
            if($request->hasFile('gallery'))
            {
                foreach($request->file('gallery') as $file)
                {
                    $gallery_image = $file->store('blogs','public');
                    $blog->images()->create([
                        'image' => $gallery_image,
                    ]);
                }
            }
            DB::commit();

        }catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('projects.index')
                ->with('error', 'Operation failed');
        }

            return redirect()->route('blogs.index')->with('success' ,'Page '.$blog->name.' Updated Done!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        foreach($blog->images as $gallery)
        {
            Storage::disk('public')->delete($gallery->image);
            $gallery->delete();
        }

        Storage::disk('public')->delete($blog->main_image);
        $blog->delete();
        return redirect()->route('blogs.index')->with('success','Page Deleted Done!');
    }

    protected function insertTags($tags, $blog)
    {
        BlogTag::where('blog_id',$blog->id)->delete();
        if ($tags) {
            $tags_array = explode(',', $tags);
            foreach ($tags_array as $tag_name) {
                $tag_name = trim($tag_name);
                $tag = Tag::where('name', $tag_name)->first();
                if (!$tag) {
                    $tag = Tag::create([
                        'name' => $tag_name,
                    ]);
                }
                BlogTag::create([
                    'blog_id' => $blog->id,
                    'tag_id' => $tag->id,
                ]);
            }
        }

    }
}
