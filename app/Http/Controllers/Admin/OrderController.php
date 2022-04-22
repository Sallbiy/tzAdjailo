<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UpdateStatusService;
use App\Models\Order;
use App\Models\OrderMessage;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    private $updateStatusService;

    public function __construct(UpdateStatusService $updateStatusService)
    {
        $this->updateStatusService = $updateStatusService;
    }


    public function index()
    {
        $orders = Order::query()->get();

        return view('admin.index',['orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function closeStatus(Request $request)
    {

        try{
            $this->updateStatusService->close($request->id);
            return redirect()->back()->with('success','Заявка успешно отклонена');
        }catch (\Exception $e){

        }
    }

    public function approvedStatus(Request $request)
    {
        try {
            $this->updateStatusService->approved($request->id);
            return redirect()->back();
        }catch (\Exception $e){

        }
    }


    public function show(Order $order)
    {
        $orders = Order::where('id',$order->id)->get();

        $message = OrderMessage::where('order_id',$order->id)->get();

        if($order->is_read == 0)
        {
            $this->updateStatusService->is_Read($order->id);
        }

        return view('admin.details', ['orders' => $orders,'message' => $message]);
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
