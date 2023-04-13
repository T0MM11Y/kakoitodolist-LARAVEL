<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoListController extends Controller
{




    public function saveItem(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $todolist = new todolist;
        $todolist->name = $request->input('name');
        $todolist->is_complete = false;
        $todolist->save();

        return redirect('/');
    }
    public function markItem($id)
    {
        $todolist = todolist::find($id);

        $todolist->is_complete = true;
        $todolist->save();

        return redirect('/');
    }
    public function deleteItem($id)
    {
        $todolist = todolist::find($id);

        $todolist->is_complete = true;
        $todolist->delete();

        return redirect('/');
    }
}
