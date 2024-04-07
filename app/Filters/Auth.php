<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        // Do something here
        $uri = service('uri');
        $ck_url = $uri->getSegment(1);
      
        if(session()->get('user_type')!='admin' || session()->get('id')=="")
        {   
        	/*if($ck_url=="innovaction" && session()->get('user_type')!='supplier')
            {*/
              return redirect()->to(base_url().'/admin');
            /*}*/
            
            
        }
        	
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}