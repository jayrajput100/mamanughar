<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Uauth implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        // Do something here
        $user_session=session()->get('user_session');
        if($user_session['user_type']!='user' || $user_session['user_id']=="")
        {   
        	return redirect()->to(base_url().'/signin');
        }
        	
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}