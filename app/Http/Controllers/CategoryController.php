<?php

namespace Furbook\Http\Controllers;

use Illuminate\Http\Request;
use Furbook\Category;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response=[
            'categories'=>[]
        ];
        $categories=Category::All();
        foreach ($categories as $category) {
            $response['categories'][]=[
                'id'=> (int)$category->id,
                'name'=>$category->name,
            ];
        }
        return response($response,200);
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
        $validator=Validator::make($request->all(),
        [
            'name'=>'required|string|max:255',
        ],

        [
            'required'=> 'Cột :attribute là bắc buộc',
            'string'=>'Cột :attribute là chuỗi',
            'max'=>'Cột :attribute nhập quá :max kí tự',
        ]
    );
        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()],400);
        }
        $category= Category::create($request->All());
        $response= array(
            'category'=>array(
                'id'=>(int) $category->id,
                'name'=>$category->name,
            )
        );
                return response($category,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::findOrFail($id);
        $response=["category"=>[
            'id'=>(int) $id,
            'name'=>$category->name,
        ]];
        return response($response,200);
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
    public  function update(Request $request, $id)
    {
        $category= Category::findOrFail($id);
        $validator=Validator::make($request->all(),
        [
            'name'=>'required|string|max:255',
        ],

        [
            'required'=> 'Cột :attribute là bắc buộc',
            'string'=>'Cột :attribute là chuỗi',
            'max'=>'Cột :attribute nhập quá :max kí tự',
        ]
    );
        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()],400);
        }
        $category->update($request->all());
        $response= array(
            'category'=>array(
                'id'=>(int) $category->id,
                'name'=>$category->name,
            )
        );
                return response($category,201);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= Category::findOrFail($id);
        if (!$category->delete()) {
          return  response(null,500);   
        }
        return response(null,200);
    }
}
