<?php

namespace LinePayamak\Support;

use SoapClient;

class Service
{
    protected $url;
    protected $from;
    protected $client;
    protected $username;
    protected $password;

    function __construct($config)
    {
        $this->url = $config['url'];
        $this->from = $config['from'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->client = new SoapClient($this->url);
    }

    /**
     * Sending SMS to a single or group of numbers.
     * 
     * @param string[] $to Array of phones, The maximum length is 100.
     * @param string $text The message you want to send.
     * 
     * @return integer
     */
    public function SendSMS(
        array $to,
        string $text,
        $udh = "",
        $isflash = false,
        $recId = array(0),
        $status = array(0)
    ) {
        $arguments = [
            'username' => $this->username,
            'password' => $this->password,
            'from' => $this->from,
            'to' => $to,
            'text' => $text,
            'udh' => $udh,
            'isflash' => $isflash,
            'recId' => $recId,
            'status' => $status
        ];
        return $this->client->SendSMS($arguments);
    }

    public function GetCredit()
    {
        $arguments = [
            'username' => $this->username,
            'password' => $this->password
        ];
        return $this->client->GetCredit($arguments);
    }

    public function GetDelivery($recId)
    {
        return $this->client->GetCredit($recId);
    }

    public function SendSimpleSMS(
        array $to,
        string $text,
        $udh = "",
        $isflash = false
    ) {
        $arguments = [
            'username' => $this->username,
            'password' => $this->password,
            'from' => $this->from,
            'to' => $to,
            'text' => $text,
            'udh' => $udh,
            'isflash' => $isflash
        ];
        return $this->client->SendSimpleSMS($arguments);
    }

    public function GetMessages(
        $from = null,
        $location = 1,
        $index = 0,
        $count = 5
    ) {
        $arguments = [
            'username' => $this->username,
            'password' => $this->password,
            'from' => $from == null ? $this->from : $from,
            'location' => $location,
            'index' => $index,
            'count' => $count
        ];
        return $this->client->SendSimpleSMS($arguments);
    }

    public function GetInboxCount($isRead)
    {
        $arguments = [
            'username' => $this->username,
            'password' => $this->password,
            'isRead' => $isRead
        ];
        return $this->client->SendSimpleSMS($arguments);
    }

    public function GetExpireDate()
    {
        $arguments = [
            'username' => $this->username,
            'password' => $this->password
        ];
        return $this->client->GetExpireDate($arguments);
    }
}
