<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Payout;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PayoutSenderBatchHeader;
use PayPal\Api\PayoutItem;
use PayPal\Api\Currency;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use App\jobs;
use App\transactions;
use App\notifications;
use App\bids;
use App\User;

class PaymentController extends Controller

{

    private $_api_context;

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {



        /** PayPal api context **/

        $paypal_conf = \Config::get('paypal');

        $this->_api_context = new ApiContext(new OAuthTokenCredential(

            $paypal_conf['client_id'],

            $paypal_conf['secret'])

        );

        $this->_api_context->setConfig($paypal_conf['settings']);



    }

    public function index()

    {

        return view('paywithpaypal');

    }

    public function payWithpaypal(Request $request)

    {

        $payer = new Payer();

        $payer->setPaymentMethod('paypal');



        $item_1 = new Item();


        $job =jobs::where('id',$request->get('job'))->get();
        
        $price = $job[0]->bids()->first()->price;
        $item_1->setName('Item 1') /** item name **/

            ->setCurrency('USD')

            ->setQuantity(1)

            ->setPrice($price); /** unit price **/



        $item_list = new ItemList();

        $item_list->setItems(array($item_1));



        $amount = new Amount();

        $amount->setCurrency('USD')

            ->setTotal($price);



        $transaction = new Transaction();

        $transaction->setAmount($amount)

            ->setItemList($item_list)

            ->setDescription('Your transaction description');



        $redirect_urls = new RedirectUrls();

        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/

            ->setCancelUrl(URL::to('status'));



        $payment = new Payment();

        $payment->setIntent('Sale')

            ->setPayer($payer)

            ->setRedirectUrls($redirect_urls)

            ->setTransactions(array($transaction));

        /** dd($payment->create($this->_api_context));exit; **/

        try {



            $payment->create($this->_api_context);



        } catch (\PayPal\Exception\PPConnectionException $ex) {



            if (\Config::get('app.debug')) {



                \Session::put('error', 'Connection timeout');

                return Redirect::to('/pay');



            } else {



                \Session::put('error', 'Some error occur, sorry for inconvenient');

                return Redirect::to('/pay');



            }



        }



        foreach ($payment->getLinks() as $link) {



            if ($link->getRel() == 'approval_url') {



                $redirect_url = $link->getHref();

                break;



            }



        }



        /** add payment ID to session **/
        $transactions = new transactions;
        $transactions->pid = $payment->getId();
        $transactions->jobs_id =$request->get('job');
        $transactions->save();
        Session::put('paypal_payment_id', $payment->getId());



        if (isset($redirect_url)) {



            /** redirect to paypal **/

            return Redirect::away($redirect_url);



        }



        \Session::put('error', 'Unknown error occurred');

        return Redirect::to('/pay');



    }



    public function getPaymentStatus()

    {

        /** Get the payment ID before session clear **/

        $payment_id = Session::get('paypal_payment_id');

        

        /** clear the session payment ID **/

        Session::forget('paypal_payment_id');
        $transactions = transactions::where('pid','=',$payment_id)->get();
      
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {



            \Session::put('error', 'Payment failed');

            return Redirect::to('/pay');



        }



        $payment = Payment::get($payment_id, $this->_api_context);
        

        $execution = new PaymentExecution();

        $execution->setPayerId(Input::get('PayerID'));


        $result = $payment->execute($execution, $this->_api_context);



        if ($result->getState() == 'approved') {

            
            \Session::put('success', 'Payment success');
            $transaction= $transactions[0];
            ///$jobs =  jobs::where('id',$transaction->jobs_id)->get();
            $transaction->status=1;
            $transaction->save();
            
            $job= jobs::find($transaction->jobs_id);
            $job->status=2;
            $job->save();
            $bids = bids::where('jobs_id',$job->id)->get();
            $bid=$bids[0];
            $bid->status=2;
            $bid->save();
            $notification  = new notifications;

            $notification->user_id = $job->assignedTo;
            $notification->jobs_id = $transaction->jobs_id;
            $notification->status = 0;
            $notification->body    = "Payment recieved for an project please check balance section";
            $notification->save();
            return Redirect::to('/');



        }



        \Session::put('error', 'Payment failed');

        return Redirect::to('/pay');



    }

    public function batchPayout(Request $request)
    {
        
        $transaction = transactions::find($request->id);
        $price=$transaction->jobs->bids[0]->price;
        $user = User::find($transaction->jobs->assignedTo);
        // $payouts    =   new Payout();
        // $senderBatchHeader  = new PayoutSenderBatchHeader();
    
        // $senderBatchHeader->setSenderBatchId(uniqid())
        //     ->setEmailSubject("You have a ");
    
        // $senderItem1    =   new PayoutItem();
        // $senderItem1->setRecipientType('Email')
        //     ->setNote("New Payment")
        //     ->setReceiver('mayank@gol.com')
        //     ->setSenderItemId(uniqid())
        //     ->setAmount(new Currency('{
        //     "value":"5",
        //     "currency":"USD"
        //     }'));
    
        // $payouts->setSenderBatchHeader($senderBatchHeader)
        //     ->addItem($senderItem1);
    
        // $request    =   clone $payouts;
    
        // try{
        //     $output =   $payouts->create(null, $this->_api_context);
        // }catch (Exception $ex){
        //     return $ex->getMessage();
        // }
        return $user->paypal;
    }

}