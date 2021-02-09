<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\Util;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\JsonStructures\Base\JsonResponse;
use App\JsonStructures\TrackingOrderJson;
use App\Models\Order;
use App\Models\TrackingOrder;
use App\Models\User;
use App\Repositories\OrderRepository;
use App\Repositories\TrackingOrderRepository;
use App\Repositories\UserRepository;
use ErrorException;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    protected $userModel;
    protected $orderModel;
    protected $trackingOrderModel;

    public function __construct(User $user, Order $order, TrackingOrder $trackingOrder)
    {
        $this->userModel = new UserRepository($user);
        $this->orderModel = new OrderRepository($order);
        $this->trackingOrderModel = new TrackingOrderRepository($trackingOrder);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index()
    {
        $rules = [
            'tracking_code' => 'required|string'
        ];

        $this->validate(request(), $rules);

        $trackingCodeInput = request()->get('tracking_code');

        $trackingOrder = $this->trackingOrderModel->findByTrackingCode($trackingCodeInput);

        $trackingOrderObj = [
            TrackingOrder::TRACKING_ORDER => $trackingOrder
        ];
        $trackingOrderJson = (new TrackingOrderJson($trackingOrderObj))->toArray();

        return JsonResponse::response($trackingOrderJson, trans('response.general.success'), 200, 200);
    }


    /**
     * @param OrderRequest $request
     * @return \Illuminate\Http\Response
     * @throws ErrorException
     */
    public function create(OrderRequest $request)
    {

        $data = $request->validated();

        $user = $this->userModel->findByEmail($data['email']);

        try {
            DB::beginTransaction();

            $order = $this->orderModel->create([
                Order::SOURCE_CURRENCY => $data['source_currency'],
                Order::DESTINATION_CURRENCY => $data['destination_currency'],
                Order::PRICE_SOURCE_CURRENCY => $data['price_source_currency'],
            ]);

            $trackingOrder = $this->trackingOrderModel->create([
                TrackingOrder::ORDER_ID => $order->id,
                TrackingOrder::USER_ID => $user->id,
                TrackingOrder::TRACKING_CODE => Util::generate_random_string(10),
            ]);

            $trackingCode = [
                TrackingOrder::TRACKING_CODE => $trackingOrder[TrackingOrder::TRACKING_CODE]
            ];

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            throw new ErrorException(trans('response.errors.error_storing_for_information'));
        }

        $trackingCodeJson = (new TrackingOrderJson($trackingCode))->toArray();
        return JsonResponse::response($trackingCodeJson, trans('response.general.success'), 200, 200);
    }
}
