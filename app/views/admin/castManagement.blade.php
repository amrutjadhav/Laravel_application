
@extends('admin.adminLayout')

@section('content')

<div class="page">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cast as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->is_activated != 0)
                            Activated
                            @else
                            Not activated
                            @endif
                        </td>
                        <td>
                            @if($user->is_activated != 0)
                            <a class="btn ink-reaction btn-floating-action btn-warning" href="{{route('adminCastDecline', array('id' => $user->id))}}"><i class="fa fa-times"></i></a>
                            @else
                            <a class="btn ink-reaction btn-floating-action btn-primary" href="{{route('adminCastActivate', array('id' => $user->id))}}"><i class="fa fa-check"></i></a>
                            @endif

                            <a class="btn ink-reaction btn-floating-action btn-info" href="{{route('adminEditCast', array('id' => $user->id))}}"><i class="fa fa-edit"></i></a>

                            <a class="btn ink-reaction btn-floating-action btn-info" href="{{route('addCast')}}"><i class="fa fa-plus"></i></a>

                            <a class="btn ink-reaction btn-floating-action btn-danger" href="{{route('adminCastDelete',array('id' => $user->id))}}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div align="right" id="paglink"><?php echo $cast->links(); ?></div>
            </div><!--end .card-body -->
        </div><!--end .card -->

    </div>

</div>
</div>

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
        <i class="md md-person" style="font-size: 25px;line-height: 65px;"></i>
    </a>
    <ul>

        <li><a class="btn-floating yellow darken-1" href="{{route('adminModeratorManagement')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-visibility" style="line-height:40px;"></i></a></li>

        <li><a class="btn-floating blue" href="{{route('addCast')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-add" style="line-height:40px;"></i></a></li>

    </ul>
</div>
@stop