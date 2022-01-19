<?php

namespace App\Http\Controllers;

use ErrorException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Response;
use PHPUnit\Util\Json;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    static public $jwt = [];

	protected function json($res, $status = 200) {
		return response()->json($res, $status);
	}

	protected function success($res, $status = 200) {

		if (!is_array($res)) {
			$res = ["data" => $res];
		}

		$res = $this->jsonize($res);
		return $this->json($res, $status);

	}

	protected function successWithMessage($response, $message, $status = 200) {

		$response = [
			"code" => $status,
			"message" => $message,
			"data" => $response['data'] ?? $response
		];

		return $this->json($response, $status);

	}

	protected function errorWithMessage($error, $message, $status = 400) {

		$error = [
			"code" => $status,
			"message" => $message,
			"error" => $error
		];

		return $this->json($error, $status);

	}

	protected function error($error, $status = 400) {

		if (!is_array($error)) {
			$error = ["error" => $error];
		}

		return $this->json($error, $status);

	}

	protected function jsonize($response) {

		$res = [];
		foreach ($response as $key => $value) {

			if (is_a($value, Builder::class) || is_a($value, QueryBuilder::class)) {
				$value = $value->get();
			}

			$res[$key] = $value;

		}

		return $res;

	}

	protected function varDump($object) {
		return response("<pre>".var_export($object, true)."</pre>");
	}

}
