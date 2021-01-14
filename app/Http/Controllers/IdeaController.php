<?php

namespace App\Http\Controllers;

use App\Http\Resources\Idea\Pagination\IdeaPaginationResourceCollection;
use App\Models\Idea;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ideas = Idea::when($request->has('types'), function (Builder $query) use ($request) {
            return $query->whereIn('type', explode(',', $request->types));
        })
        ->when($request->has('min_rating') && $request->has('max_rating'), function (Builder $query) use ($request) {
            return $query->whereBetween('rating', [$request->min_rating, $request->max_rating]);
        })
        ->when($request->has('search_query'), function (Builder $query) use ($request) {
            return $query->whereRaw('MATCH (name, description) AGAINST (?)' , explode(' ', $request->search_query));
        })
        ->paginate();

        return response()->json(new IdeaPaginationResourceCollection($ideas), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function show(Idea $idea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function edit(Idea $idea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Idea $idea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idea $idea)
    {
        //
    }
}
