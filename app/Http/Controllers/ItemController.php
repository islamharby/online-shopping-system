<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Item;

class ItemController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:items',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return  response()->json(['message' => $validator->errors()->all()]);
        }
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->save();

        return response()->json('done');
    }

    public function update(Request $request, $i)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return  response()->json(['message' => $validator->errors()->all()]);
        }
        $item = Item::where('id', $i)->first();
        if (!$item) {
            return response()->json('error');
        }
        if ($request->name) {
            if ($request->name != $item->name) {
                $validator = Validator::make($request->all(), [
                'name' => 'unique:items',
            ]);

                if ($validator->fails()) {
                    return  response()->json(['message' => 'This Name Has been Token']);
                }
                $item->name = $request->name;
            }
            $item->name = $request->name;
        }
        $item->price = $request->price;
        $item->save();

        return response()->json('done');
    }

    public function get_all(Request $request)
    {
        $items = Item::get();
        if (count($items) == 0) {
            return response()->json('error');
        }

        return response()->json(['data' => $items]);
    }

    public function get_by_id($i)
    {
        $item = Item::where('id', $i)->first();
        if (!$item) {
            return response()->json('error');
        }

        return response()->json(['data' => $item]);
    }

    public function delete($i)
    {
        $item = Item::where('id', $i)->first();
        if (!$item) {
            return response()->json('error');
        }
        $item->delete();

        return response()->json('done');
    }
}
