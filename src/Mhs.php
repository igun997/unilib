<?php
namespace Unilib;
require './vendor/autoload.php';
require './vendor/simple-html-dom/simple-html-dom/simple_html_dom.php';
/**
* UNIKOM Library Pack
* @link https://www.github.com/igun997/unikomlib
* @author Indra Gunanda
* @version 0.0.1
* @copyright  (c) 2019 - 2020 Indra Gunanda
* @license    http://www.gnu.org/licenses/lgpl-3.0.txt GNU LESSER GENERAL PUBLIC LICENSE
**/
class Mhs
{
  public $option;
  public $data;
  public $curl;
  public $jar;
  public $dom;
  public $login = false;
  public $base_url = "https://mahasiswa.unikom.ac.id/";
  function __construct($data,$option=[])
  {
    $this->data = $data;
    $this->option = $option;
    $this->curl = new GuzzleHttp\Client(['cookies' => true]);
    $this->dom = new simple_html_dom();
    $this->login();
  }
  private function login()
  {
    // echo "Login...".PHP_EOL;
    $req = $this->curl->request('POST',$this->base_url."login",['form_params'=>$this->data]);
    // var_dump($req->body());
    // echo $req->getBody();
    $body = $req->getBody();
    $obj = $this->dom->load($body);
    $login = $obj->find("p");
    if (isset($login[0]->innertext)) {
      if ($login[0]->innertext == "Akses ditolak, Login gunakan akun perwalian anda") {
        return ["status"=>false,"msg"=>$login[0]->innertext];
      }else {
        return ["status"=>false,"msg"=>"Unknown Error Code : 40"];
      }
    }else {
      $this->login = true;
    }
  }
  public function get($prefix,$find)
  {
    if ($this->login) {
      $req = $this->curl->request('GET',$this->base_url.$prefix);
      $obj = $this->dom->load($req->getBody());
      $res = $obj->find($find);
      return $res;
    }else {
        return ["status"=>false,"msg"=>"Login Method not Running . . ."];
      // echo "Login Gagal".PHP_EOL;
    }
  }
}

?>
