<?php namespace Belar\Betaup;

class Betaup {

    public function generateBetaCode($amount=NULL)
    {
        if($amount)
        {
            $i=0;
            for($i; $i<$amount; $i++)
                {
                    $betaCode = new BetaCode();

                    $unique_code = sha1(microtime(true).mt_rand(10000,90000));
                    $betaCode->beta_code = $unique_code;
                    $betaCode->save();
                }
        }
        else
        {
            $betaCode = new BetaCode();

            $unique_code = sha1(microtime(true).mt_rand(10000,90000));
            $betaCode->beta_code = $unique_code;
            $betaCode->save();
        }        
    }
    
    public function getBetaCodes($type)
    {
        if($type == 'used')
        {
            $betacodes = BetaCode::where('available', '=', false)->get();     
        }
        elseif($type == 'available')
        {
            $betacodes = BetaCode::where('available', '=', true)->get();     
        } 
        else
        {
            $betacodes = BetaCode::all();
        }
        
        if(! $betacodes->isEmpty())
        {
            return $betacodes;    
        }
        else
        {
            return "No beta codes to match your criteria.";
        }
    }
    
    public function getFirstBetaCodeAvailable()
    {
        $betacodes = BetaCode::where('available', '=', true)->first();
        
        if($betacodes)
        {
            return $betacodes;    
        }
        else
        {
            return "No beta codes to match your criteria.";
        }
    }
    
    public function checkBetaCode($user_code)
    {
        $code = BetaCode::where('beta_code','=',$user_code)->where('available','=',true)->first();
        
        if($code)
        {
            return true;
        }
        else
        {
            return false;
        }    
    }
    
}