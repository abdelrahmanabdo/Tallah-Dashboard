<?php

namespace App\Http\Controllers;

use App\Http\Requests\StylistSpecializationRequest;
use App\Http\Requests\StylistSpecializationUpdateRequest;
use App\Http\Resources\StylistSpecializationCollection;
use App\Http\Resources\StylistSpecializationResource;
use App\Models\StylistSpecialization;
use Illuminate\Http\Request;

class StylistSpecializationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\StylistSpecializationCollection
     */
    public function index(Request $request)
    {
        $stylistSpecializations = StylistSpecialization::all();

        return new StylistSpecializationCollection($stylistSpecializations);
    }

    /**
     * @param \App\Http\Requests\StylistSpecializationStoreRequest $request
     * @return \App\Http\Resources\StylistSpecializationResource
     */
    public function store(StylistSpecializationRequest $request)
    {

        foreach ($request->all() as $key => $specialization) {
            $newSpecialization = StylistSpecialization::create([
                'stylist_id' => $specialization['stylist_id'],
                'specialization_id' => $specialization['id'],
                'description' => $specialization['description'],
                'start_price' => $specialization['start_price'],
            ]);
        }

        $specializations = $request->all();

        return new StylistSpecializationResource($specializations);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\stylistSpecialization $stylistSpecialization
     * @return \App\Http\Resources\StylistSpecializationResource
     */
    public function show(Request $request, StylistSpecialization $stylistSpecialization)
    {
        return new StylistSpecializationResource($stylistSpecialization);
    }

    /**
     * @param \App\Http\Requests\StylistSpecializationUpdateRequest $request
     * @param \App\stylistSpecialization $stylistSpecialization
     * @return \App\Http\Resources\StylistSpecializationResource
     */
    public function update(StylistSpecializationUpdateRequest $request, StylistSpecialization $stylistSpecialization)
    {
        $stylistSpecialization->update($request->validated());

        return new StylistSpecializationResource($stylistSpecialization);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\stylistSpecialization $stylistSpecialization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, StylistSpecialization $stylistSpecialization)
    {
        $stylistSpecialization->delete();

        return response()->noContent();
    }
}
