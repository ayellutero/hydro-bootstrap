<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 </head>  
<body> 
<style>
td {
    border:1px solid;
    /*padding:10px;*/
}
.info {
    width: 3.5cm;
    float:left;
    border-bottom:0px;
    padding:2px;
}
.dataReport {
    width: 16cm;
    border-bottom: 0px solid;
    padding:2px;
}
.lastInfo {
    width: 3.5cm;
    float:left;
    border:1px solid;
    padding:2px;  
}
.lastDR {
    width: 16cm;
    border:1px solid;
    padding:2px;  
}
</style>

<div class="row"> <!--style="width:8.5in;height:11in;border:1px solid;margin-left:10%;padding:1in;font-family:Times New Roman">-->
    <h5 style="text-align: center">
    Department of Science and Technology Regional Office No. IV-A <br>
    Jamboree Road, Timugan, Los Baños, Laguna
    </h5>

    <h4 style="text-align: center; margin-top:15px">
        <strong>HYDROMET STATION MAINTENANCE REPORT</strong>
    </h4>
    <br>
    <div id="stationDetails">
        Station ID: <u>{{ $station_id }}</u><br>
        Station Type: <u>{{ $sensor_type }} </u><br>
        Location: <u>{{ $station_name.', '.$location}}</u>
    </div>
    <br>
    <h5>
        <strong>PRE-REPAIR</strong>
    </h5>

    <div >
    <table cellspacing="0">
        <tr>
            <td style="width: 3.5cm;float:left;border-bottom:0px;padding:2px;">Date of Monitoring</td>
            <td style="width: 14cm;border-bottom: 0px;padding:2px;">{{ $monitoring_date }}</td>
        </tr>
        <tr>
            <td class="info" style="height:60px">Initial Findings</td>
            <td style="width: 14cm;border-bottom: 0px;padding:2px;">{{ $init_findings }}</td>
        </tr>
        <tr>
            <td class="info" style="height:60px">Recommended Work to be Done</td>
            <td style="width: 14cm;border-bottom: 0px;padding:2px;">{{ $rec_work }}</td>
        </tr>
        <tr>
            <td class="info">Last Date of Data</td>
            <td style="width: 14cm;border-bottom: 0px;padding:2px;">{{ $last_data }}</td>
        </tr>
        <tr>
            <td class="lastInfo">Assessed by</td>
            <td class="lastDR">{{ $assessed_by }}</td>
        </tr>
    </table>
    <br>
    <h5>
        <strong>POST REPAIR</strong>
    </h5>
    <table cellspacing="0">
        <tr>
            <td style="width: 3.5cm;float:left;border-bottom:0px;padding:2px;">Date of Onsite</td>
            <td style="width: 14cm;border-bottom: 0px;padding:2px;">{{ $onsite_date}} </td>
        </tr>
        <tr>
            <td style="width: 3.5cm;float:left;border-bottom:0px;padding:2px;height:60px">Actual Findings</td>
            <td style="width: 14cm;border-bottom: 0px;padding:2px;">{{ $actual_findings }}</td>
        </tr>
        <tr>
            <td style="width: 3.5cm;float:left;border-bottom:0px;padding:2px;height:60px">Work Done</td>
            <td style="width: 14cm;border-bottom: 0px;padding:2px;">{{ $work_done }}</td>
        </tr>
        <tr>
            <td style="width: 3.5cm;float:left;border-bottom:0px;padding:2px;height:60px">Part Replace/Installed</td>
            <td style="width: 14cm;border-bottom: 0px;padding:2px;">{{ $part_installed }}</td>
        </tr>
        <tr>
            <td style="width: 3.5cm;float:left;border-bottom:0px;padding:2px;">Status</td>
            <td style="width: 14cm;border-bottom: 0px;padding:2px;">{{ $status }}</td>
        </tr>
        <tr>
            <td class="lastInfo">Conducted by</td>
            <td class="lastDR">{{ $conducted_by}}</td>
        </tr>
    </table>
    <br><br>
    <div>
    Verified By:
    <br><br>
    <i><strong><u>{{ $supervisor }}</strong></u>
    <br>
    {{ $designation }}
    </div>

    </div>

</div>
</body>
</html>