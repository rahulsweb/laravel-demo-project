<html><body>
    <div style=" border: 1px solid black;">
        <div style="margin:30px; padding:30px; left:10%; background-color:lightblue;  display: flex;
        flex-direction: row;">
       <div  style="width:50%">

        <h2><b>THANK YOU FOR YOUR ORDER<br> FROM My Shopping cart.
        </b></h2>
<p>
        Once your package ships we will send an email with a link to track your order. Your order summary is below. Thank you again for your business.
</p>
       </div>
       <div style="width:50%;border-right:1px dashed thin; ">
           <h4 style="float:right"> <b>Call Us:</b> +91 - 22 - 40500699</h3>
           <h4 style="float:right"> <b> Email:</b> info@shoppingcompany.com</h3>
       </div>
        </div>




<center>
        <h2><b>Your order #</b></h2>
        <p>Placed on DATE : {{ date }}</p>
</center>
<div style="margin:20px; padding:20px;">

<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:100%">
	<thead>
		<tr>
			<th scope="col" style="text-align:center"><strong>No</strong></th>
			<th scope="col" style="text-align:center"><strong>Product</strong></th>
			<th scope="col" style="text-align:center"><strong>Price</strong></th>
			<th scope="col" style="text-align:center"><strong>Quantity</strong></th>
			<th scope="col" style="text-align:center" ><strong>Total</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="text-align:center">1</td>
			<td style="text-align:center">{{ name }}</td>
			<td style="text-align:center" >{{ rate }}</td>
			<td style="text-align:center">{{ qty }}</td>
			<td style="text-align:center">{{ total }}</td>
        </tr>
        <tr><td colspan="4" style="text-align:center">Total</td><td style="text-align:center"><strong style="color:red">{{ totals }}</strong><td></tr>
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