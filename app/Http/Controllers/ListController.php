<?php

namespace App\Http\Controllers;

use App\Models\NewList;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index(Request $request){
        if($request->isMethod('post')){
        $list = new NewList();
        $list->newLists = request('newList');
        $list->save();

        return redirect('/main');
        }else{
            $newLists = NewList::latest()->get();

            return view('main', ['newLists' => $newLists]);
        }

    }
    public function getNotesForList($listId)
    {
        // Assuming you have a relationship set up between NewList and Note models
        $notes = NewList::findOrFail($listId)->notes;

        return response()->json($notes);
    }
}
