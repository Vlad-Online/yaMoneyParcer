<?php

class yaMoneyParcer
{
    private $passwordTemplate = ': (\d{4,6})[^,]';
    private $amountTemplate = '(\d{1,10},\d{1,2})р.';
    private $walletTempalte = '(\d{14})';
    private $string;

    public function setString($string)
    {
        $this->string = $string;
    }

    public function getPassword()
    {
        return $this->parce($this->passwordTemplate);
    }

    public function getAmount()
    {
        return $this->parce($this->amountTemplate);
    }

    public function getWallet()
    {
        return $this->parce($this->walletTempalte);
    }

    private function parce($template)
    {
        $matches = [];
        preg_match("#{$template}#", $this->string, $matches);
        if ($matches[1]) {
            return $matches[1];
        } else {
            throw new Exception('Template doesn\'t match '.$template);
        }
    }
}