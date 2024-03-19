<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\House;
use App\Http\Requests\StoreHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $houses = DB::table('houses')->where('user_id', $id)->get();

        return view('admin.houses.index', compact('houses'));

    }
    public function home()
    {
        // $houses = House::inRandomOrder()->paginate(3);

        return view(
            'site.home'
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.houses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHouseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHouseRequest $request)
    {
        // prendo user id
        $id = Auth::user()->id;
        // prendi i dati dalla validazione

        $data = $request->validated();
        // var_dump($data);
        // die();
        $house = new House();
        // salva user nel user_id

        $house->fill($data);
        $house->user_id = $id;

        $house->slug = Str::slug($data['title']);
        $house->img = Storage::put('uploads', $data['img']);
        //  if(isset($data['img'])){
        //      $house->img = Storage::put('uploads', $data['img']);
        //  }
        $house->save();

        return redirect()->route('houses.index')->with('message', 'casa creata con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show(House $house)
    {
        // dd($house->title);

        return view('admin.houses.show', compact('house'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house)
    {
        return view('admin.houses.edit', compact('house'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHouseRequest  $request
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHouseRequest $request, House $house)
    {
        $data = $request->validated();
        $house->slug = Str::slug($data['title']);

        if (isset($data['img'])) {
            // se esiste img cancella
            if ($house->img) {
                Storage::delete($house->img);
            }
            $house->img = $data['img'];
        }

        if (isset($data['img'])) {
            $house->img = Storage::put('uploads', $data['img']);
        }

        $house->update($data);

        return redirect()->route('houses.index')->with('message', "casa $house->id modificata con successo");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        $old_id = $house->id;
        $house->delete();

        return redirect()->route('houses.index')->with('message', "casa $old_id eliminata con successo");


    }
}
