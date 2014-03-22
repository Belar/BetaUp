<?php namespace Belar\Betaup;

class Betaup {

    /*++++++++++++++++++++BETA CODE GENERATOR++++++++++++++++++++*/
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

    /*++++++++++++++++++++REF-KARMA SYSTEM++++++++++++++++++++*/
    public function showRefLink($cred)
    {
        $user = Beta::where('id','=',$cred)->orWhere('email','=',$email)->first();

        if($user)
        {
            return $user->refer;
        }
        else
        {
            return false;
        }
    }

    public function currentKarma($cred)
    {
        $current_karma = Beta::where('id','=',$cred)->orWhere('refer','=',$cred)->orWhere('email','=',$cred)->first()->karma;

        if($current_karma)
        {
            return $current_karma;
        }
        else
        {
            return false;
        }  
    }

    public function karmaUp($cred, $amount)
    {
        $user = Beta::where('id','=',$cred)->orWhere('refer','=',$cred)->orWhere('email','=',$cred)->first();

        if($user)
        {
            $current_karma = $user->karma;
            $user->karma = $current_karma + $amount;
            $user->save();
        }
        else
        {
            return false;
        }   
    }

    public function karmaOrMore($amount=NULL)
    {
        if($amount)
        {
            $karma_users = Beta::where('karma','>=',$amount)->get();
        }
        else
        {
            $karma_users = Beta::where('karma','>=','1')->get();
        }

        if($karma_users)
        {
            return $karma_users;
        }
        else
        {
            return false;
        } 
    }

}

