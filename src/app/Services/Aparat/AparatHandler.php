<?PhP 
namespace App\Services\Aparat;
use Illuminate\Support\Facades\Http;

class AparatHandler{
    public function __construct(private Http $http) {
    }

    public function receivePopularVideos()
    {
        $url = config('aparat.urls.popular-videos');

        $popularVideos = $this->http::get($url);
        
        return $popularVideos->json()['mostviewedvideos'];
    }

    public function login()
    {   
        $userId = config('aparat.userId');
        
        $password = config('aparat.password');

        $url = config('aparat.urls.login');

        $url = str_replace('{userId}' , $userId , $url);

        $url = str_replace('{password}' , $password , $url);

        $result = $this->http::post($url);
        
        return $result->json()['login'];
    }
}
