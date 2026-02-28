<?php

namespace Shop\Store\Http\Controllers;

use App\Http\Controllers\Controller;
use Shop\Store\Services\StoreService;

class StoreController extends Controller
{
    public function __construct(protected StoreService $storeService)
    {
    }
    public function index() {
        $data = $this->storeService->index();
        return view('store::index', $data);
    }
}
