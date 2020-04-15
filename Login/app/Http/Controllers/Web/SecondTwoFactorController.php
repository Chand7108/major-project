<?php
namespace Vanguard\Http\Controllers\Web;

use Vanguard\Events\User\LoggedIn;
use Vanguard\Events\User\LoggedOut;
use Vanguard\Events\User\Registered;
use Vanguard\Http\Requests\User\SecondTwoFactorRequest;
use Vanguard\Http\Requests\Auth\RegisterRequest;
use Vanguard\Repositories\Role\RoleRepository;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\Services\Auth\TwoFactor\Contracts\Authenticatable;
use Vanguard\Support\Enum\UserStatus;
use Auth;
use Authy;
use Carbon\Carbon;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Validator;
use Vanguard\Http\Requests\User\EnableTwoFactorRequest;

class SecondTwoFactorController extends Controller
{
	 //Second Two Factor Authentication
    public function secondTwoFactor(Request $request)
    {
        $str = (string)$request->input('name');
        $myfile = fopen("../Vote/src/NameCandidate.txt", "w");
        fwrite($myfile, $str);
        return redirect()->route('second_token');
    }

    public function viewToken()
    {
        return view('user.token'); 
    }

    public function postToken(Request $request)
    {
    	$this->validate($request, ['token' => 'required']);
 

        if (! Authy::tokenIsValid(Auth::user(), $request->token)) {
            Auth::logout();
            return redirect()->to('login')->withErrors(trans('app.2fa_token_invalid'));
        }
        return redirect()->intended('http://localhost:3000/dummyvote.html');
    }
}

?>
