<?php

namespace App\Http\Controllers;

use App\Models\NewList;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function show(){
        return view('main', [

        ]);
    }
    public function storeNotes(Request $request){
            $note = new Note();
            $note->title=request('title');
            $note->notes=request('notes');
            $note->due_date=request('due_date');
            $note->new_list_id=request('newList');
            $note->save();


            return redirect('/main');
    }
    public function  showNotes() {
        $data = Note::latest()->get();

        $upcomingTasks = Note::where('due_date', '>', now())->get();

        $todayLists = Note::whereDate('due_date', now(config('app.timezone'))->toDateString())->get();

        $newLists = NewList::latest()->get();





        return view('/main', ['data' => $data, 'tasks' => $upcomingTasks, 'todayLists' => $todayLists, 'newLists' => $newLists]);
    }

    public function storeLists(){
        $list = new NewList();
        $list->newLists = request('newList');
        $list->save();
        return redirect('/main');

    }

        public function destory(Request $request, $id)
        {
            // Find the model instance by ID
            $model = Note::findOrFail($id);

            // Delete the model
            $model->delete();

            // Redirect back or wherever you want after deletion
            return redirect()->back()->with('success', 'Item deleted successfully');
        }
        public function update(Request $request, $id){

            $validatedData = request()->validate([
                'title' => 'required',
                'notes' => 'required'

            ]);

            $item = Note::findOrFail($id);

            $item->update([

                'title' => $validatedData['title'],
                'notes' => $validatedData['notes'],


            ]);

            return redirect('/main');

        }
        public function edit($id){
            $item = Note::findOrFail($id);
            return view('main.edit')->with('item', $item);
        }

        // public function editist(Request $request, $id)
        // {
        //     $newList = NewList::find($id);

        //     // If it's a POST request, update the item
        //     if ($request->isMethod('post')) {
        //         $newList->update($request->all());
        //         return response()->json(['success' => true, 'message' => 'Item updated successfully']);
        //     }

        //     // If it's a GET request, display the edit form
        //     return view('newLists.edit', compact('newList'));
        // }

        public function updateList(Request $request, $id) {
            // Validate the request data
            $validatedData = $request->validate([
                'newList' => 'required'
            ]);

            // Find the NewList model by ID
            $newList = NewList::findOrFail($id);

            // Update the data
            $newList->update([
                'newLists' => $validatedData['newList']
            ]);

            // Redirect back to the main page or wherever you need
            return redirect('/main');
        }
        public function deleteLists(Request $request, $id ){

            $list = NewList::findORFail($id);

            $list->delete();

            return redirect('/main');
        }
        public function getNotesForList($listId)
        {
            // Assuming you have a relationship set up between NewList and Note models
            $notes = NewList::findOrFail($listId)->notes;

            return response()->json($notes);
        }


}
