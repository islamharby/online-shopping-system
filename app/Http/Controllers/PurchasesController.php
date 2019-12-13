<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Purchases;
use Socketlabs\SocketLabsClient;
use Socketlabs\Message\BasicMessage;
use Socketlabs\Message\EmailAddress;

class PurchasesController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id|numeric',
            'item_id' => 'required|exists:items,id|numeric',
        ]);

        if ($validator->fails()) {
            return  response()->json(['message' => $validator->errors()->all()]);
        }
        $item_user = new Purchases();
        $item_user->user_id = $request->user_id;
        $item_user->item_id = $request->item_id;
        $item_user->save();

        $serverId = 29818;
        $injectionApiKey = 's8R7Tpf9B4Pgj6G5McZk';
        $client = new SocketLabsClient($serverId, $injectionApiKey);
        $message = new BasicMessage();
        $message->subject = 'Online Shopping System';

        $message->htmlBody = '<html> <h1>Thank You For Buy From Site</h1> </html>';
        $message->from = new EmailAddress('Info@oss.com');

        $message->addToAddress($item_user->user['email']);
        $response = $client->send($message);

        return response()->json('done');
    }

    public function get_all(Request $request)
    {
        $purchases = Purchases::with('item')->with('user')->get();
        if (count($purchases) == 0) {
            return response()->json('error');
        }

        return response()->json(['data' => $purchases]);
    }
}
