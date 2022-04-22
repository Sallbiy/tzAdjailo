<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderMessageStoreRequest;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Resources\OrderResource;
use App\Http\Services\OrderService;
use App\Http\Services\UpdateStatusService;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    private $OrderService;
    private $updateStatusService;

    public function __construct(OrderService $OrderService,UpdateStatusService $updateStatusService)
    {
        $this->OrderService = $OrderService;
        $this->updateStatusService = $updateStatusService;
    }

    public function index()
    {
        $orders = OrderResource::collection(
            Order::where('user_id',Auth::id())->get()
        );

        return view('index', ['orders' => $orders]);
        //не нужен нам compact,обойдемся массивом :)
    }


    public function store(OrderStoreRequest $request)
    {
        try {

            $this->OrderService->create(Auth::id(), $request->validated());

            return redirect()->back()->with('success','Заявка успешно создана');
        } catch (\Exception $e) {

        }

    }


    public function closeStatus(Request $request)
    {

        try{
            $this->updateStatusService->close($request->id);

            return redirect()->back()->with('success', 'Заявка успешно отклонена');
        }catch (\Exception $e){

        }
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
