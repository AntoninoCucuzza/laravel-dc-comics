<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\AuthComicsRequest;
use App\Http\Controllers\Controller;
use App\Models\comics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $deletedComics = comics::onlyTrashed()->get();

        $comics = comics::paginate(10);

        return view('admin.admin', compact('comics', 'deletedComics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthComicsRequest $request)
    {
        $val_data = $request->validated();

        $data = $request->all();

        $newComic = new comics();
        $newComic->title = $data['title'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        /*$newComic->description = $data['description'];
           $newComic->writers = $data['writers'];
            $newComic->artists = $data['artists']; */
        $newComic->type = $data['type'];



        if ($request->has('thumb')) {
            $file_path = Storage::put('comics_thumbs', $request->thumb);
            $newComic->thumb = $file_path;
        }
        $newComic->save();


        return to_route('comics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(comics $comic)
    {
        return view('admin.show', compact('comic'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comics $comic)
    {

        return view('admin.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthComicsRequest $request, comics $comic)
    {
        $val_data = $request->validated();

        $data = $request->all();

        if ($request->has('thumb') && $comic->thumb) {

            Storage::delete($comic->thumb);

            $newImageFile = $request->thumb;
            $path = Storage::put('comic_image', $newImageFile);
            $data['thumb'] = $path;
        }

        $comic->update($data);

        return to_route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comics $comic)
    {

        if (!is_null($comic->thumb)) {
            Storage::delete($comic->thumb);
        }

        $comic->delete();

        return to_route('comics.index')->with('message', 'hai statoo bravoh ;-)');
    }
}
