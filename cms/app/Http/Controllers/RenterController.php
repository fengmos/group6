<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use DB;
use Symfony\Component\HttpFoundation\Session\Session;
/**
 * 租户控制器
 * @author   liyang
 */
class RenterController extends CommonController
{
    /**
     * 租户列表
     * @return [type] [description]
     */
    public function renter_show()
    {
        return view('rent.renter_show');
    }

    /**
     * 租户添加
     * @return [type] [description]
     */
    public function renter_add()
    {
        return view('rent.renter_add');
    }
}