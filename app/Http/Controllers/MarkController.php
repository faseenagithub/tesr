<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Marks;
use Session;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Marks::get();
        $students = Students::pluck('name','id');
        return view('mark_list',  compact('data','students'));
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
        Marks::create([
            'student_id'    => $request->student,
            'term'          => $request->term,
            'maths'         => $request->maths,
            'science'       => $request->science,
            'history'       => $request->history,
        ]);
        return back()->with('success_reg','Mark Added Successfully');
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
        $students = Students::pluck('name','id');
        $data = Marks::where('id',decrypt($id))->first();
        return view('edit_mark',  compact('data','students'));
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
        $item = Marks::where('id',decrypt($id))->first();
        $item->student_id   = $request->student;
        $item->maths        = $request->maths;
        $item->science      = $request->science;
        $item->history      = $request->history;
        $item->term         = $request->term;
        $item->save();
        return redirect(url('/mark-list'))->with('success','Mark Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Marks::where('id',decrypt($id))->delete();
        return back()->with('success','Mark Deleted Successfully');;
    }
}
