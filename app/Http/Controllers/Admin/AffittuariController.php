<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAffittuariRequest;
use App\Http\Requests\StorePagamentiRequest;
use App\Models\Affittuario;
use App\Models\House;
use App\Models\Pagamenti;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class AffittuariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $affittuari = DB::table('affittuari')
            ->join('houses', 'affittuari.house_id', '=', 'houses.id')
            ->where('houses.user_id', $id)
            ->select('affittuari.*')
            ->get();

        return view('admin.affittuari.index', compact('affittuari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id;
        $houses = DB::table('houses')->where('user_id', $id)->get();

        // dd($houses);
        // die;

        return view('admin.affittuari.create', compact('id', 'houses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAffittuariRequest $request)
    {
        $data = $request->validated();
        $affittuario = new Affittuario();

        $affittuario->fill($data);
        $affittuario->save();


        return redirect()->route('affittuari.index')->with('message', 'utente inserito');
        // return var_dump($affittuario);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function formatData($par_1, $par_2){
        $dataBella = Carbon::parse($par_1->$par_2);
        $format = $dataBella->formatLocalized('%d %B %Y');
        return $format;
     }
    public function show($id)
    {
        $affittuario = Affittuario::find($id);
        $pagamenti = DB::table('pagamenti')->where('affittuario_id', $id)->get();
        $inizio_contratto_ = 'inizio_contratto';
        $formatInizioDate = $this->formatData($affittuario, $inizio_contratto_);
        $format = '';
        foreach ($pagamenti as $pagamento) {
            $data_pagamento = 'data_pagamento';
            $formattedDate = $this->formatData($pagamento, $data_pagamento);
            $format = $formattedDate;
        }


        // dd($pagamenti);

        return view('admin.affittuari.show', compact('affittuario', 'pagamenti', 'format', 'formatInizioDate'));
    }

    public function addPagamenti($id)
    {
        $affittuario = Affittuario::find($id);
        // $date = date('m/d/Y h:i:s a', time());
        $date = Carbon::now()->toDateString();

        $newPagamento = new Pagamenti();

        $newPagamento->affittuario_id = $affittuario->id;
        $newPagamento->data_pagamento = $date;
        $newPagamento->save();

        return redirect()->route('affittuari.index')->with('message', 'pagamento aggiunto');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $affittuario = Affittuario::find($id);
        $id_user = Auth::user()->id;
        $houses = DB::table('houses')->where('user_id', $id_user)->get();


        return view('admin.affittuari.edit', compact('id', 'affittuario', 'houses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAffittuariRequest $request, $id)
    {
        $data = $request->validated();
        $affittuario = Affittuario::find($id);

        $affittuario->update($data);

        return redirect()->route('affittuari.index')->with('message', 'Aggiornamento avvenuto con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affittuario = Affittuario::find($id);
        $old_id = $id;
        $affittuario->delete();

        return redirect()->route('houses.index')->with('message', "affittuario $old_id eliminato con successo");

    }
}
