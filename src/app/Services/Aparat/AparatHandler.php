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
}
