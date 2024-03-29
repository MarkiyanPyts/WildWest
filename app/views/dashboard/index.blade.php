@extends('layouts.master')
@section('content')
    @include('headers.nav_bar')
    <div class="container-fluid">
        <div class="row">
            <div class="jira-users-panel col-lg-12 col-md-12 col-sm-12">
            <div class="panel-group hidden" id="accordion1" role="tablist" aria-multiselectable="true">
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#connect-to-jira" aria-expanded="true" aria-controls="connect-to-jira">
                                Connect to Jira
                            </a>
                        </h4>
                    </div>
                    <div id="connect-to-jira" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body container">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                {{ Form::open(array('url' => '/', 'role' => 'form', 'id' => 'jira-connect', 'class' => 'form-horizontal')) }}
                                    <div class="form-group">
                                        <h2 class="text-center text-info">Please enter your Jira credentials</h2>
                                    </div>
                                    <div class="form-group">
                                        <label for="jira-user-name" class="col-lg-3 control-label text-info">
                                            User name
                                        </label>
                                        <div class="col-lg-8">
                                            <input name="jira-user-name" id ="jira-user-name" type="text" placeholder="Your Jira user name" class="form-control">
                                        </div>
                                    </div>  
                                    
                                    <div class="form-group">
                                        <label for="jira-password" class="col-lg-3 control-label text-info">Password</label>
                                        <div class="col-lg-8">
                                            <input name = "jira-password" type="text" id="jira-password" class="form-control" placeholder="Your jira password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-8">
                                            <div class="row">
                                                <div class="col-lg-6 col-lg-offset-3">
                                                    <input type="submit" id="jira-connect-button" class="btn  btn-block btn-lg btn-primary" value="Connect to Jira">
                                                </div>
                                            </div>
                                        </div> 
                                    </div>   
                                </form>  
                            </div>                          
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion2" href="#grace-settings" aria-expanded="true" aria-controls="grace-settings">
                                Grace settings:
                            </a>
                            {{{ $grace_settings or '0d 0h 0m' }}}
                        </h4>
                    </div>
                    <div id="grace-settings" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body container">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                {{ Form::open(array('route' => 'grace_periods.store', 'role' => 'form', 'id' => 'form-grace', 'class' => 'form-horizontal')) }}
                                    <div class="form-group">
                                        <h2 class="text-center text-info">Please set the notifications grace period</h2>
                                    </div>
                                    <div class="form-group">
                                        <label for="days" class="col-lg-3 control-label text-info">
                                            Days
                                        </label>
                                        <div class="col-lg-8">
                                            <input name="days" id ="days" type="number" placeholder="number of days till notification" class="form-control">
                                        </div>
                                    </div>  
                                    
                                    <div class="form-group">
                                        <label for="hours" class="col-lg-3 control-label text-info">Hours</label>
                                        <div class="col-lg-8">
                                            <input name = "hours" type="number" id="hours" class="form-control" placeholder="number of hours till notification">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="minutes" class="col-lg-3 control-label text-info">Minutes</label>
                                        <div class="col-lg-8">
                                            <input name = "minutes" type="number" id="minutes" class="form-control" placeholder="number of minutes till notification">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-8">
                                            <div class="row">
                                                <div class="col-lg-6 col-lg-offset-3">
                                                    <input type="submit" id="grace-button" class="btn  btn-block btn-lg btn-primary" value="Set Grace Period">
                                                </div>
                                            </div>
                                        </div> 
                                    </div>   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="jira-users-panel col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Users for current week</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table" id="users-table">
								<thead>
									<tr>
										<td class="table_name"></td>
										<td class="table_date"></td>
										<td class="table_date"></td>
										<td class="table_date"></td>
										<td class="table_date"></td>
										<td class="table_date"></td>
										<td class="table_date"></td>
										<td class="table_date"></td>
									</tr>
								</thead>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
	<div id="layer" style="display:none">
		<div id="loading"></div>
	</div>
    @include('modals.dashboardModals')
    @include('footers.index')
    @include('js_footers.index')
@stop