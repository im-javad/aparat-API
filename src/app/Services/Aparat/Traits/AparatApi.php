<?PhP 
namespace App\Services\Aparat\Traits;

trait AparatApi{
    private function handleResponse($data , $statusCode , $option = null)
    {
        return response()->json([
            'data' => $data,
            'third_party' => 'https://aparat.com',
        ] , $statusCode);
    }

    private function errorResponse($errorMsg , $statusCode , $option = null){
        return response()->json([
            'error' => $errorMsg,
            'third_party' => 'https://aparat.com',
        ] , $statusCode);
    }
}
