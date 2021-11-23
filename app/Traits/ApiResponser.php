<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{

    /*
		 * Build success response
		 * @param string or array of $data
		 * @param int $code
		 * @return Illuminate/Http/JsonResponse
	*/
    public function succcessResponse($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => $data], $code);
    }

    /*
		 * Build error response
		 * @param string or array of $data
		 * @param int $code
		 * @return Illuminate/Http/JsonResponse
	*/
    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }
}
