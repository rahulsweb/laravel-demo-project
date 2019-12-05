<?php
namespace App\Http\Controllers\frontend;

use App\Address;
use App\Cart;
use App\Coupon;
use App\Http\Controllers\Controller;
use App\LogOrder;
use App\Mail\OrderPlaceUser;
use App\Order;
use App\OrderCartDetail;
use App\OrderPaymentDetail;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;

class AddMoneyController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //   parent::__construct();

        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    /**
     * Show the application paywith paypalpage.
     *
     * @return \Illuminate\Http\Response
     */
    public function payWithPaypal()
    {
        return view('paywithpaypal');
    }
    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal(Request $request)
    {

        $address = Address::where('address1', '=', $request->address1)->where('address2', '=', $request->address2)->where('fullname', '=', $request->fullname)->first();
        $address2 = Address::where('address1', '=', $request->ship_address1)->where('address2', '=', $request->ship_address2)->where('fullname', '=', $request->fullname)->first();
        if (!$address) {

            $address = new Address;
            $billingData = [
                'fullname' => $request->fullname,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'country' => $request->country,
                'state' => $request->state,

                'pincode' => $request->pincode,
                'user_id' => auth()->user()->id,
            ];

            $billAddress = $address->create($billingData);

        }

        if (!$address2) {
            $address2 = new Address;
            $shippingData = [
                'fullname' => $request->ship_fullname,
                'address1' => $request->ship_address1,
                'address2' => $request->ship_address2,
                'country' => $request->ship_country,
                'state' => $request->ship_state,

                'pincode' => $request->ship_pincode,
                'user_id' => auth()->user()->id,
            ];

            $shipAddress = $address2->create($shippingData);

        }

        $oldCart = Session::get('cart');

        $cart = new Cart($oldCart);
        $customer = [
            'fullname' => $request->fullname,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'country' => $request->country,
            'state' => $request->state,

            'pincode' => $request->pincode,
            'user_id' => auth()->user()->id,
            'payment' => $request->paypal,
            'message' => $request->message,
        ];

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('item 1') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('payment.status'));
        Session::put('customer', json_encode($customer));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        DB::beginTransaction();
        try {

            $payment->create($this->_api_context);

            if (!Session::has('cart')) {
                return view('frontend_theme.shop.shopping_cart', ['product' => null]);
            }

            $order = new Order;
            $coupon = "";
            if (isset($request->coupon)) {
                $coupon = Coupon::where('code', $request->coupon)->get()->first();

            }

            $order_data = [
                'order_code' => 'OD_' . now()->timestamp,
                'user_id' => auth()->user()->id,
                'billing_id' => isset($billAddress->id) ? $billAddress->id : $request->bill,
                'shipping_id' => isset($ship_address->id) ? $shipAddress->id : $request->ship,
                'coupon_id' => session()->has('coupon_used') ? session()->get('coupon_used')['id'] : null,
            ];
            $order->create($order_data);
            //creating Order Payment Details Object

            if (isset($coupon->id)) {
                $count = DB::table('orders')->where('coupon_id', '=', $coupon->id)->count();
                $coupon->qty_left = $coupon->qty - $count;
                $coupon->update(['qty_left' => $coupon->qty_left]);
            }

            $orderPaymentDetails = new OrderPaymentDetail;
            $orders = $order->where('user_id', auth()->user()->id)->latest('id')->first();
            $status = ($request->paypal == 'COD') ? 'Pending' : 'Processing';
            $orderPaymentData = [
                'order_id' => $orders->id,
                'payment_id' => $payment->id,
                'payment_type' => $request->paypal,
                'status' => $status,

            ];
            $orderPaymentDetails->create($orderPaymentData);

            $order_payment = $orderPaymentDetails->where('order_id', $orders->id)->latest('id')->first();

            foreach ($cart->items as $id => $product) {

                $cartdetail = new OrderCartDetail;
                $cartdata = [
                    'order_id' => $orders->id,
                    'product_id' => $product['item']->id,

                    'qty' => $product['qty'],
                    'total' => $product['price'],
                    'images' => $product['item']->product_image[0]->name,
                    'total_cart' => $cart->totalPrice,
                    'total_qty' => $cart->totalQty,
                    'category_name' => isset($product['item']->categories[0]->name) ? $product['item']->categories[0]->name : 'N/A',
                ];

                $cartdetail->create($cartdata);

            }
            $logs = new LogOrder;

            $logdata = [
                'order_id' => $orders->id,
                'status' => $status,
            ];

            $logs->create($logdata);
            Mail::to(auth()->user()->email)->send(new OrderPlaceUser($order->latest()->first()));
            DB::commit();
            Session::forget('cart');

        } catch (\PayPal\Exception\PPConnectionException $ex) {
            DB::rollback();
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::route('addmoney.paywithpaypal');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                DB::rollback();
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('addmoney.paywithpaypal');
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        DB::rollback();
        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('addmoney.paywithpaypal');
    }
    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Payment failed');
            return Redirect::route('addmoney.paywithpaypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {

            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/
            \Session::put('success', 'Payment success');
            return Redirect::route('addmoney.paywithpaypal');
        }
        \Session::put('error', 'Payment failed');
        return Redirect::route('addmoney.paywithpaypal');
    }

    public function cod(Request $request)
    {

        $address = Address::where('address1', '=', $request->address1)->where('address2', '=', $request->address2)->where('fullname', '=', $request->fullname)->first();
        $address2 = Address::where('address1', '=', $request->ship_address1)->where('address2', '=', $request->ship_address2)->where('fullname', '=', $request->fullname)->first();
        if (!$address) {
            DB::beginTransaction();
            $address = new Address;

            $billingData = [
                'fullname' => $request->fullname,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'country' => $request->country,
                'state' => $request->state,

                'pincode' => $request->pincode,
                'user_id' => auth()->user()->id,
            ];

            $billAddress = $address->create($billingData);

        }

        if (!$address2) {
            $address2 = new Address;
            $shippingData = [
                'fullname' => $request->ship_fullname,
                'address1' => $request->ship_address1,
                'address2' => $request->ship_address2,
                'country' => $request->ship_country,
                'state' => $request->ship_state,

                'pincode' => $request->ship_pincode,
                'user_id' => auth()->user()->id,
            ];
            $shipAddress = $address2->create($shippingData);

        }

        $oldCart = Session::get('cart');

        $cart = new Cart($oldCart);

        $coupon = "";
        if (isset($request->coupon)) {
            $coupon = Coupon::where('code', $request->coupon)->get()->first();

        }

        $order = new Order;

        $orderFlag = Order::create([
            'order_code' => 'OD_' . now()->timestamp,
            'user_id' => auth()->user()->id,
            'billing_id' => isset($billAddress->id) ? $billAddress->id : $request->bill,
            'shipping_id' => isset($shipAddress->id) ? $shipAddress->id : $request->ship,
            'coupon_id' => isset($coupon->id) ? $coupon->id : null,
        ]);
        if (!$orderFlag) {
            DB::rollback();
        }

        //order table data insert
        if (isset($coupon->id)) {
            $count = DB::table('orders')->where('coupon_id', '=', $coupon->id)->count();
            $coupon->qty_left = $coupon->qty - $count;
            $coupon->update(['qty_left' => $coupon->qty_left]);
        }

        //creating Order Payment Details Object

        $orders = $order->where('user_id', auth()->user()->id)->latest('id')->first();
        $status = ($request->paypal == 'COD') ? 'Pending' : 'Processing';
        $orderPaymentLog = OrderPaymentDetail::create([
            'order_id' => $orders->id,

            'payment_type' => $request->paypal,
            'status' => $status,

        ]);

        if (!$orderPaymentLog) {
            DB::rollback();
        }

        foreach ($cart->items as $id => $product) {

            $cartLog = OrderCartDetail::create(

                [
                    'order_id' => $orders->id,
                    'product_id' => $product['item']->id,

                    'qty' => $product['qty'],
                    'total' => $product['price'],
                    'images' => $product['item']->product_image[0]->name,
                    'total_cart' => session()->has('discount_amount') ? $cart->totalPrice - session()->get('discount_amount') : $cart->totalPrice,
                    'total_qty' => $cart->totalQty,
                    'category_name' => isset($product['item']->categories[0]->name) ? $product['item']->categories[0]->name : 'N/A',

                ]
            );

            if (!$cartLog) {
                DB::rollback();
            }

        }

        $log = LogOrder::create([
            'order_id' => $orders->id,
            'status' => $status,
        ]);

        if (!$log) {
            DB::rollback();
        }

        //Mail::to(auth()->user()->email)->send(new OrderPlaceUser($order_data,$orderPaymentData, $cartdata,$logdata));

        DB::commit();

        Mail::to(auth()->user()->email)->send(new OrderPlaceUser($order->with('order_carts')->latest()->first()));

        Session::forget('cart');

        return redirect('paywithpaypal')->with('message', 'Your Cash on Delivery Payment Successfully');

    }
}
