<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function allTasks() {
        $tasks = $this->getAllTasks();

        //tarefas do id 4
        // Task::TaskByUSer(4);

        //chamar pela variável do modelo
        //Task::STATUS_COMPLETED;

        // dd( $tasks);   // »»» debug
        return view('tasks.all_tasks', compact('tasks'));
    }

        // protected function getAllTasks() {
        //     return DB::table('tasks')
        //     ->join('users', 'tasks.user_id', '=', 'users.id')
        //     ->select('tasks.name', 'tasks.status', 'tasks.due_at', 'users.name as user_name')
        //     ->get();
        // }
        protected function getAllTasks() {
            $tasks = Task::join('users', 'tasks.user_id', '=', 'users.id')
            ->select('tasks.id','tasks.name', 'tasks.status', 'tasks.due_at', 'users.name as user_name')
            ->get();

        return $tasks;
        }


        public function deleteTasks($id) {
            Task::where('id', $id)->delete();

            return back();
        }


        public function editTasks(int $id){
            $taskInfo = Task::join('users', 'tasks.user_id','=' ,'users.id')
            ->where('tasks.id', $id)
            ->select('tasks.id', 'tasks.description','tasks.due_at', 'tasks.status', 'tasks.name','users.name as user_name')
            ->first();

        return view('tasks.edittask', compact('taskInfo'));

    }


    public function addTasks() {
    // lista de users p/o select do formulário
        $users = User::select('id', 'name')->get();
        //dd($users);

    return view('tasks.addtask', compact('users'));
}

    public function storeTasks(Request $request) {
        //validar os dados no servidor
        $request->validate([
        'name'        => 'required|string|max:50',
        'description' => 'required',
        'user_id'     => 'required|exists:users,id',
    ]);

    // depois de validados, inserir na bd
    Task::insert([
        'name'        => $request->name,
        'description' => $request->description,
        'user_id'     => $request->user_id,
    ]);

    return redirect()->route('tasks.all')->with('message', 'Tarefa adicionada com sucesso!');
    }


}
