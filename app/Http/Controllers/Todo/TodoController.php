<?php

namespace App\Http\Controllers\Todo;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
       $complete =  Todo::where('status',1)->get();
        if ($todos) {
            return response()->json([
                'status' => '200',
                'data' => $todos,
                'complete items' =>   $complete,
                'message' => 'Record found successfully!',
            ]);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'Record not Found!',
            ]);
        }
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            $status = false;
            $message =  $validator->errors()->first();
            return response()->json(['status' => $status, 'message' => $message], 404);
        }
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();
        if ($todo) {
            return response()->json([
                'status' => '200',
                'message' => 'Record created successfully!',
            ]);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'Record not Found!',
            ]);
        }
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
        $todo = Todo::find($id);
        if ($todo) {
            return response()->json([
                'status' => '200',
                'data' => $todo,
                'message' => 'Record found successfully!',
            ]);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'Record not Found!',
            ]);
        }
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            
        ]);
        if ($validator->fails()) {
            $status = false;
            $message =  $validator->errors()->first();
            return response()->json(['status' => $status, 'message' => $message], 404);
        }

        $todo = Todo::find($id);
        $todo->title = $request->input('title');
        $todo->update();

        if ($todo) {
            return response()->json([
                'status' => '200',
                'message' => 'Record Updated successfully!',
            ]);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'Record not Found!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        if ($todo) {
            return response()->json([
                'status' => '200',
                'message' => 'Record Delete successfully!',
            ]);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'Record not Found!',
            ]);
        }
    }
     public function status(Request $request, $id)
     {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            
        ]);
        if ($validator->fails()) {
            $status = false;
            $message =  $validator->errors()->first();
            return response()->json(['status' => $status, 'message' => $message], 404);
        }

        $todo = Todo::find($id);
        $todo->status = 1;
        $todo->update();

        if ($todo) {
            return response()->json([
                'status' => '200',
                'message' => 'Record Updated successfully!',
            ]);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'Record not Found!',
            ]);
        }
     }
}
