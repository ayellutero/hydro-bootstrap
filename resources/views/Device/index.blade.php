@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"> Device Managament </div>

            <div class="panel-body">
                <table id="all-devices" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Device name</th>
                            <th>Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td>asdas</td>
                            <td>sdgf</td>
                            <td>
                                <a data-toggle="tooltip" title="View"><i style="margin: .2em .25em .15em" class="fa fa-file-text-o fa-2x " aria-hidden="true"></i></a>&nbsp;
                                <a  class="withTooltip" title="Edit"><i style="margin: .2em .25em .15em" class="fa fa-bar-chart-o fa-2x " aria-hidden="true"></i></a>
                            </td>
                        </tr>
                     
                     <!-- View Stats Modal -->
                        <div class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Device </h4>
                                    </div>
                                    
                                    <div class="modal-body">
                                       
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection