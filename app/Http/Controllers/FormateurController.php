<?php

namespace App\Http\Controllers;

use App\Models\formateur;
use App\Models\service;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=formateur::all();
        $serv=service::all();
        $formateurs = DB::select("select * from formateurs, services where formateurs.id_serv = services.id");
        return view('formateur.index', [
            'data'=>$data,
            'formateurs'=>$formateurs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serv=service::all();
        return view('formateur.create',[
            'serv'=>$serv,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_serv'=>'required',
            'nom_form'=>'required',
            'pren_form'=>'required',
            'adress_form'=>'required',
            'tel_form'=>'required',
        ]);
        $formateur=new formateur;
        $formateur->id_serv=$request->id_serv;
        $formateur->nom_form=$request->nom_form;
        $formateur->pren_form=$request->pren_form;
        $formateur->adress_form=$request->adress_form;
        $formateur->tel_form=$request->tel_form;
        $formateur->save();

        return redirect('/formateur/create')->with('success', 'Les informations ont été ajouter');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
