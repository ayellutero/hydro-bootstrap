<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; 
use App\Report;
class PDFController extends Controller
{
    //
    public function pdfview(Request $request)
    {
        if($request->has('download')){
            $data = Report::find( $request['data']);
            $pdf = PDF::loadView('sampleReport', $data);
            return $pdf->download('report'.$data['station_id'].'_'.$data['onsite_date'].'.pdf');
        }
    }
}
