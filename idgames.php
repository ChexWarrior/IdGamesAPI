<?php
class IdGamesApi {
  private $curl = null;
  private $endpoint = 'http://www.doomworld.com/idgames/api/api.php';

  private function createUrl($action, $options) {
    $url = "$this->endpoint?action=$action";
    foreach ($options as $name => $value) {
      $url .= "&$name=$value";
    }

    return $url;
  }

  public function pingServer($format = 'json') {
    $this->curl = curl_init();
    $url = $this->createUrl("ping", $format);
    
    curl_setopt_array($this->curl, array(
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => $url
    ));

    try {
      $success = curl_exec($this->curl);
      if($success) {
        return $success;
      } else {
        $error_num = curl_errno();
        $error_msg = curl_error();
        echo "Curl Error Number: $error_num\nCurl Error: $error_msg";
        return FALSE;
      }
    } catch (Exception $e) {
      echo "Exception: {$e->getMessage()}\n";
      return FALSE;
    } finally {
      curl_close($this->curl);
    }
  }

}