<?php
class IdGamesApi {
  private $curl = null;
  private $endpoint = 'http://www.doomworld.com/idgames/api/api.php';

  public function ping($format = 'json') {
    $this->curl = curl_init();
    $url = "$this->endpoint?action=ping&out=$format";
    
    curl_setopt_array($this->curl, array(
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => $url
    ));

    try {
      return curl_exec($this->curl);
    } catch (Exception $e) {
      echo "Error: {$e->getMessage()}\n";
      return FALSE;
    } finally {
      curl_close($this->curl);
    }
  }
}