<?php

namespace Furbook\Http\Controllers;

use Illuminate\Http\Request;
use Furbook\Http\Requests\CatRequest;
use Furbook\Cat;
use validator;
use Auth;
class CatController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin')->only('destroy');
    }
    public function index(Request $request)
    {
        $perpage=5;
        $cats= Cat::paginate($perpage);
        if ($request->ajax()) {
            return  view('partials/cat')->with('cats',$cats);
        }
        //$cats=Cat::All();
        return view('cats/index')->with('cats',$cats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //define rule validate
         $validator=$request->validate([
        //$validator= Validator::make($request->all(),
            'name'=>'required|max:255',
            'date_of_birth'=>'required|date_format:"Y/m/d"',
            'breed_id'=>'numeric',
        ],
         [
        'required' => 'Cột :attribute là bắt buộc.',
        'size' => 'Cột :attribute độ dài phải nhỏ hơn :size .',
        'date_format' => 'Cột :attribute phai là kiểu Y/m/d.',
        'numeric' => 'Cột :attribute phải là số.',
        ]

    );

        //  //if data validate
        //  if ($validator->fails()) {
        //     return redirect('cats/create')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
         //give user_id login
         $user_id=Auth::user()->id;
         $request->request->add(['user_id'=> $user_id]);
        //insert cat
       $cat = Cat::create($request->all());
       return redirect()
            ->route('cats.show', $cat->id)
            ->with('cat', $cat)
        ->withSuccess('Create cat success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cat $cat)
    {
        return view('cats.show')->with('cat',$cat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cat $cat)
    {
        if (!Auth::user()->CanEdit($cat)) {
            return redirect()->route('cats.index')->withErrors('Fermission denied');
        }
        return view('cats.edit')->with('cat',$cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CatRequest  $request
     * @param  Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function update(CatRequest $request, Cat $cat)
    {
         if (!Auth::user()->canEdit($cat)) {
            return redirect()->route('cats.index')->withErrors('Fermission denied');
        }
        $cat->update($request->all());
        return redirect()
            ->route('cats.show', $cat->id)
            ->withSuccess('Update cat success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cat $cat)
    {
        // $cat= Cat::find($id);
        $cat->delete();
        return redirect()->route('cats.index')->withSuccess('Delete success');
    }
}
