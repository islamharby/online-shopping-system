<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Validator;

class AdminController extends Controller
{
    public function view_dashboard()
    {
        $data = Item::get();
        return view('admin.dashboard')->withData($data);
    }
    public function view_create()
    {
        return view('admin.item.add');
    }
    public function create_process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:items',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'Something went wrong. Please try again!']);
        }
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->save();

        return response()->json(['msg' => 'done']);
    }
    public function view_edit($i)
    {
        $item = Item::where('id', $i)->first();
        return view('admin.item.edit')->withItem($item);
    }
    public function edit_process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'Something went wrong. Please try again!']);
        }
        $item = Item::where('id', $request->id)->first();
        if (!$item) {
            return response()->json(['msg' => 'Something went wrong. Please try again!']);
        }
        if ($request->name) {
            if ($request->name != $item->name) {
                $validator = Validator::make($request->all(), [
                    'name' => 'unique:items',
                ]);

                if ($validator->fails()) {
                    return response()->json(['msg' => 'This Name Has been Token']);
                }
                $item->name = $request->name;
            }
            $item->name = $request->name;
        }
        $item->price = $request->price;
        $item->save();

        return response()->json(['msg' => 'done']);
    }

    public function delete($i)
    {
        $item = Item::where('id', $i)->first();
        if (!$item) {
            session()->flash('error', 'Not Found');
            return back();
        }
        $item->delete();

        session()->flash('success', 'Done');
        return back();
    }
}
