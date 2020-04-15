<?php

namespace Vanguard\Http\Controllers\Web;

use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Session\SessionRepository;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\User;
use Storage;
use Auth;
use Illuminate\Http\Request;

class VoteController extends Controller
{
	/**
     * @var User
     */
    protected $theUser;
    /**
     * @var UserRepository
     */
    private $users;

    public function __construct(UserRepository $users)
    {
        // Allow access to authenticated users only.
        $this->middleware('auth');
        $this->middleware('session.database', ['only' => ['sessions', 'invalidateSession']]);

        $this->users = $users;

        $this->middleware(function ($request, $next) {
            $this->theUser = Auth::user();
            return $next($request);
        });
    }

    public function index()
    {
    	$user = $this->theUser;
    	// echo $user->state;
        //Storage::put('StateCode.txt', $user->state);

        $myfile = fopen("../Vote/src/StateCode.txt", "w");

        $mysqli = mysqli_connect("localhost", "root", "","evoting");
         
        if ($mysqli->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql= "select constituencyid from login_voterid_constituency where voterid = '$user->voterid'";
        $result = $mysqli->query($sql);
        
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                $constituencyid_output= $row["constituencyid"];
                echo "id: " . $row["constituencyid"];
                }
        } else {
             echo "0 results";
        }

        $sql= "select numberofcandidate from login_constutuencyname_numofcandidate where constituencyid = $constituencyid_output";

         $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
                while($row = $result->fetch_assoc()) {
                    $numofcandidate_output= $row["numberofcandidate"];
                    echo "numberofcandidate: " . $row["numberofcandidate"];
                    }
        } else {
             echo "0 results";
        }

        //echo $user->voterid;
        $code = $user->state;
        fwrite($myfile, $constituencyid_output);
        fwrite($myfile,",");
        fwrite($myfile, $numofcandidate_output);


        //Error Here
    	return view('user.vote', compact('user')); 
    }
}

