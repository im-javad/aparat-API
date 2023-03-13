<?PhP 
namespace App\Services\Aparat;
use Illuminate\Support\Facades\Http;

class AparatHandler{
    public function __construct(private Http $http) {
    }

    public function receivePopularVideos()
    {
        $url = 'https://www.aparat.com/etc/api/mostviewedvideos';

        $popularVideos = $this->http::get($url);
        
        return $popularVideos->json()['mostviewedvideos'];
    }

    public function login()
    {   
        $userId = config('aparat.userId');
        
        $password = sha1(md5(config('aparat.password')));

        $url = "https://www.aparat.com/etc/api/login/luser/{userId}/lpass/{$password}";

        $url = str_replace('{userId}' , $userId , $url);

        $result = $this->http::post($url);
        
        return $result->json()['login'];
    }
}
 