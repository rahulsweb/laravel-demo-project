<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\EmailTemplate;
class OrderPlaceUser extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
   /* public function __construct($order_data,$order_payment_data, $cartdata,$logdata)
    {
        //
        $this->order_data=$order_data;
        
$this->$order_payment_data=$order_payment_data;
$this->$cartdata=$cartdata;
$this->$logdata=$logdata;
    }
*/
    /**
     * Build the message.
     *
     * @return $this
     */


    public function __construct($order)
    {

      $this->order=$order;
    }
    public function build()
    {
       $shipping_address=$this->order->with('shipping_address')->where('shipping_id',$this->order->shipping_id)->get()->first()->shipping_address;
       $billing_address=$this->order->with('billing_address')->where('billing_id',$this->order->billing_id)->get()->first()->billing_address;

        $showtemplates = EmailTemplate::where('key','order_place')->get();

        foreach($showtemplates as $showtemplate){
        $template = htmlspecialchars_decode($showtemplate->message);
        }
        $template = str_replace('{{ fullname }}', $shipping_address->fullname,$template); 

        $template = str_replace('{{ payment }}', ($this->order->orderPayment[0]->payment_type=='COD') ? 'Cash On Delivery':$this->order->orderPayment[0]->payment_type ,$template); 

        $template = str_replace('{{ billing }}', $billing_address->address1,$template); 
        $template = str_replace('{{ shipping }}',$shipping_address->address1,$template); 
        $template = str_replace('{{ method }}',$this->order->OrderPayment[0]->payment_type,$template);
        $template = str_replace('{{ totals }}',$this->order->order_carts->first()->pivot_total_cart 
        ,$template);
        //product
        $template = str_replace('{{ name }}',$this->order->order_carts->first()->name 
        ,$template);
        $template = str_replace('{{ rate }}',$this->order->order_carts->first()->rate
        ,$template);
        $template = str_replace('{{ qty }}',$this->order->order_carts->first()->pivot->qty
        ,$template);
        $template = str_replace('{{ total }}',$this->order->order_carts->first()->pivot->total
        ,$template);
        $template = str_replace('{{ date }}',$this->order->created_at->format('d/m/Y'),$template);
        $table="";

        foreach($this->order->order_carts as $data)
        {
            
               $table.="<tr><td></td><td>$data->name</td><td>$data->rate</td><td>".$data->pivot->qty."</td><td>".$data->pivot->total."</td></tr>"; 

        }
   

    $template = str_replace('<td>1</td><td>{{ name }}</td><td>{{ rate }}</td><td>{{ qty }}</td><td>{{ total }}</td>',$table,$template);    
        return $this->from('rahul@gmail.com')->subject($showtemplate->subject)->view('email_template')->with('template',$template);

    }













     

       // $template = $this->replace($template,$this->data);

      







}
