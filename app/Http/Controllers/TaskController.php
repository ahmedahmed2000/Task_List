<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
      $tasks= DB::table('tasks')->orderBy('name')->get();
    //  $tasks = Task::all();
        return view('tasks',compact('tasks'));
    }

    public function show($id){
        $tasks= DB::table('tasks')->find($id);
        return view('show',compact('task'));
    }


     public function store(Request $request  ){

     DB::table('tasks')->insert([
         'name'=> $request->name
     ]);
    return redirect()->back();
    //
    //
    // $task = new Task();
    // $task->name = $request->name;
    // $task-> save();
    //
    // return redirect()->back();

}

public function delete($id){
    DB::table('tasks')->where('id' , $id)->delete();
  // Task::find($id) ->delete();// with primary keyval
    // Task::find($id); without primay key
    //  Task->delete();
  return redirect()->back();
}
// public function edit($id){
//   $data = Task::find($id);
//   $tasks = Task::all();
//   //return view('edit' , ['data' => $data]);
//   return view('edit' , compact('tasks' , 'data'));
// }
//
//
// public function update(Request $req){
//   $data   = Task::find($req->id);
//   $data->name =  $req->name;
//   $data->save();
//   //return $req->input();
//   return redirect('tasks');
// }
// }

//**********************************
public function edit($id)
    {
       $tasks= DB::table('tasks')->orderBy('name')->get();
         $task=DB::table('tasks')->find($id);


        return view('edit', compact('task','tasks'));

    }

    public function update(Request $request)
    {

 $id = $request->id;
      $task= DB::table('tasks')
            ->where('id', '=',$id)
            ->update(['name' => $request->name]);

       $tasks=DB::table('tasks')->orderBy('name')->get();

        return redirect('tasks');

    }
}
