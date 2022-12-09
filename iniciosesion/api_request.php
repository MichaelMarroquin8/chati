<?php 
	class api_request {
	
		public function send_curl($apikey, $secret, $uri, $method, $data){
		
			try{
				
				$pwd = hash_hmac('sha1', $method . "|" . $uri . "|" . $data, $secret);
				$ch = curl_init($uri);
				
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'Authorization: Hmac '. base64_encode($apikey . ":" . $pwd),
					'Content-Type: application/json',
					'Content-Length: '.strlen($data)));
				curl_setopt($ch, CURLOPT_TIMEOUT, 5);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

				$result = curl_exec($ch);
				if(curl_errno($ch)){
				throw new Exception(curl_error($ch));
				}
				curl_close($ch);
				return $result;
			}catch(Exception $ex){
				return "Error: ".$ex->getMessage();
			}
		}
		public function send_http_request($apikey, $secret, $uri, $method, $data){
			$pwd = hash_hmac('sha1', $method . "|" . $uri . "|" . $data, $secret);

			$options = array(
				'http' => array(
					'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
								"Authorization: Hmac " . base64_encode($apikey . ":" . $pwd),
					'method' => $method,
					'content' => $data
				)
			);

			$context = stream_context_create($options);

			return file_get_contents($uri, false, $context);
		}
//--------------------------------------------------------------------------------
		public function send_http_request_2( $uri, $method, $data){
		$options = array(
			'http' => array(
				'method' => $method,
				'content' => $data
				)
			);
		$context = stream_context_create($options);
		return file_get_contents($uri, false, $context);
		}
	public function send_curl_2( $uri, $method, $data){
		
			try{
				
//				$pwd = hash_hmac('sha1', $method . "|" . $uri . "|" . $data, $secret);
				$ch = curl_init($uri);
				
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'Content-Type: application/json',
					'Content-Length: '.strlen($data)));
				curl_setopt($ch, CURLOPT_TIMEOUT, 5);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

				$result = curl_exec($ch);

				if(curl_errno($ch)){
				throw new Exception(curl_error($ch));
				}
				curl_close($ch);
				return $result;
			}catch(Exception $ex){
				return "Error: ".$ex->getMessage();
			}
		}		
	}
 ?>