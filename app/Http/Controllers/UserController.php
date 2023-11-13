<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function check(Request $request)
    {
        //validate the input
        $request->validate([
            "email" => 'required|email',
            "password" => 'required|min:8',


        ]);

        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if ($request->password == $user->password) {
                $request->session()->put('id', $user->id);
                $request->session()->put('name', $user->name); 
                $request->session()->put('email', $user->email);
                if($user->image_path != null){
                    $request->session()->put('image', "storage/".$user->image_path); 
                }else {
                    $request->session()->put('profil', "false");
                    $request->session()->put('image', 'https://ui-avatars.com/api/?size=235&name='. $user['name']);
                } 
               /*  dd($user); */
                return redirect('/');
            } else {
                return back()->with('fail', 'Mot de passe incorrecte pour ce compte !');
            }
        } else {
            return back()->with('fail', "Désolé il semblerait que vous n'êtes pas inscrit sur notre site ! ");
        }
    }

    public function login()
    {
        if(Session::has('id'))
        {
            return redirect('/');
        } else {
            return view('connexion');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

    public function photo_view()
    {
        return view('logged.photo');
    }

    public function profil()
    {
        $voitures = Vehicule::where('user_id', session('id'))->get(); 
        $prefs = Preference::where('user_id', session('id'))->first(); 
        $discussion = $prefs->discussion;
        $musique = $prefs->musique;
        $cigarette = $prefs->cigarette;
        if($discussion || $musique || $cigarette) 
        {
            $boul = "Modifier";
        } else{
            $boul = "Ajouter";
        }
        return view('logged.profil', compact('prefs', 'boul', 'voitures'));
    }

    public function infos_perso()
    {
        return view('logged.infos_perso');
    }
    
    public function preferences()
    {
        return view('logged.preferences');
    }

    public function new_voiture()
    {
        return view('logged.new_voitures');
    }

    public function voiture_infos(Vehicule $voiture)
    {
        return view('logged.voiture_infos', compact('voiture'));
    }

    public function user_show($id)
    {
        return view('logged.user_profil', compact('id'));
    }
    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
