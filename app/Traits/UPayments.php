<?php

namespace App\Traits;

trait UPayments
{
    //In Production mode, please pass API_KEY with BCRYPT function
    private $secure = ['merchant_id', 'username', 'password', 'api_key'];
    private $ProductName = [];
    private $ProductQty = [];
    private $ProductPrice = [];
    public $OrderID;
    public $cust_ref;
    private $payment_url;
    private $status;
    private $properties;
    public $totalPrice;
    public $mode;
    public $serverOutput;
    public $redirect_url;

    public function setMode($mode = 'test')
    {
        if (!function_exists('curl_version')) {
            exit ("Enable cURL in PHP");
        }
        $this->mode = $mode;
        $this->status = false;
        if ($this->mode == 'live') {
            $this->properties['test_mode'] = 0;
            $this->payment_url = 'https://api.upayments.com/payment-request';
           // $this->properties['payment_url'] = $this->payment_url;
            $this->properties['merchant_id'] = '15274';
            $this->properties['username'] = 'posteratt';
            $this->properties['password'] = stripslashes('MmkL2Wy6M7g)k5');
            $this->properties['api_key'] = password_hash('YavX0pXJcZ6DUQEjPBAPm4DhJpcyi0YzaJE8yadU', PASSWORD_BCRYPT);
        } else {
            $this->properties['test_mode'] = 1;
            $this->payment_url = 'https://api.upayments.com/test-payment';
//            $this->properties['payment_url'] = $this->payment_url;
            $this->properties['merchant_id'] = '1201';
            $this->properties['username'] = 'test';
            $this->properties['password'] = stripslashes('test');
            $this->properties['api_key'] = 'jtest123';
            ############################################

        }
        $this->properties['CurrencyCode'] = 'KWD';//only works in Production mode
        $this->OrderID =time();
        $this->cust_ref = 'Ref'.$this->OrderID;
        $this->properties['order_id'] = $this->OrderID;
        $this->properties['whitelabled'] = false; // only accept in live credentials (it will not work in test)
        $this->properties['payment_gateway'] = 'knet';// only works in Production mode

        return $this;
    }

    public function __get($propertyName)
    {
        if (array_key_exists($propertyName, $this->properties)) {
            if (in_array($propertyName, $this->secure)) {
                return 'Cry Or Die !';
            }
            return $this->properties[$propertyName];
        }

    }

    public function __set($propertyName, $propertyValue)
    {
        $this->properties[$propertyName] = $propertyValue;
    }

    public function fillProduct($ProductName, $ProductQty, $ProductPrice)
    {
        array_push($this->ProductName, $ProductName);
        array_push($this->ProductQty, $ProductQty);
        array_push($this->ProductPrice, $ProductPrice);
        $this->properties['total_price'] = array_sum($this->ProductPrice);
        return $this;
    }

  public function fillCustomer($CstFName, $CstEmail, $CstMobile,$reference=false)
    {
        $this->properties['CstFName'] = $CstFName;
        $this->properties['CstEmail'] = $CstEmail;
        $this->properties['CstMobile'] = $CstMobile;
        $this->properties['reference'] =$reference? $reference:$this->cust_ref;
        return $this;
    }

    public function doPayment()
    {
        if (!isset($this->properties['success_url'], $this->properties['error_url'])) {
            return 'please give success, error url';
        }
        try {
            $this->properties['ProductName'] = json_encode($this->ProductName);
            $this->properties['ProductQty'] = json_encode($this->ProductQty);
            $this->properties['ProductPrice'] = json_encode($this->ProductPrice);
            $fields_string = http_build_query($this->properties);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->payment_url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            // receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);
            $server_output = json_decode($server_output, true); //dump($server_output);
            if (!isset($server_output)) {
                throw new \Exception("server payment failed");
            }else if(!isset($server_output['paymentURL'])){
                throw new \Exception( $server_output['error_msg']);

            }else{
            $this->redirect_url = $server_output['paymentURL'];
            }
            if (!isset($server_output['status'])) {
                throw new \Exception("response failed");
            }
            $this->status = ($server_output['status'] === 'success') ? true : false;
           $this->serverOutput =  $server_output;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return $this;
    }

//####################test###############################
    public function testProduct()
    {
        $this->fillProduct('computer', 2, 15);
        $this->fillProduct('television', 1, 1500);
        $this->properties['total_price'] = array_sum($this->ProductPrice);
        return $this;
    }

 public function testCustomer()
    {
        $this->fillCustomer('Test Name','test@test.com','12345678');//Ref auto
        return $this;
    }


}