<?php

namespace App\Http\Controllers;

use App\Models\Todomodel;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tdm=new TodoModel;
        $data=$tdm->all();
        return view('tasklistpage',['data'=>$data]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tdm=new TodoModel;
        $tdm->email=$request->get('email');
        $tdm->username=$request->get('user');
        $tdm->password=$request->get('pwd');
        $tdm->save();
        return redirect('todoform');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todomodel  $todomodel
     * @return \Illuminate\Http\Response
     */
    public function show(Todomodel $todomodel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todomodel  $todomodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Todomodel $todomodel,$id,Request $request)
    {
        $upddata=$request->input();
        $request->session()->put('email',$upddata['email']);
        
        return view('updpage');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todomodel  $todomodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todomodel $todomodel)
    {
        $todomodel->email=$request->get('email');
        $todomodel->username=$request->get('user');
        $todomodel->password=$request->get('pwd');
        $todomodel->save();
        return redirect('tasklistpage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todomodel  $todomodel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todomodel $todomodel,$id)
    {
        $data=$todomodel->find($id);
        $data->delete();
        return redirect('tasklistpage');
    }
}
