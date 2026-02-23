<?php

namespace Shop\Setting\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shop\Setting\Models\Setting;
use Shop\Setting\Services\SettingService;

class SettingController extends Controller
{
    public function __construct(protected SettingService $settingService)
    {
    }
    public function index()
    {
        $data = $this->settingService->getSetting();
        return view('setting::setting.index', ['setting' =>$data]);
    }


    public function store(Request $request)
    {
        // $request->validate([

        // ]);

        dd($request->all());

    }

}
