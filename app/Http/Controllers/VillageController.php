<?php
namespace App\Http\Controllers;

use App\Models\Mapping;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VillageController extends Controller
{
    public function villagetData()
    {
        return village('json');
    }
}
