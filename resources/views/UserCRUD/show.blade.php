<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Employee ID:</strong>
            {{ $user->employee_id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Position:</strong>
            {{ $user->designation }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contact #:</strong>
            {{ $user->contact_num }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Can access as:</strong>
            @if ( $user->hasRole('User') ? 'checked' : '' )
            User
            @endif
            -
            @if ( $user->hasRole('Head') ? 'checked' : '' )
            Head
            @endif
            -
            @if ( $user->hasRole('Admin') ? 'checked' : '' )
            Admin
            @endif
        </div>
    </div>
</div>