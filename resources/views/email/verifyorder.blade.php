{{-- Bấm vào đây<a href="{{route('sendEmailDoneOder',["email" => $user->email,"verifyToken" => $user->verifyToken])}}">click here</a> --}}


Bấm vào đây<a href="{{route('sendEmailDoneOder',["verifyToken" => $oders->verifyToken])}}">click here</a>