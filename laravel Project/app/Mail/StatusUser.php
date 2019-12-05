<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\EmailTemplate;
class StatusUser extends Mailable
{  use Queueable, SerializesModels;

    public $order;
    
    public $status;
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


    public function __construct($order,$status)
    {

      $this->order=$order;
      $this->status=$status;
    }
    public function build()
    {
     
       $shipping_address=$this->order->with('shipping_address')->where('shipping_id',$this->order->shipping_id)->get()->first()->shipping_address;
       $billing_address=$this->order->with('billing_address')->where('billing_id',$this->order->billing_id)->get()->first()->billing_address;

        $showtemplates = EmailTemplate::where('key','status_change_user')->get();

        foreach($showtemplates as $showtemplate){
        $template = htmlspecialchars_decode($showtemplate->message);
        }
       
   
            
                
        $template = str_replace('{{ fullname }}', $shipping_address->fullname,$template);
  $template = str_replace('{{ order_code }}',$this->order->order_code,$template);  

      
  $template = str_replace('{{ shipping }}',$shipping_address->address1,$template);  
  
  $template = str_replace('{{ billing }}',$billing_address->address1,$template);  
      
  $template = str_replace('{{ status }}',$this->order->log_order->last()->status,$template);  
  $template = str_replace('{{ payment }}', ($this->order->orderPayment[0]->payment_type=='COD') ? 'Cash On Delivery':$this->order->orderPayment[0]->payment_type,$template); 

  $template = str_replace('{{ order_id }}', $this->order->id,$template); 

  return $this->from('rahul@gmail.com')->subject($showtemplate->subject)->view('email_template')->with('template',$template);


     
    }













     

       // $template = $this->replace($template,$this->data);

      




}
