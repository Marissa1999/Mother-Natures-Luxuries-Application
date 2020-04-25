<?php

class Filter extends Controller
{

    public static function ProductOwner($params)
    {
        $theProduct = self::model('Product')->find($params[0]);

        if($theProduct->seller_id != $_SESSION['profile_id'])
        {
            return '/home/index';
        }

        else
        {
            return false;
        }
    }

    public static function LoginFilter($params)
    {
        if($_SESSION['user_id'] == null)
        {
            return '/login/index';
        }
        else
        {
            return false;
        }
    }

}

?>