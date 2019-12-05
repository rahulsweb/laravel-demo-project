define({ "api": [
  {
    "type": "post",
    "url": "http://localhost:8000/api/address/delete",
    "title": "",
    "group": "Address",
    "name": "Address_Delete",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False) { &quot;status&quot;: false, &quot;message&quot;: &quot;Address Not Found&quot;, &quot;data&quot;: [] }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"status\": false,\n\"message\": {\n\"id\": [\n\"The id field is required.\"\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"Address is Deleted Successfully\",\n\"data\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/AddressController.php",
    "groupTitle": "Address"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/address/details",
    "title": "",
    "group": "Address",
    "name": "Address_Details",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False) { &quot;status&quot;: false, &quot;message&quot;: &quot;Address Not Found&quot;, &quot;data&quot;: [] }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"status\": false,\n\"message\": \"Address Not Found\",\n\"data\": []\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"SuccessFully inserted Address in database\",\n\"data\": {\n\"fullname\": \"Arul Acharya\",\n\"address1\": \"Dange Chauwk  Pune -33\",\n\"address2\": \"Hinjawadi Pune-17\",\n\"state\": \"maharashtra\",\n\"country\": \"India\",\n\"pincode\": \"979797\",\n\"user_id\": 163,\n\"updated_at\": \"2019-12-05 06:10:52\",\n\"created_at\": \"2019-12-05 06:10:52\",\n\"id\": 116\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/AddressController.php",
    "groupTitle": "Address"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/address/store",
    "title": "",
    "group": "Address",
    "name": "Address_Store",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "fullname",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address1",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address2",
            "description": "<p>Optional</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "state",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "country",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "pincode",
            "description": "<p>Mandatory</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False) { &quot;status&quot;: false, &quot;message&quot;: &quot;Address Not Found&quot;, &quot;data&quot;: [] }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"message\": \"The given data was invalid.\",\n\"errors\": {\n\"fullname\": [\n\"The fullname field is required.\"\n],\n\"country\": [\n\"The country field is required.\"\n],\n\"state\": [\n\"The state field is required.\"\n],\n\"address1\": [\n\"The address1 field is required.\"\n],\n\"pincode\": [\n\"The pincode field is required.\"\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"SuccessFully inserted Address in database\",\n\"data\": {\n\"fullname\": \"Arul Acharya\",\n\"address1\": \"Dange Chauwk  Pune -33\",\n\"address2\": \"Hinjawadi Pune-17\",\n\"state\": \"maharashtra\",\n\"country\": \"India\",\n\"pincode\": \"979797\",\n\"user_id\": 163,\n\"updated_at\": \"2019-12-05 06:10:52\",\n\"created_at\": \"2019-12-05 06:10:52\",\n\"id\": 116\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/AddressController.php",
    "groupTitle": "Address"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/address/update",
    "title": "",
    "group": "Address",
    "name": "Address_Update",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "fullname",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address1",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address2",
            "description": "<p>Optional</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "state",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "country",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "pincode",
            "description": "<p>Mandatory</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status { &quot;status&quot;: false, &quot;message&quot;: &quot;Address Not Found&quot;, &quot;data&quot;: [] }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display { &quot;message&quot;: &quot;The given data was invalid.&quot;, &quot;errors&quot;: { &quot;pincode&quot;: [ &quot;The pincode must be 6 digits.&quot;, &quot;The pincode must be an integer.&quot; ] } }</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "\n{\n\"status\": false,\n\"message\": \"Address Not Found\",\n\"data\": []\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"SuccessFully Updated Address in database\",\n\"data\": {\n\"fullname\": \"Arul Acharya\",\n\"address1\": \"Dange Chauwk  Pune -33\",\n\"address2\": \"Hinjawadi Pune-17\",\n\"state\": \"maharashtra\",\n\"country\": \"India\",\n\"pincode\": \"979797\",\n\"user_id\": 163,\n\"updated_at\": \"2019-12-05 06:10:52\",\n\"created_at\": \"2019-12-05 06:10:52\",\n\"id\": 116\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/AddressController.php",
    "groupTitle": "Address"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/contact-us/create",
    "title": "",
    "group": "Contact",
    "name": "Contact_Us",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Name",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Subject",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Contact",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Message",
            "description": "<p>Mandatory</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False) { &quot;status&quot;: false, &quot;message&quot;: { &quot;name&quot;: [ &quot;name is required&quot; ], &quot;email&quot;: [ &quot;Email Required&quot; ], &quot;subject&quot;: [ &quot;subject Required&quot; ], &quot;contact&quot;: [ &quot;contact required&quot; ], &quot;message&quot;: [ &quot;message Required&quot; ] }, &quot;data&quot;: [] }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"status\": false,\n\"message\": {\n\"name\": [\n\"name is required\"\n],\n\"email\": [\n\"Email Required\"\n],\n\"subject\": [\n\"subject Required\"\n],\n\"contact\": [\n\"contact required\"\n],\n\"message\": [\n\"message Required\"\n]\n},\n\"data\": []\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"thank you for contact us\",\n\"data\": {\n\"name\": \"rahul sonawane\",\n\"email\": \"rahul@gmail.com\",\n\"subject\": \"Creating API\",\n\"contact\": \"9763362767\",\n\"message\": \"asdasdas\",\n\"updated_at\": \"2019-12-05 07:08:57\",\n\"created_at\": \"2019-12-05 07:08:57\",\n\"id\": 4\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/ContactUsController.php",
    "groupTitle": "Contact"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/order/details",
    "title": "",
    "group": "Order",
    "name": "Order_Details",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status { &quot;status&quot;: false, &quot;message&quot;: &quot;Order Not Found&quot;, &quot;data&quot;: [] }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display { &quot;status&quot;: false, &quot;message&quot;: &quot;Order Not Found&quot;, &quot;data&quot;: [] }</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "\n{\n\"status\": false,\n\"message\": \"Order Not Found\",\n\"data\": []\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"Success\",\n\"data\": [\n{\n\"id\": 46,\n\"order_code\": \"OD_1575528115\",\n\"user_id\": 163,\n\"billing_id\": 117,\n\"coupon_id\": 7,\n\"deleted_at\": null,\n\"created_at\": \"2019-12-05 06:41:55\",\n\"updated_at\": \"2019-12-05 06:41:55\",\n\"shipping_id\": 117,\n\"users\": {\n\"id\": 163,\n\"first_name\": \"arul1\",\n\"last_name\": \"acharya1\",\n\"email\": \"arul234@gmail.com\",\n\"status\": \"1\",\n\"profile\": \"User/1575525033_s4.jpeg\",\n\"created_at\": \"2019-12-04 12:26:35\",\n\"updated_at\": \"2019-12-05 05:56:18\",\n\"google_id\": null,\n\"github_id\": null\n},\n\"order_payment\": [\n{\n\"id\": 46,\n\"order_id\": 46,\n\"payment_id\": null,\n\"payment_type\": \"COD\",\n\"status\": \"Pending\",\n\"deleted_at\": null,\n\"created_at\": \"2019-12-05 06:41:55\",\n\"updated_at\": \"2019-12-05 06:41:55\"\n}\n],\n\"order_carts\": [\n{\n\"id\": 68,\n\"created_at\": \"2019-11-05 10:23:05\",\n\"updated_at\": \"2019-11-05 10:23:05\",\n\"name\": \"appo x9\",\n\"rate\": \"6700\",\n\"qty_left\": \"1\",\n\"status\": \"Active\",\n\"pivot\": {\n\"order_id\": 46,\n\"product_id\": 68,\n\"qty\": 1,\n\"total\": \"6700\",\n\"images\": \"Product Image/1572949385_appo.jpeg\",\n\"created_at\": \"2019-12-05 06:41:55\",\n\"total_cart\": \"3350\",\n\"total_qty\": \"1\",\n\"category_name\": \"Mobile\"\n}\n}\n]\n}\n]\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/OrderController.php",
    "groupTitle": "Order"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/order/place",
    "title": "",
    "group": "Order",
    "name": "Order_Place",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "amount",
            "description": "<p>Mandatory</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status { &quot;status&quot;: false, &quot;error&quot;: { &quot;amount&quot;: [ &quot;The amount field is required.&quot; ] } }</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"status\": false,\n\"error\": {\n\"amount\": [\n\"The amount field is required.\"\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"Order Place Successfully\",\n\"data\": {\n\"amount\": \"500\",\n\"user_id\": 163,\n\"order_code\": \"OD_1575528749\",\n\"updated_at\": \"2019-12-05 06:52:29\",\n\"created_at\": \"2019-12-05 06:52:29\",\n\"id\": 8\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/OrderPlaceController.php",
    "groupTitle": "Order"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/order/status",
    "title": "",
    "group": "Order",
    "name": "Order_Status",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "order_code",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "payment_status",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "payment_mode",
            "description": "<p>Mandatory</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status { &quot;status&quot;: false, &quot;message&quot;: &quot;Your Order Code Is Not Exist&quot; }</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"status\": false,\n\"error\": {\n\"order_code\": [\n\"The order code field is required.\"\n],\n\"payment_status\": [\n\"The payment status field is required.\"\n],\n\"payment_mode\": [\n\"The payment mode field is required.\"\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"Order Status Successfully Changed\",\n\"data\": {\n\"id\": 8,\n\"amount\": 500,\n\"order_code\": \"OD_1575528749\",\n\"payment_status\": \"Delivered\",\n\"payment_mode\": \"Online\",\n\"user_id\": 163,\n\"created_at\": \"2019-12-05 12:26:30\",\n\"updated_at\": \"2019-12-05 06:56:30\"\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/OrderPlaceController.php",
    "groupTitle": "Order"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/order/track",
    "title": "",
    "group": "Order",
    "name": "Order_Track",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status { &quot;status&quot;: false, &quot;message&quot;: &quot;Order Not Found&quot;, &quot;data&quot;: [] }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": "<p>{ &quot;status&quot;: false, &quot;message&quot;: &quot;Your Order Code Or Email Is invalid&quot;, &quot;data&quot;: [] }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"status\": false,\n\"message\": {\n\"email\": [\n\"Email Required\"\n],\n\"order_code\": [\n\"Order Code Required\"\n]\n},\n\"data\": []\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"Success\",\n\"data\": [\n{\n\"id\": 46,\n\"order_code\": \"OD_1575528115\",\n\"user_id\": 163,\n\"billing_id\": 117,\n\"coupon_id\": 7,\n\"deleted_at\": null,\n\"created_at\": \"2019-12-05 06:41:55\",\n\"updated_at\": \"2019-12-05 06:41:55\",\n\"shipping_id\": 117,\n\"users\": {\n\"id\": 163,\n\"first_name\": \"arul1\",\n\"last_name\": \"acharya1\",\n\"email\": \"arul234@gmail.com\",\n\"status\": \"1\",\n\"profile\": \"User/1575525033_s4.jpeg\",\n\"created_at\": \"2019-12-04 12:26:35\",\n\"updated_at\": \"2019-12-05 05:56:18\",\n\"google_id\": null,\n\"github_id\": null\n},\n\"order_payment\": [\n{\n\"id\": 46,\n\"order_id\": 46,\n\"payment_id\": null,\n\"payment_type\": \"COD\",\n\"status\": \"Pending\",\n\"deleted_at\": null,\n\"created_at\": \"2019-12-05 06:41:55\",\n\"updated_at\": \"2019-12-05 06:41:55\"\n}\n],\n\"order_carts\": [\n{\n\"id\": 68,\n\"created_at\": \"2019-11-05 10:23:05\",\n\"updated_at\": \"2019-11-05 10:23:05\",\n\"name\": \"appo x9\",\n\"rate\": \"6700\",\n\"qty_left\": \"1\",\n\"status\": \"Active\",\n\"pivot\": {\n\"order_id\": 46,\n\"product_id\": 68,\n\"qty\": 1,\n\"total\": \"6700\",\n\"images\": \"Product Image/1572949385_appo.jpeg\",\n\"created_at\": \"2019-12-05 06:41:55\",\n\"total_cart\": \"3350\",\n\"total_qty\": \"1\",\n\"category_name\": \"Mobile\"\n}\n}\n]\n}\n]\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/OrderController.php",
    "groupTitle": "Order"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/product/category",
    "title": "",
    "group": "Product",
    "name": "Category_Wise_Product",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id",
            "description": "<p>Mandatory</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False) { &quot;status&quot;: false, &quot;message&quot;: &quot;Product Not Found&quot;, &quot;data&quot;: [] }</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"success\",\n\"data\": [\n{\n\"id\": 2,\n\"category_id\": 51,\n\"product_id\": 53,\n\"created_at\": \"2019-10-29 08:46:42\",\n\"updated_at\": \"2019-10-29 09:16:17\",\n\"products\": {\n\"id\": 53,\n\"created_at\": \"2019-10-11 12:56:14\",\n\"updated_at\": \"2019-11-01 12:06:41\",\n\"name\": \"LG WashingMachine X2\",\n\"rate\": \"5555\",\n\"qty_left\": \"15\",\n\"status\": \"Active\",\n\"product_image\": [\n{\n\"id\": 50,\n\"name\": \"Product Image/1570798574_lg7.jpeg\",\n\"product_id\": 53,\n\"created_at\": \"2019-10-11 12:56:14\",\n\"updated_at\": \"2019-10-11 12:56:14\"\n}\n]\n}\n}\n]\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/ProductController.php",
    "groupTitle": "Product"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/product/details",
    "title": "",
    "group": "Product",
    "name": "Product_Details",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id",
            "description": "<p>Mandatory</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False) { &quot;status&quot;: false, &quot;message&quot;: &quot;Product Not Found&quot;, &quot;data&quot;: [] }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"status\": false,\n\"message\": {\n\"id\": [\n\"The id field is required.\"\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"success\",\n\"data\": {\n\"id\": 60,\n\"created_at\": \"2019-10-30 12:23:07\",\n\"updated_at\": \"2019-11-01 12:03:15\",\n\"name\": \"Yamaha KTM\",\n\"rate\": \"500000\",\n\"qty_left\": \"14\",\n\"status\": \"Active\",\n\"categories\": [\n{\n\"id\": 56,\n\"created_at\": \"2019-10-30 12:21:09\",\n\"updated_at\": \"2019-10-30 12:21:09\",\n\"name\": \"Bike\",\n\"parent_id\": 53,\n\"deleted_at\": null,\n\"pivot\": {\n\"product_id\": 60,\n\"category_id\": 56,\n\"created_at\": \"2019-10-30 12:23:07\",\n\"updated_at\": \"2019-10-30 12:23:07\"\n}\n}\n],\n\"product_image\": [\n{\n\"id\": 65,\n\"name\": \"Product Image/1572438187_ktm.jpeg\",\n\"product_id\": 60,\n\"created_at\": \"2019-10-30 12:23:07\",\n\"updated_at\": \"2019-10-30 12:23:07\"\n}\n],\n\"order_carts\": [],\n\"users\": [],\n\"product_attribute\": {\n\"id\": 27,\n\"product_id\": 60,\n\"quantity\": 15,\n\"color\": \"RED\",\n\"created_at\": \"2019-10-30 12:23:07\",\n\"updated_at\": \"2019-11-01 04:44:15\"\n}\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/ProductController.php",
    "groupTitle": "Product"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/product/list",
    "title": "",
    "group": "Product",
    "name": "Product_Lists",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False) { &quot;status&quot;: false, &quot;message&quot;: &quot;Products Not Found&quot; }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"status\": false,\n\"message\": {\n\"email\": [\n\"Email Required\"\n]\n},\n\"data\": []\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"success\",\n\"data\": [\n{\n\"id\": 53,\n\"created_at\": \"2019-10-11 12:56:14\",\n\"updated_at\": \"2019-11-01 12:06:41\",\n\"name\": \"LG WashingMachine X2\",\n\"rate\": \"5555\",\n\"qty_left\": \"15\",\n\"status\": \"Active\",\n\"categories\": [\n{\n\"id\": 51,\n\"created_at\": \"2019-10-29 09:16:06\",\n\"updated_at\": \"2019-10-29 09:16:06\",\n\"name\": \"Washing Machine\",\n\"parent_id\": 47,\n\"deleted_at\": null,\n\"pivot\": {\n\"product_id\": 53,\n\"category_id\": 51,\n\"created_at\": \"2019-10-29 08:46:42\",\n\"updated_at\": \"2019-10-29 09:16:17\"\n}\n}\n],\n\"product_image\": [\n{\n\"id\": 50,\n\"name\": \"Product Image/1570798574_lg7.jpeg\",\n\"product_id\": 53,\n\"created_at\": \"2019-10-11 12:56:14\",\n\"updated_at\": \"2019-10-11 12:56:14\"\n}\n],\n\"order_carts\": [],\n\"users\": [\n{\n\"id\": 49,\n\"first_name\": \"rahul\",\n\"last_name\": \"shingate\",\n\"email\": \"kajal@gmail.com\",\n\"status\": \"1\",\n\"profile\": \"User/1574343023_x.jpeg\",\n\"created_at\": \"2019-10-07 11:33:25\",\n\"updated_at\": \"2019-12-04 10:01:28\",\n\"google_id\": null,\n\"github_id\": null,\n\"pivot\": {\n\"product_id\": 53,\n\"user_id\": 49\n}\n}\n],\n\"product_attribute\": {\n\"id\": 20,\n\"product_id\": 53,\n\"quantity\": 15,\n\"color\": \"blue\",\n\"created_at\": \"2019-10-11 12:56:14\",\n\"updated_at\": \"2019-11-01 12:06:42\"\n}\n},\n{\n\"id\": 56,\n\"created_at\": \"2019-10-11 12:59:31\",\n\"updated_at\": \"2019-11-01 12:06:31\",\n\"name\": \"HONOR S3\",\n\"rate\": \"15000\",\n\"qty_left\": \"15\",\n\"status\": \"Active\",\n\"categories\": [\n{\n\"id\": 48,\n\"created_at\": \"2019-10-25 12:11:40\",\n\"updated_at\": \"2019-10-25 12:11:40\",\n\"name\": \"Mobile\",\n\"parent_id\": 47,\n\"deleted_at\": null,\n\"pivot\": {\n\"product_id\": 56,\n\"category_id\": 48,\n\"created_at\": \"2019-10-29 08:46:32\",\n\"updated_at\": \"2019-10-29 09:12:11\"\n}\n}\n],\n\"product_image\": [\n{\n\"id\": 58,\n\"name\": \"Product Image/1570798771_honor4.jpeg\",\n\"product_id\": 56,\n\"created_at\": \"2019-10-11 12:59:31\",\n\"updated_at\": \"2019-10-11 12:59:31\"\n},\n{\n\"id\": 59,\n\"name\": \"Product Image/1570798771_honor2.jpeg\",\n\"product_id\": 56,\n\"created_at\": \"2019-10-11 12:59:31\",\n\"updated_at\": \"2019-10-11 12:59:31\"\n},\n{\n\"id\": 60,\n\"name\": \"Product Image/1570798772_honor1.jpeg\",\n\"product_id\": 56,\n\"created_at\": \"2019-10-11 12:59:32\",\n\"updated_at\": \"2019-10-11 12:59:32\"\n}\n],\n\"order_carts\": [],\n\"users\": [\n{\n\"id\": 49,\n\"first_name\": \"rahul\",\n\"last_name\": \"shingate\",\n\"email\": \"kajal@gmail.com\",\n\"status\": \"1\",\n\"profile\": \"User/1574343023_x.jpeg\",\n\"created_at\": \"2019-10-07 11:33:25\",\n\"updated_at\": \"2019-12-04 10:01:28\",\n\"google_id\": null,\n\"github_id\": null,\n\"pivot\": {\n\"product_id\": 56,\n\"user_id\": 49\n}\n}\n],\n\"product_attribute\": {\n\"id\": 23,\n\"product_id\": 56,\n\"quantity\": 15,\n\"color\": \"blue\",\n\"created_at\": \"2019-10-11 12:59:32\",\n\"updated_at\": \"2019-11-01 12:06:31\"\n}\n},\n{\n\"id\": 57,\n\"created_at\": \"2019-10-29 09:15:45\",\n\"updated_at\": \"2019-11-01 06:03:25\",\n\"name\": \"MI F7\",\n\"rate\": \"34444\",\n\"qty_left\": \"15\",\n\"status\": \"Active\",\n\"categories\": [\n{\n\"id\": 48,\n\"created_at\": \"2019-10-25 12:11:40\",\n\"updated_at\": \"2019-10-25 12:11:40\",\n\"name\": \"Mobile\",\n\"parent_id\": 47,\n\"deleted_at\": null,\n\"pivot\": {\n\"product_id\": 57,\n\"category_id\": 48,\n\"created_at\": \"2019-10-29 09:15:45\",\n\"updated_at\": \"2019-10-29 09:15:45\"\n}\n}\n],\n\"product_image\": [\n{\n\"id\": 62,\n\"name\": \"Product Image/1572340545_appo1.jpeg\",\n\"product_id\": 57,\n\"created_at\": \"2019-10-29 09:15:45\",\n\"updated_at\": \"2019-10-29 09:15:45\"\n}\n],\n\"order_carts\": [],\n\"users\": [],\n\"product_attribute\": {\n\"id\": 24,\n\"product_id\": 57,\n\"quantity\": 15,\n\"color\": \"yellow\",\n\"created_at\": \"2019-10-29 09:15:45\",\n\"updated_at\": \"2019-11-01 06:03:25\"\n}\n},\n{\n\"id\": 58,\n\"created_at\": \"2019-10-30 12:10:41\",\n\"updated_at\": \"2019-11-01 12:06:19\",\n\"name\": \"Laptop\",\n\"rate\": \"50000\",\n\"qty_left\": \"15\",\n\"status\": \"Active\",\n\"categories\": [\n{\n\"id\": 50,\n\"created_at\": \"2019-10-25 12:12:49\",\n\"updated_at\": \"2019-10-25 12:12:49\",\n\"name\": \"Computer\",\n\"parent_id\": 47,\n\"deleted_at\": null,\n\"pivot\": {\n\"product_id\": 58,\n\"category_id\": 50,\n\"created_at\": \"2019-10-30 12:10:41\",\n\"updated_at\": \"2019-10-30 12:10:41\"\n}\n}\n],\n\"product_image\": [\n{\n\"id\": 63,\n\"name\": \"Product Image/1572437441_hp3.jpeg\",\n\"product_id\": 58,\n\"created_at\": \"2019-10-30 12:10:41\",\n\"updated_at\": \"2019-10-30 12:10:41\"\n}\n],\n\"order_carts\": [],\n\"users\": [],\n\"product_attribute\": {\n\"id\": 25,\n\"product_id\": 58,\n\"quantity\": 15,\n\"color\": \"blue\",\n\"created_at\": \"2019-10-30 12:10:41\",\n\"updated_at\": \"2019-11-01 12:06:19\"\n}\n},\n{\n\"id\": 59,\n\"created_at\": \"2019-10-30 12:22:27\",\n\"updated_at\": \"2019-11-01 12:06:12\",\n\"name\": \"bullet\",\n\"rate\": \"350000\",\n\"qty_left\": \"15\",\n\"status\": \"Active\",\n\"categories\": [\n{\n\"id\": 56,\n\"created_at\": \"2019-10-30 12:21:09\",\n\"updated_at\": \"2019-10-30 12:21:09\",\n\"name\": \"Bike\",\n\"parent_id\": 53,\n\"deleted_at\": null,\n\"pivot\": {\n\"product_id\": 59,\n\"category_id\": 56,\n\"created_at\": \"2019-10-30 12:22:28\",\n\"updated_at\": \"2019-10-30 12:22:28\"\n}\n}\n],\n\"product_image\": [\n{\n\"id\": 64,\n\"name\": \"Product Image/1572438147_bullet.jpeg\",\n\"product_id\": 59,\n\"created_at\": \"2019-10-30 12:22:27\",\n\"updated_at\": \"2019-10-30 12:22:27\"\n}\n],\n\"order_carts\": [],\n\"users\": [],\n\"product_attribute\": {\n\"id\": 26,\n\"product_id\": 59,\n\"quantity\": 15,\n\"color\": \"black\",\n\"created_at\": \"2019-10-30 12:22:28\",\n\"updated_at\": \"2019-11-01 12:06:13\"\n}\n},\n{\n\"id\": 60,\n\"created_at\": \"2019-10-30 12:23:07\",\n\"updated_at\": \"2019-11-01 12:03:15\",\n\"name\": \"Yamaha KTM\",\n\"rate\": \"500000\",\n\"qty_left\": \"14\",\n\"status\": \"Active\",\n\"categories\": [\n{\n\"id\": 56,\n\"created_at\": \"2019-10-30 12:21:09\",\n\"updated_at\": \"2019-10-30 12:21:09\",\n\"name\": \"Bike\",\n\"parent_id\": 53,\n\"deleted_at\": null,\n\"pivot\": {\n\"product_id\": 60,\n\"category_id\": 56,\n\"created_at\": \"2019-10-30 12:23:07\",\n\"updated_at\": \"2019-10-30 12:23:07\"\n}\n}\n],\n\"product_image\": [\n{\n\"id\": 65,\n\"name\": \"Product Image/1572438187_ktm.jpeg\",\n\"product_id\": 60,\n\"created_at\": \"2019-10-30 12:23:07\",\n\"updated_at\": \"2019-10-30 12:23:07\"\n}\n],\n\"order_carts\": [],\n\"users\": [],\n\"product_attribute\": {\n\"id\": 27,\n\"product_id\": 60,\n\"quantity\": 15,\n\"color\": \"RED\",\n\"created_at\": \"2019-10-30 12:23:07\",\n\"updated_at\": \"2019-11-01 04:44:15\"\n}\n},\n{\n\"id\": 61,\n\"created_at\": \"2019-10-30 12:24:19\",\n\"updated_at\": \"2019-11-01 12:06:44\",\n\"name\": \"YAMAHA Z1\",\n\"rate\": \"70000\",\n\"qty_left\": \"13\",\n\"status\": \"Active\",\n\"categories\": [\n{\n\"id\": 56,\n\"created_at\": \"2019-10-30 12:21:09\",\n\"updated_at\": \"2019-10-30 12:21:09\",\n\"name\": \"Bike\",\n\"parent_id\": 53,\n\"deleted_at\": null,\n\"pivot\": {\n\"product_id\": 61,\n\"category_id\": 56,\n\"created_at\": \"2019-10-30 12:24:19\",\n\"updated_at\": \"2019-10-30 12:24:19\"\n}\n}\n],\n\"product_image\": [\n{\n\"id\": 66,\n\"name\": \"Product Image/1572438259_bike1.jpeg\",\n\"product_id\": 61,\n\"created_at\": \"2019-10-30 12:24:19\",\n\"updated_at\": \"2019-10-30 12:24:19\"\n}\n],\n\"order_carts\": [\n{\n\"id\": 12,\n\"order_code\": \"OD_1572609724\",\n\"user_id\": 117,\n\"billing_id\": 64,\n\"coupon_id\": null,\n\"deleted_at\": null,\n\"created_at\": \"2019-11-01 12:02:04\",\n\"updated_at\": \"2019-11-01 12:02:04\",\n\"shipping_id\": 65,\n\"pivot\": {\n\"product_id\": 61,\n\"order_id\": 12,\n\"qty\": 2,\n\"total\": \"140000\",\n\"images\": \"Product Image/1572438259_bike1.jpeg\",\n\"created_at\": \"2019-11-01 12:02:04\",\n\"total_cart\": \"192100\",\n\"total_qty\": \"3\",\n\"category_name\": \"Bike\"\n}\n}\n],\n\"users\": [],\n\"product_attribute\": {\n\"id\": 28,\n\"product_id\": 61,\n\"quantity\": 15,\n\"color\": \"yellow\",\n\"created_at\": \"2019-10-30 12:24:19\",\n\"updated_at\": \"2019-11-01 12:06:07\"\n}\n},\n{\n\"id\": 62,\n\"created_at\": \"2019-10-30 12:24:55\",\n\"updated_at\": \"2019-11-01 12:06:44\",\n\"name\": \"Pulser\",\n\"rate\": \"9\",\n\"qty_left\": \"13\",\n\"status\": \"Active\",\n\"categories\": [\n{\n\"id\": 56,\n\"created_at\": \"2019-10-30 12:21:09\",\n\"updated_at\": \"2019-10-30 12:21:09\",\n\"name\": \"Bike\",\n\"parent_id\": 53,\n\"deleted_at\": null,\n\"pivot\": {\n\"product_id\": 62,\n\"category_id\": 56,\n\"created_at\": \"2019-10-30 12:24:55\",\n\"updated_at\": \"2019-10-30 12:24:55\"\n}\n}\n],\n\"product_image\": [\n{\n\"id\": 67,\n\"name\": \"Product Image/1572438295_bajaj.jpeg\",\n\"product_id\": 62,\n\"created_at\": \"2019-10-30 12:24:55\",\n\"updated_at\": \"2019-10-30 12:24:55\"\n}\n],\n\"order_carts\": [],\n\"users\": [],\n\"product_attribute\": {\n\"id\": 29,\n\"product_id\": 62,\n\"quantity\": 15,\n\"color\": \"black\",\n\"created_at\": \"2019-10-30 12:24:55\",\n\"updated_at\": \"2019-11-01 12:06:01\"\n}\n},\n{\n\"id\": 63,\n\"created_at\": \"2019-10-30 12:25:32\",\n\"updated_at\": \"2019-11-01 12:06:45\",\n\"name\": \"Avast Antivirus\",\n\"rate\": \"700\",\n\"qty_left\": \"8\",\n\"status\": \"Active\",\n\"categories\": [\n{\n\"id\": 58,\n\"created_at\": \"2019-10-30 12:21:49\",\n\"updated_at\": \"2019-10-30 12:21:49\",\n\"name\": \"Anti Virus\",\n\"parent_id\": 55,\n\"deleted_at\": null,\n\"pivot\": {\n\"product_id\": 63,\n\"category_id\": 58,\n\"created_at\": \"2019-10-30 12:25:32\",\n\"updated_at\": \"2019-10-30 12:25:32\"\n}\n}\n],\n\"product_image\": [\n{\n\"id\": 68,\n\"name\": \"Product Image/1572438332_avast.jpeg\",\n\"product_id\": 63,\n\"created_at\": \"2019-10-30 12:25:32\",\n\"updated_at\": \"2019-10-30 12:25:32\"\n}\n],\n\"order_carts\": [\n{\n\"id\": 11,\n\"order_code\": \"OD_1572609627\",\n\"user_id\": 117,\n\"billing_id\": 62,\n\"coupon_id\": 6,\n\"deleted_at\": null,\n\"created_at\": \"2019-11-01 12:00:27\",\n\"updated_at\": \"2019-11-01 12:00:27\",\n\"shipping_id\": 63,\n\"pivot\": {\n\"product_id\": 63,\n\"order_id\": 11,\n\"qty\": 7,\n\"total\": \"4900\",\n\"images\": \"Product Image/1572438332_avast.jpeg\",\n\"created_at\": \"2019-11-01 12:00:27\",\n\"total_cart\": \"4165\",\n\"total_qty\": \"1\",\n\"category_name\": \"Anti Virus\"\n}\n},\n{\n\"id\": 12,\n\"order_code\": \"OD_1572609724\",\n\"user_id\": 117,\n\"billing_id\": 64,\n\"coupon_id\": null,\n\"deleted_at\": null,\n\"created_at\": \"2019-11-01 12:02:04\",\n\"updated_at\": \"2019-11-01 12:02:04\",\n\"shipping_id\": 65,\n\"pivot\": {\n\"product_id\": 63,\n\"order_id\": 12,\n\"qty\": 3,\n\"total\": \"2100\",\n\"images\": \"Product Image/1572438332_avast.jpeg\",\n\"created_at\": \"2019-11-01 12:02:04\",\n\"total_cart\": \"192100\",\n\"total_qty\": \"3\",\n\"category_name\": \"Anti Virus\"\n}\n},\n{\n\"id\": 45,\n\"order_code\": \"OD_1574080794\",\n\"user_id\": 49,\n\"billing_id\": 66,\n\"coupon_id\": 3,\n\"deleted_at\": null,\n\"created_at\": \"2019-11-18 12:39:54\",\n\"updated_at\": \"2019-11-18 12:39:54\",\n\"shipping_id\": 108,\n\"pivot\": {\n\"product_id\": 63,\n\"order_id\": 45,\n\"qty\": 3,\n\"total\": \"2100\",\n\"images\": \"Product Image/1572438332_avast.jpeg\",\n\"created_at\": \"2019-11-18 12:39:54\",\n\"total_cart\": \"1575\",\n\"total_qty\": \"1\",\n\"category_name\": \"Anti Virus\"\n}\n}\n],\n\"users\": [],\n\"product_attribute\": {\n\"id\": 30,\n\"product_id\": 63,\n\"quantity\": 20,\n\"color\": \"red\",\n\"created_at\": \"2019-10-30 12:25:32\",\n\"updated_at\": \"2019-11-01 12:05:33\"\n}\n},\n{\n\"id\": 64,\n\"created_at\": \"2019-10-30 12:27:19\",\n\"updated_at\": \"2019-11-01 12:05:54\",\n\"name\": \"Quick Heal\",\n\"rate\": \"500\",\n\"qty_left\": \"20\",\n\"status\": \"Active\",\n\"categories\": [\n{\n\"id\": 58,\n\"created_at\": \"2019-10-30 12:21:49\",\n\"updated_at\": \"2019-10-30 12:21:49\",\n\"name\": \"Anti Virus\",\n\"parent_id\": 55,\n\"deleted_at\": null,\n\"pivot\": {\n\"product_id\": 64,\n\"category_id\": 58,\n\"created_at\": \"2019-10-30 12:27:19\",\n\"updated_at\": \"2019-10-30 12:27:19\"\n}\n}\n],\n\"product_image\": [\n{\n\"id\": 69,\n\"name\": \"Product Image/1572438439_quick.jpeg\",\n\"product_id\": 64,\n\"created_at\": \"2019-10-30 12:27:19\",\n\"updated_at\": \"2019-10-30 12:27:19\"\n}\n],\n\"order_carts\": [],\n\"users\": [],\n\"product_attribute\": {\n\"id\": 31,\n\"product_id\": 64,\n\"quantity\": 20,\n\"color\": \"oranges\",\n\"created_at\": \"2019-10-30 12:27:19\",\n\"updated_at\": \"2019-11-18 10:19:01\"\n}\n},\n{\n\"id\": 66,\n\"created_at\": \"2019-10-31 12:45:59\",\n\"updated_at\": \"2019-11-01 12:06:45\",\n\"name\": \"JCB Pokelane\",\n\"rate\": \"780000\",\n\"qty_left\": \"18\",\n\"status\": \"Active\",\n\"categories\": [\n{\n\"id\": 57,\n\"created_at\": \"2019-10-30 12:21:24\",\n\"updated_at\": \"2019-11-18 09:29:42\",\n\"name\": \"JCB\",\n\"parent_id\": 0,\n\"deleted_at\": null,\n\"pivot\": {\n\"product_id\": 66,\n\"category_id\": 57,\n\"created_at\": \"2019-10-31 12:45:59\",\n\"updated_at\": \"2019-10-31 12:45:59\"\n}\n}\n],\n\"product_image\": [\n{\n\"id\": 71,\n\"name\": \"Product Image/1572525959_poklane.jpeg\",\n\"product_id\": 66,\n\"created_at\": \"2019-10-31 12:45:59\",\n\"updated_at\": \"2019-10-31 12:45:59\"\n}\n],\n\"order_carts\": [],\n\"users\": [\n{\n\"id\": 49,\n\"first_name\": \"rahul\",\n\"last_name\": \"shingate\",\n\"email\": \"kajal@gmail.com\",\n\"status\": \"1\",\n\"profile\": \"User/1574343023_x.jpeg\",\n\"created_at\": \"2019-10-07 11:33:25\",\n\"updated_at\": \"2019-12-04 10:01:28\",\n\"google_id\": null,\n\"github_id\": null,\n\"pivot\": {\n\"product_id\": 66,\n\"user_id\": 49\n}\n}\n],\n\"product_attribute\": {\n\"id\": 33,\n\"product_id\": 66,\n\"quantity\": 20,\n\"color\": \"YELLOW\",\n\"created_at\": \"2019-10-31 12:45:59\",\n\"updated_at\": \"2019-11-01 12:05:41\"\n}\n},\n{\n\"id\": 67,\n\"created_at\": \"2019-11-01 03:19:57\",\n\"updated_at\": \"2019-11-01 12:03:15\",\n\"name\": \"Apple XXL\",\n\"rate\": \"25000\",\n\"qty_left\": \"25\",\n\"status\": \"Active\",\n\"categories\": [\n{\n\"id\": 48,\n\"created_at\": \"2019-10-25 12:11:40\",\n\"updated_at\": \"2019-10-25 12:11:40\",\n\"name\": \"Mobile\",\n\"parent_id\": 47,\n\"deleted_at\": null,\n\"pivot\": {\n\"product_id\": 67,\n\"category_id\": 48,\n\"created_at\": \"2019-11-01 03:19:57\",\n\"updated_at\": \"2019-11-01 03:19:57\"\n}\n}\n],\n\"product_image\": [\n{\n\"id\": 72,\n\"name\": \"Product Image/1572578397_APPLE.jpeg\",\n\"product_id\": 67,\n\"created_at\": \"2019-11-01 03:19:57\",\n\"updated_at\": \"2019-11-01 03:19:57\"\n},\n{\n\"id\": 73,\n\"name\": \"Product Image/1572578397_Apple2.jpeg\",\n\"product_id\": 67,\n\"created_at\": \"2019-11-01 03:19:57\",\n\"updated_at\": \"2019-11-01 03:19:57\"\n},\n{\n\"id\": 74,\n\"name\": \"Product Image/1572578397_apple2.jpeg\",\n\"product_id\": 67,\n\"created_at\": \"2019-11-01 03:19:57\",\n\"updated_at\": \"2019-11-01 03:19:57\"\n}\n],\n\"order_carts\": [\n{\n\"id\": 10,\n\"order_code\": \"OD_1572609008\",\n\"user_id\": 117,\n\"billing_id\": 60,\n\"coupon_id\": 7,\n\"deleted_at\": null,\n\"created_at\": \"2019-11-01 11:50:08\",\n\"updated_at\": \"2019-11-01 11:50:08\",\n\"shipping_id\": 61,\n\"pivot\": {\n\"product_id\": 67,\n\"order_id\": 10,\n\"qty\": 3,\n\"total\": \"75000\",\n\"images\": \"Product Image/1572578397_APPLE.jpeg\",\n\"created_at\": \"2019-11-01 11:50:08\",\n\"total_cart\": \"37500\",\n\"total_qty\": \"1\",\n\"category_name\": \"Mobile\"\n}\n},\n{\n\"id\": 12,\n\"order_code\": \"OD_1572609724\",\n\"user_id\": 117,\n\"billing_id\": 64,\n\"coupon_id\": null,\n\"deleted_at\": null,\n\"created_at\": \"2019-11-01 12:02:04\",\n\"updated_at\": \"2019-11-01 12:02:04\",\n\"shipping_id\": 65,\n\"pivot\": {\n\"product_id\": 67,\n\"order_id\": 12,\n\"qty\": 2,\n\"total\": \"50000\",\n\"images\": \"Product Image/1572578397_APPLE.jpeg\",\n\"created_at\": \"2019-11-01 12:02:04\",\n\"total_cart\": \"192100\",\n\"total_qty\": \"3\",\n\"category_name\": \"Mobile\"\n}\n}\n],\n\"users\": [\n{\n\"id\": 49,\n\"first_name\": \"rahul\",\n\"last_name\": \"shingate\",\n\"email\": \"kajal@gmail.com\",\n\"status\": \"1\",\n\"profile\": \"User/1574343023_x.jpeg\",\n\"created_at\": \"2019-10-07 11:33:25\",\n\"updated_at\": \"2019-12-04 10:01:28\",\n\"google_id\": null,\n\"github_id\": null,\n\"pivot\": {\n\"product_id\": 67,\n\"user_id\": 49\n}\n}\n],\n\"product_attribute\": {\n\"id\": 34,\n\"product_id\": 67,\n\"quantity\": 30,\n\"color\": \"black\",\n\"created_at\": \"2019-11-01 03:19:57\",\n\"updated_at\": \"2019-11-01 04:11:08\"\n}\n},\n{\n\"id\": 68,\n\"created_at\": \"2019-11-05 10:23:05\",\n\"updated_at\": \"2019-11-05 10:23:05\",\n\"name\": \"appo x9\",\n\"rate\": \"6700\",\n\"qty_left\": \"1\",\n\"status\": \"Active\",\n\"categories\": [\n{\n\"id\": 48,\n\"created_at\": \"2019-10-25 12:11:40\",\n\"updated_at\": \"2019-10-25 12:11:40\",\n\"name\": \"Mobile\",\n\"parent_id\": 47,\n\"deleted_at\": null,\n\"pivot\": {\n\"product_id\": 68,\n\"category_id\": 48,\n\"created_at\": \"2019-11-05 10:23:05\",\n\"updated_at\": \"2019-11-05 10:23:05\"\n}\n}\n],\n\"product_image\": [\n{\n\"id\": 75,\n\"name\": \"Product Image/1572949385_appo.jpeg\",\n\"product_id\": 68,\n\"created_at\": \"2019-11-05 10:23:05\",\n\"updated_at\": \"2019-11-05 10:23:05\"\n},\n{\n\"id\": 76,\n\"name\": \"Product Image/1572949385_appo2.jpeg\",\n\"product_id\": 68,\n\"created_at\": \"2019-11-05 10:23:05\",\n\"updated_at\": \"2019-11-05 10:23:05\"\n}\n],\n\"order_carts\": [\n{\n\"id\": 43,\n\"order_code\": \"OD_1573099276\",\n\"user_id\": 49,\n\"billing_id\": 10,\n\"coupon_id\": 7,\n\"deleted_at\": null,\n\"created_at\": \"2019-11-07 04:01:16\",\n\"updated_at\": \"2019-11-07 04:01:16\",\n\"shipping_id\": 106,\n\"pivot\": {\n\"product_id\": 68,\n\"order_id\": 43,\n\"qty\": 1,\n\"total\": \"6700\",\n\"images\": \"Product Image/1572949385_appo.jpeg\",\n\"created_at\": \"2019-11-07 04:01:16\",\n\"total_cart\": \"3350\",\n\"total_qty\": \"1\",\n\"category_name\": \"Mobile\"\n}\n}\n],\n\"users\": [\n{\n\"id\": 49,\n\"first_name\": \"rahul\",\n\"last_name\": \"shingate\",\n\"email\": \"kajal@gmail.com\",\n\"status\": \"1\",\n\"profile\": \"User/1574343023_x.jpeg\",\n\"created_at\": \"2019-10-07 11:33:25\",\n\"updated_at\": \"2019-12-04 10:01:28\",\n\"google_id\": null,\n\"github_id\": null,\n\"pivot\": {\n\"product_id\": 68,\n\"user_id\": 49\n}\n}\n],\n\"product_attribute\": {\n\"id\": 35,\n\"product_id\": 68,\n\"quantity\": 1,\n\"color\": \"RED\",\n\"created_at\": \"2019-11-05 10:23:05\",\n\"updated_at\": \"2019-11-05 10:23:05\"\n}\n}\n]\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/ProductController.php",
    "groupTitle": "Product"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/profile/details",
    "title": "",
    "group": "Profile",
    "name": "Profile_Details",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False) { &quot;status&quot;: false, &quot;message&quot;: &quot;User Not Found&quot; }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"status\": false,\n\"message\": {\n\"User Not Found\"\n},\n\"data\": []\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"success\",\n\"data\": {\n\"id\": 163,\n\"first_name\": \"arul\",\n\"last_name\": \"acharya\",\n\"email\": \"arul234@gmail.com\",\n\"status\": \"1\",\n\"profile\": null,\n\"created_at\": \"2019-12-04 12:26:35\",\n\"updated_at\": \"2019-12-04 13:27:40\",\n\"google_id\": null,\n\"github_id\": null\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/ProfileController.php",
    "groupTitle": "Profile"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/profile/password",
    "title": "",
    "group": "Profile",
    "name": "Profile_Password_change",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "current-password",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "new-password",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "new-password_confirmation",
            "description": "<p>Mandatory</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False) { &quot;status&quot;: false, &quot;error&quot;:'Your current password does not matches with the password you provided. Please try again.' }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n{\n\"message\": \"The given data was invalid.\",\n\"error\": {\n\"current-password\": [\n\"The current-password field is required.\"\n],\n\"new-password\": [\n\"The new-password field is required.\"\n]\n}\n}\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"Your Passsword Successfully Change\",\n\"data\": {\n\"id\": 163,\n\"first_name\": \"arul1\",\n\"last_name\": \"acharya1\",\n\"email\": \"arul234@gmail.com\",\n\"status\": \"1\",\n\"profile\": \"User/1575525033_s4.jpeg\",\n\"created_at\": \"2019-12-04 12:26:35\",\n\"updated_at\": \"2019-12-05 05:56:18\",\n\"google_id\": null,\n\"github_id\": null\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/ProfileController.php",
    "groupTitle": "Profile"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/profile/update",
    "title": "",
    "group": "Profile",
    "name": "Profile_Update",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False) { &quot;status&quot;: false, &quot;error&quot;: &quot;User Not Found&quot; }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"status\": false,\n\"error\": 'Profile Is Not Updated',\n\n},\n\"data\": []\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"success\",\n\"data\": {\n\"id\": 163,\n\"first_name\": \"arul1\",\n\"last_name\": \"acharya1\",\n\"email\": \"arul234@gmail.com\",\n\"status\": \"1\",\n\"profile\": \"User/1575524439_s4.jpeg\",\n\"created_at\": \"2019-12-04 12:26:35\",\n\"updated_at\": \"2019-12-05 05:40:39\",\n\"google_id\": null,\n\"github_id\": null\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/ProfileController.php",
    "groupTitle": "Profile"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/login",
    "title": "",
    "group": "User",
    "name": "User_Login",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Mandatory</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False) { &quot;status&quot;: false, &quot;message&quot;: &quot;Email Or Password Does Not Exist&quot; }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"status\": false,\n\"message\": {\n\"email\": [\n\"Email Required\"\n],\n\"password\": [\n\"Password Required\"\n]\n},\n\"data\": []\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"Success\",\n\"data\": {\n\"token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImVmYzBhNGJmYmVlN2IyOWQxZTM2YWMzZWI0MDdmYWNjZWRlNGIzMTJjMzdlNzI2M2VjNDA2YjQ2NWIwYTM0NWFlZjg3ZjM1YTA0YzcwYTllIn0.eyJhdWQiOiIxIiwianRpIjoiZWZjMGE0YmZiZWU3YjI5ZDFlMzZhYzNlYjQwN2ZhY2NlZGU0YjMxMmMzN2U3MjYzZWM0MDZiNDY1YjBhMzQ1YWVmODdmMzVhMDRjNzBhOWUiLCJpYXQiOjE1NzU0NjM3MDQsIm5iZiI6MTU3NTQ2MzcwNCwiZXhwIjoxNjA3MDg2MTA0LCJzdWIiOiIxNjMiLCJzY29wZXMiOltdfQ.g7rCRhMff_tXNypQYQDvHZWqRCFs0L9JMPrzFVBUyQJUiMFG8j7Eyb3NiFV1tPvhSYzgDU70JfpoNLRQs5u_5FuIrfAWrczkOIe1s6onLc3dpekXTPxISpU954wDdIP5CNKlXmDJiwLHFjoV7Iq9e_7CBhczCgyzQjF5UaGEhPwC4j8aNFyGGE5d5qpZXva9QITQPa_cf0zvJDNIG0COcQUEiJKQ7tXdAewU9i5JSbPmO_KlnKnWcr8bteWJKN3Xj6HszD2m8E3A1UGdQynYRLHz5v8FvWgMP7h5xVuyPGMveCuztT3N0u0mIMaaiy3lOLuBDCjlula5i4A1yQxWBAu8kRvErlo2aVdpT-9AMNi2kUYCA8rSw0NFMWaTRr1Ua68psnm3k0GYkfzCWMh5p0ZK7Bhg2NQ-rjGSg3RYJO3ZEmg_nsAER9xaQ-SP67MhKGlSM2y0y7hPrhQHsrFpsld_JeSxagnP4BLyz0zukPWHFSBKIteQFzDJ7NpH_Bcpo2O-9kEjvhqFOYdSPDShOsYvknANqY2EcC-cd3WHp6itFDO-mTwh3s2QaE40ZzRS3FKA2BFWJQcvsCzQyu0jXQw9tfEcFQixNOQ-0eqFzWIMOpUim3zK-2mIV4aGEqw-CtP58uRUaN4o02-IBK4rggpDhdYn9dGaYVOpm132b20\",\n\"data\": {\n\"id\": 163,\n\"first_name\": \"arul\",\n\"last_name\": \"acharya\",\n\"email\": \"arul234@gmail.com\",\n\"status\": \"1\",\n\"profile\": null,\n\"created_at\": \"2019-12-04 12:26:35\",\n\"updated_at\": \"2019-12-04 12:26:35\",\n\"google_id\": null,\n\"github_id\": null\n}\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/UserController.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/password/email",
    "title": "",
    "group": "User",
    "name": "User_Password_Forget",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Mandatory</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False) { &quot;status&quot;: false, &quot;message&quot;: &quot;Email Or Password Does Not Exist&quot; }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"status\": false,\n\"message\": {\n\"email\": [\n\"Email Required\"\n]\n},\n\"data\": []\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"Success\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/ForgotPasswordController.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/password/reset",
    "title": "",
    "group": "User",
    "name": "User_Password_Reset",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "c_password",
            "description": "<p>Mandatory</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False) { &quot;status&quot;: false, &quot;message&quot;: &quot;Email Or Password Does Not Exist&quot; }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"status\": false,\n\"message\": {\n\"token\": [\n\"token is required\"\n],\n\"email\": [\n\"Email Required\"\n],\n\"password\": [\n\"Password Required\"\n],\n\"c_password\": [\n\"Confirm Password Required\"\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"Your Password Successfully Changes\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/ResetPasswordController.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/register",
    "title": "",
    "group": "User",
    "name": "User_Register",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "first_name",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "last_name",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Mandatory</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "c_password",
            "description": "<p>Mandatory</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": ""
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"Success\",\n\"data\": {\n\"first_name\": \"arul\",\n\"last_name\": \"acharya\",\n\"email\": \"arul234@gmail.com\",\n\"updated_at\": \"2019-12-04 12:26:35\",\n\"created_at\": \"2019-12-04 12:26:35\",\n\"id\": 163,\n\"roles\": [\n{\n\"id\": 5,\n\"name\": \"customer\",\n\"guard_name\": \"web\",\n\"created_at\": \"2019-09-07 06:26:27\",\n\"updated_at\": \"2019-09-07 06:26:27\",\n\"pivot\": {\n\"model_id\": 163,\n\"role_id\": 5,\n\"model_type\": \"App\\\\User\"\n}\n}\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False)</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"status\": false,\n\"message\": {\n\"first_name\": [\n\"First Name Required\"\n],\n\"last_name\": [\n\"Last Name Required\"\n],\n\"email\": [\n\"Email Required\"\n],\n\"password\": [\n\"Password Required\"\n],\n\"c_password\": [\n\"Confirm Password Required\"\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/UserController.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/wishlist/store",
    "title": "",
    "group": "Wishlist",
    "name": "Wishlist_Add",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False) { &quot;status&quot;: false, &quot;message&quot;: &quot;Product Not Found&quot;, &quot;data&quot;: { &quot;wishlist&quot;: [] } }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"status\": false,\n\"message\": {\n\"wish\": [\n\"The wish field is required.\"\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"WishList Add SuccessFully\",\n\"data\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/WishListController.php",
    "groupTitle": "Wishlist"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/wishlist/delete",
    "title": "",
    "group": "Wishlist",
    "name": "Wishlist_Delete",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False) { &quot;status&quot;: false, &quot;message&quot;: &quot;Wishlist Not Found&quot;, &quot;data&quot;: [] }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n\"status\": false,\n\"message\": {\n\"wish\": [\n\"The wish field is required.\"\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"WishList Add SuccessFully\",\n\"data\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/WishListController.php",
    "groupTitle": "Wishlist"
  },
  {
    "type": "post",
    "url": "http://localhost:8000/api/wishlist/details",
    "title": "",
    "group": "Wishlist",
    "name": "Wishlist_Details",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>response status (False) { &quot;status&quot;: false, &quot;message&quot;: &quot;Product Not Found&quot;, &quot;data&quot;: { &quot;wishlist&quot;: [] } }</p>"
          },
          {
            "group": "Error 4xx",
            "type": "object[]",
            "optional": false,
            "field": "data",
            "description": ""
          },
          {
            "group": "Error 4xx",
            "type": "Object[]",
            "optional": false,
            "field": "error",
            "description": "<p>message to display</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "{\n{\n\"status\": false,\n\"message\": \"Product Not Found\",\n\"data\": {\n\"wishlist\": []\n}\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "{\n\"status\": true,\n\"message\": \"Success\",\n\"data\": {\n\"wishlist\": [\n[\n{\n\"id\": 15,\n\"user_id\": 163,\n\"product_id\": 53,\n\"created_at\": \"2019-12-05 06:31:26\",\n\"updated_at\": \"2019-12-05 06:31:26\",\n\"products\": {\n\"id\": 53,\n\"created_at\": \"2019-10-11 12:56:14\",\n\"updated_at\": \"2019-11-01 12:06:41\",\n\"name\": \"LG WashingMachine X2\",\n\"rate\": \"5555\",\n\"qty_left\": \"15\",\n\"status\": \"Active\",\n\"product_image\": [\n{\n\"id\": 50,\n\"name\": \"Product Image/1570798574_lg7.jpeg\",\n\"product_id\": 53,\n\"created_at\": \"2019-10-11 12:56:14\",\n\"updated_at\": \"2019-10-11 12:56:14\"\n}\n]\n}\n}\n]\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/API/WishListController.php",
    "groupTitle": "Wishlist"
  }
] });
