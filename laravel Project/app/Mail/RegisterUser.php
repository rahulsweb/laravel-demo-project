<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\EmailTemplate;

class RegisterUser extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$password)
    {
        $this->user=$user;
        $this->password=$password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $showtemplates = EmailTemplate::where('key','user_register')->get();
       
      
        foreach($showtemplates as $showtemplate){
            $template = htmlspecialchars_decode($showtemplate->message);
            }
    
            $template = $this->replace($template,$this->user,$this->password);
    
            return $this->from('rahul@gmail.com')->subject($showtemplate->subject)->view('email_template')->with('template',$template);
        }

        public function replace($template,$user,$password){    
                  
           
                $template = str_replace('{{email}}', $user->email,$template);  
          
                $template = str_replace('{{password}}', $password,$template);  
        
                return $template;
    
        }

    
}
