<html><body>
        <div style=" border: 1px solid black;">
            <div style="margin:30px; padding:30px; left:10%; background-color:lightblue;  display: flex;
            flex-direction: row;">
           <div  style="width:50%">
    
            <h2><b>THANK YOU FOR YOUR ORDER<br> FROM INDIA BBT.
            </b></h2>
    <p>
            You can check the status of your order by <a href="http://localhost:8000/login">logging into your account.</a>
    </p>
           </div>
           <div style="width:50%;border-right:1px dashed thin; ">
               <ul style="float: right; list-style-type:none">
               <li><h3><b>Call Us:</b> +91 - 22 - 40500699</h3></li>
                <li><h3> <b> Email:</b> info@shoppingcompany.com</h3></li>
               </ul>
            </div>
            </div>
    
  
    
    <center>
            <h2><b>Your Shipment #</b>{{ order_id }}</h2>
    </center>
 
    
    
    
    <div style=" padding:20px;">
    
        
            <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:100%; text-align:center;">
                    <tbody>
                            <tr>
                                    <th scope="row" style="text-align:center"><strong>     Tracking Order</strong></th>
                                    <td style="text-align:center"> {{ order_code }}</td>
                                </tr>
                  
                 
                    </tbody>
                </table>
    
    
    </div>
    
    
    
            <div style=" border:1px solid #cccccc; padding:20px; "><strong align="left">BILL TO: {{ fullname }}</strong></div>
     
    
    <div style="padding:20px;">
         
    
    <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:100%; text-align:center;">
            <tbody>
                <tr>
                    <th style="text-align:center"><strong>Payment</strong></th>
                    <td style="text-align:center">{{ payment }}</td>
                </tr>
                <tr>
                    <th scope="row" style="text-align:center"><strong>Billing Address</strong></th>
                    <td style="text-align:center">{{ billing }}</td>
                </tr>
                <tr>
                    <th scope="row" style="text-align:center"><strong>Shipping Address</strong></th>
                    <td style="text-align:center">{{ shipping }}</td>
                </tr>
            </tbody>
        </table>
    
    
    </div>
    
        <div style=" border:1px solid #cccccc; padding:20px; "><strong>PAYMENT METHOD : {{ payment }}</strong></div>
    
    
    
    
    
    </div>
            </body>
            </html>