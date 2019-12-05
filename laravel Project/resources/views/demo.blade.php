<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
	width: 70%;

}
table.gridtable th {

	padding: 20px; 
	height: 50px;
	border-width: 1px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	padding: 20px; 
	height: 25px;
	border-width: 1px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
table.bill th {

	padding: 10px; 

	border-width: 1px;
	border-style: solid;
	border-color: #666666;
	width: 20%;
}
table.bill {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
	width: 70%;

}

#parent {
	display: flex;
	background-color: lightblue;
}
#narrow {
	flex: 1;

  /* Just so it's visible */
}
#wide {
  flex: 1;
  /* Grow to rest of container */

  /* Just so it's visible */
}
</style>
<!-- Table goes in the document BODY -->
<center>
		<div id="parent">
				<div id="wide"><h3><b>THANK YOU FOR YOUR ORDER<br>
						FROM MY SHOPPING CART.</b></h3>
						<p>Once your package ships we will send
								an email with a link to track your order.
								Your order summary is below. Thank
								you again for your business</p>
						)</div>
				<div id="narrow">Call Us: +91 - 22 - 40500699<br>
Email: info@shoppingcompany.com</div>
			  </div>


<h1 style="color:orange"><b>Your Order #</b></h1>
<strong> Placed on DATE</strong>



      <tr>
        <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>    
    
         </tr>
    <tr>
        <td  style='color:red' ><b>Total</b></td><td colspan='4' style='color:green; float:right;'><b>54454</b></td>    
   
       </tr>
       </table>
	     </center>
        <div style="margin-left:15%; ">
                <h5  ><strong>Bill To:'.$shipping_address->fullname.'</strong></h5>
                </div>
<div align="center">

    <table class="bill">
        <tr>
            <th>Payment</th>
            <th>{{ payment }}</th>
        </tr>
        <tr>
            <th>Billing Address</th>
            <th>{{ address }}</th>
        </tr>
        <tr>
            <th>Shipping Address</th>
            <th>{{ address }}</th>
        </tr>
    </table>

</div>
<div style="margin-left:15%; ">
    <h5><strong>Payment:{{ type }}</strong></h5>
</div>
                