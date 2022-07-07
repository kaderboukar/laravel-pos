<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiverStoreRequest;
use App\Http\Requests\DiverUpdateRequest;
use App\Http\Resources\DiverResource;
use App\Models\Diver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $divers = new Diver();
        if ($request->search) {
            $divers = $divers->where('name', 'LIKE', "%{$request->search}%");
        }
        $divers = $divers->latest()->paginate(10);
        if (request()->wantsJson()) {
            return DiverResource::collection($divers);
        }
        return view('divers.index')->with('divers', $divers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('divers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiverStoreRequest $request)
    {
        $diver = Diver::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        if (!$diver) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating miscellaneous expense.');
        }
        return redirect()->route('divers.index')->with('success', 'Success, you miscellaneous expense have been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diver  $diver
     * @return \Illuminate\Http\Response
     */
    public function show(Diver $diver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diver  $diver
     * @return \Illuminate\Http\Response
     */
    public function edit(Diver $diver)
    {
        return view('divers.edit')->with('diver', $diver);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(DiverUpdateRequest $request, Diver $diver)
    {
        $diver->name = $request->name;
        $diver->description = $request->description;
        $diver->price = $request->price;

        if (!$diver->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while updating miscellaneous expense.');
        }
        return redirect()->route('divers.index')->with('success', 'Success, your miscellaneous expense have been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diver  $diver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diver $diver)
    {
        $diver->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
