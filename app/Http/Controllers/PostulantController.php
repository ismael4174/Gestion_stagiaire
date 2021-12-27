<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\filiere;
use App\Models\postulant;
use App\Models\typestage;
use Illuminate\Support\Facades\DB;

class PostulantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=postulant::all();
        $fils=filiere::all();
        $type=typestage::all();
        $postulants = DB::select("select * from filieres, postulants, typestages where postulants.id_fil = filieres.id and postulants.id_tstage = typestages.id");
        return view('postulant.index', [
            'data'=>$data,
            'fils'=>$fils,
            'type'=>$type,
            'postulants'=>$postulants
        ]);

        // return view('postulant.index', compact('postulants', 'data','fils', 'type'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fils=filiere::all();
        $type=typestage::all();
        return view('postulant.create',[
            'fils'=>$fils,
            'type'=>$type
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
            'filiere'=>'required',
            'typestage'=>'required',
            'nom_post'=>'required',
            'pren_post'=>'required',
            'adress_post'=>'required',
            'sexe_post'=>'required',
            'naiss_post'=>'required',
            'nation_post'=>'required',
            // 'cv_post'=>'required',
            // 'demande_post'=>'required',
            // 'admission_post'=>'required',
        ]);

        // Postulant CV
        if($request->hasFile('cv_post')){
            $cv=$request->file('cv_post');
            $reCv=time().'.'.$cv->getClientOriginalExtension();
            $dest_cv=public_path('/documents/cv');
            $cv->move($dest_cv,$reCv);
        }else{
            $reCv='na';
        }

        // Postulant Demande
        if($request->hasFile('demande_post')){
            $demande=$request->file('demande_post');
            $reDemande=time().'.'.$demande->getClientOriginalExtension();
            $dest_demande=public_path('/documents/demande');
            $demande->move($dest_demande,$reDemande);
        }else{
            $reDemande='na';
        }

        // Postulant Admission
        if($request->hasFile('admission_post')){
            $admission=$request->file('admission_post');
            $reAdmission=time().'.'.$admission->getClientOriginalExtension();
            $dest_admission=public_path('/documents/admission');
            $admission->move($dest_admission,$reAdmission);
        }else{
            $reAdmission='na';
        }

        $postulant=new postulant;
        $postulant->id_fil=$request->filiere;
        $postulant->id_tstage=$request->typestage;
        $postulant->nom_post=$request->nom_post;
        $postulant->pren_post=$request->pren_post;
        $postulant->adress_post=$request->adress_post;
        $postulant->sexe_post=$request->sexe_post;
        $postulant->naiss_post=$request->naiss_post;
        $postulant->nation_post=$request->nation_post;
        $postulant->cv_post=0;
        $postulant->demande_post=0;
        $postulant->admission_post=0;
        $postulant->save();

        return redirect('postulant/create')->with('success','Les informations ont été ajouter avec succes');

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
        $request->validate([
            'filiere'=>'required',
            'typestage'=>'required',
            'nom_post'=>'required',
            'pren_post'=>'required',
            'adress_post'=>'required',
            'sexe_post'=>'required',
            'naiss_post'=>'required',
            'nation_post'=>'required',
            // 'cv_post'=>'required',
            // 'demande_post'=>'required',
            // 'admission_post'=>'required',
        ]);

        // Postulant CV
        if($request->hasFile('cv_post')){
            $cv=$request->file('cv_post');
            $reCv=time().'.'.$cv->getClientOriginalExtension();
            $dest_cv=public_path('/documents/cv');
            $cv->move($dest_cv,$reCv);
        }else{
            $reCv=$request->cv_post;
        }

        // Postulant Demande
        if($request->hasFile('demande_post')){
            $demande=$request->file('demande_post');
            $reDemande=time().'.'.$demande->getClientOriginalExtension();
            $dest_demande=public_path('/documents/demande');
            $demande->move($dest_demande,$reDemande);
        }else{
            $reDemande=$request->demande_post;
        }

        // Postulant Admission
        if($request->hasFile('admission_post')){
            $admission=$request->file('admission_post');
            $reAdmission=time().'.'.$admission->getClientOriginalExtension();
            $dest_admission=public_path('/documents/admission');
            $admission->move($dest_admission,$reAdmission);
        }else{
            $reAdmission=$request->admission_post;
        }

        $postulant=postulant::find($id);
        // $postulant->id_filiere=$request->filiere;
        // $post->tstage_id=$request->typestage;
        $postulant->nom_post=$request->nom_post;
        $postulant->pren_post=$request->pren_post;
        $postulant->adress_post=$request->adress_post;
        $postulant->sexe_post=$request->sexe_post;
        $postulant->naiss_post=$request->naiss_post;
        $postulant->nation_post=$request->nation_post;
        $postulant->cv_post=$reCv;
        $postulant->demande_post=$reDemande;
        $postulant->admission_post=$reAdmission;
        $postulant->save();

        return redirect('postulant/create')->with('success','Les informations ont été ajouter avec succes');
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
