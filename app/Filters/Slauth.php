<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Slauth implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        // Do something here
        if(session()->get('user_type')!='supplier' || session()->get('id')=="")
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