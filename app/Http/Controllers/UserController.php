<?php

namespace App\Http\Controllers;

use App\Item;
use App\Purchases;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Socketlabs\SocketLabsClient;
use Socketlabs\Message\BasicMessage;
use Socketlabs\Message\EmailAddress;
use Validator;

class UserController extends Controller
{
    public function view_home()
    {
        $data = Item::get();
        return view('user.home')->withData($data);
    }
    public function view_history()
    {
        $purchases = Purchases::where('user_id', Auth::user()->id)->get();
        $data = [];
        foreach ($purchases as $key => $value) {
            $items_array = explode(",", $value->item_id);
            $items = Item::whereIn('id', $items_array)->get();
            $total = 0;
            foreach ($items as $key => $item) {
                $total += $item->price;
            }
            $data[] = [
                'No_procurement_bill' => $value->No_procurement_bill,
                'total' => $total,
                'purchases_items' => $items,
            ];
        }
        return view('user.history')->withData($data);
    }
    public function view_purchases($i)
    {
        $data = Purchases::where('id', $i)->with('user')->first();
        $items_array = explode(",", $data->item_id);
        $items = Item::whereIn('id', $items_array)->get();
        $total = 0;
        foreach ($items as $key => $value) {
            $total += $value->price;
        }
        return view('user.purchases')->withData($data)->withItems($items)->withTotal($total);
    }
    public function add_purchases(Request $request)
    {
        $item_user = new Purchases();
        $item_user->user_id = Auth::user()->id;
        $item_user->item_id = implode(",", $request->ids);
        $item_user->No_procurement_bill = mt_rand();
        $item_user->save();

        $items = Item::whereIn('id',$request->ids)->get();
        $total = 0;
        foreach ($items as $key => $value) {
            $total += $value->price;
        }

        $serverId = 29818;
        $injectionApiKey = 's8R7Tpf9B4Pgj6G5McZk';
        $client = new SocketLabsClient($serverId, $injectionApiKey);
        $message = new BasicMessage();
        $message->subject = 'Online Shopping System';
        $message->htmlBody = '<html> <h1>Thank You For Buy From Site</h1> <hr> <h3>Invoice</h3> <br> No.procurement bill : '.$item_user->No_procurement_bill.' <h4>Total</h4>'.$total.'</html>';
        $message->from = new EmailAddress('Info@oss.com');
        $message->addToAddress($item_user->user['email']);
        $response = $client->send($message);
        return response()->json(['msg' => 'done', 'id' => $item_user->id]);
    }

    public function check()
    {
        $user_info = User::where('id', Auth::user()->id)->first();
        if ($user_info->card_name == null ||
            $user_info->card_type == null ||
            $user_info->date_month == null ||
            $user_info->date_year == null ||
            $user_info->card_number == null ||
            $user_info->cvc == null) {
            return response()->json(['message' => 'not_update', 'id' => $user_info->id]);
        } else {
            return response()->json(['message' => 'update']);
        }
    }
    public function update_info_view($i)
    {
        $data = User::where('id', $i)->first();
        return view('user.info')->withData($data);
    }
    public function update_info_process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'card_name' => 'required|string|unique:users',
            'card_type' => 'required|string',
            'card_number' => 'required|numeric|unique:users',
            'date_month' => 'required|string|between:1,12',
            'date_year' => 'required',
            'cvc' => 'required|numeric|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'Something went wrong. Please try again!']);
        }
        $user = User::where('id',$request->id)->first();
        if (!$user) {
            return response()->json(['msg' => 'Something went wrong. Please try again!']);
        }
        $user->card_name = $request->card_name;
        $user->card_type = $request->card_type;
        $user->card_number = $request->card_number;
        $user->date_month = $request->date_month;
        $user->date_year = $request->date_year;
        $user->cvc = $request->cvc;
        $user->save();

        return response()->json(['page' => 'home']);
    }
}
