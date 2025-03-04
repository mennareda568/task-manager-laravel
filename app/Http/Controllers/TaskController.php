<?php
namespace App\Http\Controllers;
use App\Model\Task;
use App\Model\Pendingtask;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{

    public function index()
    {
        $Task = Task::where('user_id', auth()->id())->paginate(5);
        $counttask = Task::where('user_id', auth()->id())->count();
        if($counttask==0){
            return redirect()->route('home')->with("message", "No Tasks");
         }

        return view('task', [
            "result" => $Task,
        ]);
    }

    public function delete($id)
    {
        $Task = Task::findOrFail($id);
        $Task->delete();
        return redirect()->route('tasks')->with("message", "deleted successfully");
    }

    public function deleteSelected()
    {
        Task::where('user_id', auth()->id())->delete();
        return redirect()->route('home')->with('message', '  Successfully Deleted');
    }

    public function restore($id)
    {
        $tasks = Task::findOrFail($id);
        $user_id = $tasks->user_id;
        $title = $tasks->title;
        $content = $tasks->content;
        $date = $tasks->date;

        Pendingtask::create([
            "user_id" => $user_id,
            "title" => $title,
            "content" => $content,
            "date" => $date,
        ]);
        $tasks->delete();
        return redirect()->route('tasks')->with("message", "Task Is Restored");
    }

    public function restoreall()
    {
        DB::insert('insert into pendingtasks (title, content, user_id,date) select title, content, user_id,date from tasks where user_id = ?', [auth()->id()]);
        Task::where('user_id', auth()->id())->delete();
        return redirect()->route('home')->with("message", "Restored All Tasks");
    }


}
