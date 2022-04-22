<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Http\Requests\OrderMessageStoreRequest;
use App\Http\Services\OrderService;
use App\Http\Services\UpdateStatusService;
use App\Models\Order;
use App\Models\OrderMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class OrderMessageController extends Controller
{
    private $OrderService;

    private $updateStatusService;

    public function __construct( OrderService $OrderService,UpdateStatusService $updateStatusService) {
        $this->OrderService = $OrderService;
        $this->updateStatusService = $updateStatusService;
    }

    public function index(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderMessageStoreRequest $request)
    {
        try {
            if(Auth::user()->isAdmin())
            {
                $this->updateStatusService->has_answer($request->order_id);
            }
            $this->OrderService->createOrderMessage($request->order_id,Auth::id(),$request->validated());
            return redirect()->back()->with('success','Сообщение успешно доставлено');
        }catch (\Exception $e){}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Order::where('id',$id)->get();

        $message = OrderMessage::where('order_id', $id)->get();


        return view('details', ['orders' => $orders,'message' => $message]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
