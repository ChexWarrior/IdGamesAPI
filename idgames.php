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

  private function getCurlError($curl) {
    $error_num = curl_errno($curl);
    $error_msg = curl_error($curl);
    
    return "Curl Error Number: $error_num\nCurl Error: $error_msg";
  }

  public function pingServer($format = 'json') {
    $this->curl = curl_init();
    $url = $this->createUrl('ping', array(
      'out' => $format,
    ));
    
    curl_setopt_array($this->curl, array(
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => $url
    ));

    try {
      $success = curl_exec($this->curl);
      if($success) {
        return $success;
      } else {
        echo $this->getCurlError($this->curl);
        return FALSE;
      }
    } catch (Exception $e) {
      echo "Exception: {$e->getMessage()}\n";
      return FALSE;
    } finally {
      curl_close($this->curl);
    }
  }

  public function pingDBServer($format = 'json') {
    $this->curl = curl_init();
    $url = $this->createUrl('dbping', array(
      'out' => $format,
    ));

    curl_setopt_array($this->curl, array(
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => $url
    ));

    try {
      $success = curl_exec($this->curl);
      if($success) {
        return $success;
      } else {
        echo $this->getCurlError($this->curl);
        return FALSE;
      }
    } catch (Exception $e) {
      echo "Exception: {$e->getMessage()}\n";
      return FALSE;
    } finally {
      curl_close($this->curl);
    }
  }

  public function getApiInfo($format = 'json') {
    $this->curl = curl_init();
    $url = $this->createUrl('about', array(
      'out' => $format,
    ));

    curl_setopt_array($this->curl, array(
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => $url
    ));

    try {
      $success = curl_exec($this->curl);
      if($success) {
        return $success;
      } else {
        echo $this->getCurlError($this->curl);
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