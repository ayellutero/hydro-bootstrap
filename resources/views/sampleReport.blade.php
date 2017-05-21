@extends('layouts.app')

@section('pageTitle', 'Dashboard')

@section('content')
<style>
tr {
    border:1px solid;
    /*padding:10px;*/
}
.info {
    width: 3.5cm;
    float:left;
    /*border:1px solid;*/
    padding:2px;
}
.dataReport {
    width: 16cm;
    /*border:1px solid;*/
    border-left: 1px solid;
    padding:2px;
}

</style>
<div class="row" style="width:8.5in;height:11in;border:1px solid;margin-left:10%;padding:1in;font-family:Times New Roman">
    <h5 style="text-align: center">
    Department of Science and Technology Regional Office No. IV-A <br>
    Jamboree Road, Timugan, Los Baños, Laguna
    </h5>

    <h4 style="text-align: center; margin-top:15px">
        <strong>HYDROMET STATION MAINTENANCE REPORT</strong>
    </h4>
    <br>
    <div id="stationDetails">
        Station ID: <br>
        Station Type: <br>
        Location: 
    </div>
    <br>
    <h5>
        <strong>PRE-REPAIR</strong>
    </h5>

    <div >
    <table>
        <tr>
            <td class="info">Date of Monitoring</td>
            <td class="dataReport"></td>
        </tr>
        <tr>
            <td class="info" style="height:60px">Initial Findings</td>
            <td class="dataReport"></td>
        </tr>
        <tr>
            <td class="info" style="height:60px">Recommended Work to be Done</td>
            <td class="dataReport"></td>
        </tr>
        <tr>
            <td class="info">Last Date of Data</td>
            <td class="dataReport"></td>
        </tr>
        <tr>
            <td class="info">Assessed by</td>
            <td class="dataReport"></td>
        </tr>
    </table>
    <br>
    <h5>
        <strong>POST REPAIR</strong>
    </h5>
    <table>
        <tr>
            <td class="info">Date of Onsite</td>
            <td class="dataReport"></td>
        </tr>
        <tr>
            <td class="info" style="height:60px">Actual Findings</td>
            <td class="dataReport"></td>
        </tr>
        <tr>
            <td class="info" style="height:60px">Work Done</td>
            <td class="dataReport"></td>
        </tr>
        <tr>
            <td class="info" style="height:60px">Part Replace/Installed</td>
            <td class="dataReport"></td>
        </tr>
        <tr>
            <td class="info">Status</td>
            <td class="dataReport"></td>
        </tr>
        <tr>
            <td class="info">Conducted by</td>
            <td class="dataReport"></td>
        </tr>
    </table>
    <br><br>
    <div>
    Verified By:
    <br><br>
    <i><strong><u>Name of Supervisor</strong></u>
    <br>
    Designation
    </div>

    </div>

</div>


@endsection