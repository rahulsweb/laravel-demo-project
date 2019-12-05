<?php 

return [ 
    'client_id' => env('PAYPAL_CLIENT_ID','AfVrAvTKdLxc44e-2w-gEiFYzJdKFLM-HKmvsIJWDbGJ_R7iZeZUEs7onDm7hm2-wd724IZ6QEImP5Fn'),
    'secret' => env('PAYPAL_SECRET','EJAPuvVggSgivEQANwZhyG3Jm6iEXN1JVIYZqwVrK570VRrTd5-2AS689OPxWujfubbu8BCFcjHFsW1j'),
    'settings' => array(
    'mode' => env('PAYPAL_MODE','sandbox'),
    'http.ConnectionTimeOut' => 30,
    'log.LogEnabled' => true,
    'log.FileName' => storage_path() .'/logs/paypal.log',
    'log.LogLevel' => 'ERROR'
    ),
    ];