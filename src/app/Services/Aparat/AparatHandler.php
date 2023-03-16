<?PhP 
namespace App\Services\Aparat;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AparatHandler{
    const TOKEN_CACHE_EXPIRED = 86400;

    protected $userId;
    protected $password;
    protected $token;

    public function __construct(private Http $http) {
        $this->userId = config('aparat.userId');
        $this->password = config('aparat.password');
        $this->token = $this->getUserToken();
    }

    public function receivePopularVideos()
    {
        $url = config('aparat.urls.popular-videos');

        $popularVideos = $this->http::get($url);
        
        return $popularVideos->json('mostviewedvideos');
    }

    public function login()
    {           
        $url = config('aparat.urls.login');

        $url = $this->replacement($url , ['userId' => $this->userId , 'password' => $this->password]);

        $result = $this->http::post($url);
        
        return $result->json('login');
    }

    public function upload(string $fileName , string $title , int $category)
    {
        $formResult = $this->getUploadForm();        

        $formAction = $formResult['formAction'];

        $formId = $formResult['frm-id'];

        $uploadResult = $this->http::attach(
            'video' , file_get_contents(storage_path("app/public/{$fileName}")) , $fileName
        )->post($formAction , [
            [
                'name' => 'frm-id',
                'contents' => $formId,
            ],
            [
                'name' => 'data[title]',
                'contents' => $title,
            ],
            [
                'name' => 'data[category]',
                'contents' => $category,
            ],
        ]);
        
        return $uploadResult->json('uploadpost');
    }

    public function delete(string $uid)
    {
        $deleteVidoResult = $this->http::get($this->getDeleteVideoUrl($uid));

        return $deleteVidoResult->json('deletevideo');
    }

    public function videoInformation(string $uid)
    {
        $url = config('aparat.urls.video-information');

        $url = $this->replacement($url , ['uid' => $uid]);

        $result = $this->http::get($url);
        
        if(!(key_exists('uid' , $result->json('video')) && $result->json('video')['uid'] === $uid))
            throw new \App\Exceptions\VideoNotFoundException();

        return $result->json('video');
    }

    private function getUserToken(){
        return Cache::remember('aparat_token', self::TOKEN_CACHE_EXPIRED , function () {
            $loginData = $this->login();

            if(array_key_exists('ltoken' , $loginData)){
                return $loginData['ltoken'];
            }

            throw new \App\Exceptions\lackOfTokenAndServiceErrorException();
        });
    }

    private function getUploadForm()
    {
        $url = config('aparat.urls.uploadForm');

        $url = $this->replacement($url , ['userId' => $this->userId , 'token' => $this->token]);
        
        $result = $this->http::post($url);

        if(is_null($result->json('uploadform.formAction')))
            throw new \App\Exceptions\systemErrorInGettingTheFormActionException();

        return $result->json('uploadform');
    }

    private function getDeleteVideoUrl(string $uid){
        $url = config('aparat.urls.deleteVideoLink');
        
        $url = $this->replacement($url , ['uid' => $uid , 'userId' => $this->userId , 'token' => $this->token]);

        $deleteVidoUrl = $this->http::get($url);

        return $deleteVidoUrl->json('deletevideolink.deleteurl');
    }

    public function replacement($url , $options = [])
    {
        foreach ($options as $key => $value) {
            $url = str_repeat("{{$key}}" , $value , $url);
        }
        
        return $url;
    }
}
