<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Requests\ColorRequest;
use App\Http\Resources\ColorResource;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ColorCollection
     */
    public function index(Request $request)
    {
        $colors = Color::all();

        return new ColorResource($colors);
    }

    /**
     * @param \App\Http\Requests\ColorStoreRequest $request
     * @return \App\Http\Resources\ColorResource
     */
    public function store(ColorRequest $request)
    {
        $color = Color::create($request->validated());

        return new ColorResource($color);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\color $color
     * @return \App\Http\Resources\ColorResource
     */
    public function show(Request $request, Color $color)
    {
        return new ColorResource($color);
    }

    /**
     * @param \App\Http\Requests\ColorUpdateRequest $request
     * @param \App\color $color
     * @return \App\Http\Resources\ColorResource
     */
    public function update(Request $request, Color $color)
    {
        $color->update($request->all());

        return new ColorResource($color);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\color $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Color $color)
    {
        $color->delete();

        return response()->json([
            'status' => true,
            'message' => 'Deleted successfully'
        ]);
    }
}
