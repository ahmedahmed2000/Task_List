<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){

      //$tasks= DB::table('tasks')->orderBy('name')->get();
        $tasks = Task::all()->sortBy('name');
        return view('tasks',compact('tasks'));
    }

    public function show($id){
      //  $tasks= DB::table('tasks')->find($id);
        $task = Task::all();
        return view('show',compact('task'));
    }


     public function store(StorePostRequest $request  ){
        $validated = $request->validated();
    //  DB::table('tasks')->insert([
    //      'name'=> $request->name
    //  ]);
    // return redirect()->back();
    //
    //
    $task = new Task();
    $task->name = $request->name;
    $task-> save();

    return redirect()->back();

}

public function destroy($id){
    // DB::table('tasks')->where('id' , $id)->delete();
  $task = Task::findOrFail($id);// with primary keyval
  $task->delete();
  return redirect()->route("task.index");
}
public function edit($id){
  $task = Task::find($id);
  $tasks = Task::all()->sortBy('name');
  //return view('edit' , ['data' => $data]);
  return view('edit' , compact('tasks' , 'task'));
}


public function update(StorePostRequest $request){
$validated = $request->validated();
// $validated = $request->safe()->only(['name']);
//   $validated = $request->safe()->except(['name']);
  $data   = Task::find($request->id);
  $data->name =  $request->name;
  $data->save();
  //return $req->input();
  return redirect()->route("task.index");



}
}

//**********************************
// public function edit($id)
//     {
//        $tasks= DB::table('tasks')->orderBy('name')->get();
//          $task=DB::table('tasks')->find($id);
//
//
//         return view('edit', compact('task','tasks'));
//
//     }
//
//     public function update(Request $request)
//     {
//
//  $id = $request->id;
//       $task= DB::table('tasks')
//             ->where('id', '=',$id)
//             ->update(['name' => $request->name]);
//
//        $tasks=DB::table('tasks')->orderBy('name')->get();
//
//         return redirect('tasks');
//
//     }
// }
