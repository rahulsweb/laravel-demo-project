<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\EmailTemplate;
class AdminContactUs extends Mailable
{
    use Queueable, SerializesModels;

 
    public $contact;
    public $note;
    public $ip;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact,$note,$ip)
    {
        //
        $this->note=$note;
        $this->contact=$contact;
        $this->ip=$ip;
    }



    public function build()
    {
        $showtemplates = EmailTemplate::where('key','contact_us_admin')->get();
       
  



        foreach($showtemplates as $showtemplate){
            $template = htmlspecialchars_decode($showtemplate->message);
            }
    
            $template = $this->replace($template,$this->contact);
    
            return $this->from('rahul@gmail.com')->subject($showtemplate->subject)->view('email_template')->with('template',$template);
        }

        public function replace($template,$contact){    
                  
                                
            $template = str_replace('{{ name }}', $contact->name,$template); 
            $template = str_replace('{{ email }}', $contact->email,$template); 
                $template = str_replace('{{ contact }}', $contact->contact,$template);  
          
                $template = str_replace('{{ subject }}', $contact->subject,$template);  

                       
                $template = str_replace('{{ message }}', $contact->message,$template);  
                               
              
                $template = str_replace('{{ ip }}', $this->ip,$template);  
        
                //dd($template);
                return $template."<h1 align='center'><strong>Admin Feedback:<strong style='color:red'>".$this->note."</strong></h1>";
    
        }


    /**
     * Build the message.
     *
     * @return $this
     */
  
}
