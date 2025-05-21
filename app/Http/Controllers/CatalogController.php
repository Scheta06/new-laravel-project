<?php

namespace App\Http\Controllers;

use App\Models\Chassis;
use App\Models\Psu;
use App\Models\Ram;
use App\Models\Cooler;
use App\Models\FormFactor;
use App\Models\Storage;
use App\Models\Processor;
use App\Models\Videocard;
use App\Models\Motherboard;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function index($type)
    {
        $allProductCase = null;
        $vendor = $this->vendor;

        switch ($type) {
            case 'processor':
                $allProductCase = $this->processorInput;
                break;
            case 'motherboard':
                $allProductCase = $this->motherboardInput;
                $formFactor = FormFactor::all();
                break;
            case 'cooler':
                $allProductCase = Cooler::all();
                break;
            case 'ram':
                $allProductCase = Ram::all();
                break;
            case 'storage':
                $allProductCase = Storage::all();
                break;
            case 'videocard':
                $allProductCase = Videocard::all();
                break;
            case 'psu':
                $allProductCase = Psu::all();
                break;
            case 'chassis':
                $allProductCase = Chassis::all();
                break;
        }

        $title = DB::select('select title from categories where type = :type', ['type' => $type])[0]->title;

        return view('pages.catalog', [
            'type' => $type,
            'allProductCase' => $allProductCase,
            'vendor' => $vendor,
            'title' => $title,
        ]);
    }
}
