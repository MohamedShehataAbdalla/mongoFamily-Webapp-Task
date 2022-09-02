<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grandson;


class GrandsonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $son_id = \request()->exists('son_id') ? \request()->input('son_id') : null;

        if($son_id)
        {
            $grandsons = auth()->user()->grandparent->sons()->with('grandsons')
            ->where('_id', $son_id)->first()->grandsons->paginate(5);
        }else 
        {
            $grandsons = collect([]);
            auth()->user()->grandparent->sons()->each(function ($son) use ($grandsons) {
                $grandsons->add($son->grandsons);
            });

            $grandsons = collect($grandsons->flatten())->paginate(5);
        }

        // $grandsons = Grandson::select()->get();
        return view('grandsons.index', compact('grandsons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grandsons.create');
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
        
        auth()->user()->grandparent->sons->grandsons()->create($request->all());

        return back()->with('status', 'Grand Son is Created');
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
