<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use App\Models\PageTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::paginate();
        return view('control-panel.pages.index',[
            'pages' => $pages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control-panel.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $data = $request->validated();

        $image = null;


        DB::beginTransaction();

        try
        {
            if($request->hasFile('main_image') && $request->file('main_image')->isValid())
            {
                $image = $request->file('main_image')->store('pages','public');
            }

            $data['main_image'] = $image;

            $page = Page::create($data);

            $this->insertTags($data['tags'],$page);

            if($request->hasFile('gallery'))
            {
                foreach($request->file('gallery') as $file)
                {
                    $image = $file->store('pages','public');
                    $page->images()->create([
                        'image' => $image,
                    ]);
                }
            }

            DB::commit();

        }catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('pages.index')
                ->with('error', 'Operation failed');
        }

        return redirect()->route('pages.index')->with('success' ,'Page '.$page->name.' Created Done!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('control-panel.pages.show',[
            'page' => $page,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $tags = $page->tags()->pluck('name')->toArray();
        $tags = implode(', ', $tags);

        return view('control-panel.pages.edit',[
            'page' => $page,
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
    public function update(UpdatePageRequest $request, Page $page)
    {

        $data = $request->validated();

        $image = $page->main_image;

        DB::beginTransaction();

        try
        {

            if($request->hasFile('main_image') && $request->file('main_image')->isValid())
            {
                Storage::disk('public')->delete($image);
                $image = $request->file('main_image')->store('pages','public');
                $data['main_image'] = $image;
            }



            foreach($page->images as $gallery)
            {
                if($request->has("check_".$gallery->id) == 1)
                {
                    Storage::disk('public')->delete($gallery->image);
                    $gallery->delete();
                }
            }


            $page->update($data);
            $this->insertTags($data['tags'],$page);
            if($request->hasFile('gallery'))
            {
                foreach($request->file('gallery') as $file)
                {
                    $gallery_image = $file->store('pages','public');
                    $page->images()->create([
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

            return redirect()->route('pages.index')->with('success' ,'Page '.$page->name.' Updated Done!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        foreach($page->images as $gallery)
        {
            Storage::disk('public')->delete($gallery->image);
            $gallery->delete();
        }

        Storage::disk('public')->delete($page->main_image);
        $page->delete();
        return redirect()->route('pages.index')->with('success','Page Deleted Done!');
    }

    protected function insertTags($tags, $page)
    {
        PageTag::where('page_id',$page->id)->delete();
        $tags_ids = [];
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
                PageTag::create([
                    'page_id' => $page->id,
                    'tag_id' => $tag->id,
                ]);
            }
        }

    }
}
