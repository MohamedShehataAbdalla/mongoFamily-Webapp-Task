<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Son;
use App\Models\Grandparent;
use Auth;

class SonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $grandparent_id = \request()->exists('grandparent_id') ? \request()->input('grandparent_id') : null;

        if($grandparent_id)
        {
            $sons = auth()->user()->grandparent()->with('sons')
            ->where('_id', $grandparent_id)->first()->sons->paginate(5);
        }else 
        {
            $sons = auth()->user()->grandparent()->with('sons')->first()->sons->paginate(5);
        }

        // $sons = Son::select()->get();
        // $sons = Grandparent::where('user_id', Auth::user()->id )->first()->sons;
        // $sons = Son::select()->where('grandparent_id', \request()->input('grandparent_id'))->get();
        // $sons = Grandparent::with('sons')->where('_id', \request()->input('grandparent_id'))->first()->sons;
        
        return view('sons.index', compact('sons'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'birth_date' => 'required|date_format:Y-m-d',
            'gender' => 'required',
        ]);

        if ($request->has('gender'))
        {
            if ($request->gender == "1")
                $request->request->add(['gender' => true]);
            else
                $request->request->add(['gender' => false]);
        }
        
        auth()->user()->grandparent->sons()->create($request->all());

        return back()->with('status', 'Son is Created');
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
