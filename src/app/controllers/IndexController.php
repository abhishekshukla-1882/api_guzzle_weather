<?php
// session_start();
require '../vendor/autoload.php';
use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;
use GuzzleHttp\Client;


class IndexController extends Controller
{
    public function indexAction()
    {
        $request = new Request();
        if(isset($_POST['submit'])){
            $location = $this->request->getPost('val');
        
            $location = urlencode($location);
            $client = new Client([
                'base_uri' => "http://api.weatherapi.com/v1/current.json?key=0bab7dd1bacc418689b143833220304&q=$location&aqi=no",

            ]);
            // $url="v1/search.json?key=0bab7dd1bacc418689b143833220304&q=$location";

            $response = $client->request('GET');
            $body = $response->getBody();
            $body = json_decode($body,1);
            $clients = new Client([
                'base_uri' => "http://api.weatherapi.com/v1/search.json?key=0bab7dd1bacc418689b143833220304&q=$location",

            ]);
            $respon = $clients->request('GET');
            $bod2 = $respon->getBody();
            $bod2 = json_decode($bod2,1);
            // $book = $body['docs'];
            // echo "<pre>";
            // // echo $body;
            // print_r($bod2);
            // die;
            $this->view->book = $body;
            $this->view->area = $bod2;
    }
        

    }
    public function detailAction(){

        $client = new Client();
        $location = $this->request->getPost('area');
        // echo $location;
        // die;
    
        $location = urlencode($location);
        $client = new Client([
            'base_uri' => "http://api.weatherapi.com/v1/current.json?key=0bab7dd1bacc418689b143833220304&q=$location&aqi=no",

        ]);
        // $url="v1/search.json?key=0bab7dd1bacc418689b143833220304&q=$location";

        $response = $client->request('GET');
        $body = $response->getBody();
        $body = json_decode($body,1);
        $this->view->weather = $body;

        
    }
    public function weatherAction(){
        $client = new Client();

        $forcast = $this->request->getPost('forecast');
        // echo $location;
        // die;
        if($forcast){
            $url = "http://api.weatherapi.com/v1/forecast.json?key= 0bab7dd1bacc418689b143833220304&q=$forcast&days=3&aqi=no&alerts=no";
        }
        $client = new Client([
            'base_uri' => "$url",
        ]);
        $response = $client->request('GET');
        $body = $response->getBody();
        $body = json_decode($body,1);
        // echo "<pre>";
        // print_r($body['forecast']);
        // die;
        $this->view->weather = $body;
    }
    public function historyAction(){
        $client = new Client();

        $history = $this->request->getPost('forecast');
        // echo $history;
        // die;
        if($history){
            $url = "http://api.weatherapi.com/v1/history.json?key=0bab7dd1bacc418689b143833220304&q=$history&dt=2010-02-01";
        }
        $client = new Client([
            'base_uri' => "$url",
        ]);
        $response = $client->request('GET');
        $body = $response->getBody();
        $body = json_decode($body,1);
        echo "<pre>";
        print_r($body['forecast']);
        die;
        $this->view->weather = $body;

    }
    public function astronomyAction(){
        $client = new Client();

        $Astronomy = $this->request->getPost('Astronomy');
        // echo $history;
        // die;
        if($Astronomy){
            $url = "http://api.weatherapi.com/v1/astronomy.json?key=0bab7dd1bacc418689b143833220304&q=$Astronomy&dt=2022-04-08";
        }
        $client = new Client([
            'base_uri' => "$url",
        ]);
        $response = $client->request('GET');
        $body = $response->getBody();
        $body = json_decode($body,1);
        // echo "<pre>";
        // print_r($body);
        // die;
        $this->view->Astronomy = $body;

    }
    public function timezoneAction(){
        $client = new Client();

        $time = $this->request->getPost('time');
        // echo $time;
        // die;
        if($time){
            $url = "http://api.weatherapi.com/v1/timezone.json?key=0bab7dd1bacc418689b143833220304&q=$time";
        }
        $client = new Client([
            'base_uri' => "$url",
        ]);
        $response = $client->request('GET');
        $body = $response->getBody();
        $body = json_decode($body,1);
        // echo "<pre>";
        // print_r($body);
        // die;
        $this->view->time = $body;


    }

    public function sportAction(){
        $client = new Client();

        $sport = $this->request->getPost('sport');
        // echo $sport;
        // die;
        if($sport){
            $url = "http://api.weatherapi.com/v1/sports.json?key=0bab7dd1bacc418689b143833220304&q=$sport";
        }
        $client = new Client([
            'base_uri' => "$url",
        ]);
        $response = $client->request('GET');
        $body = $response->getBody();
        $body = json_decode($body,1);
        // echo "<pre>";
        // print_r($body['golf'][0]['country']);
        // die;
        $this->view->sport = $body;


    }
    public function airAction(){
        $client = new Client();

        $city = $this->request->getPost('city');
        // echo $city;
        // die;
        if($city){
            $url = "http://api.weatherapi.com/v1/current.json?key= 0bab7dd1bacc418689b143833220304&q=$city&aqi=no";
        }
        $client = new Client([
            'base_uri' => "$url",
        ]);
        $response = $client->request('GET');
        $body = $response->getBody();
        $body = json_decode($body,1);
        // echo "<pre>";
        // print_r($body);
        // die;
        $this->view->air = $body;


    }
    public function alertAction(){
        $client = new Client();

        $forcast = $this->request->getPost('alert');
        // echo $forcast;
        // die;
        if($forcast){
            $url = "http://api.weatherapi.com/v1/forecast.json?key= 0bab7dd1bacc418689b143833220304&q=$forcast&days=2&aqi=no&alerts=yes";
        }
        $client = new Client([
            'base_uri' => "$url",
        ]);
        $response = $client->request('GET');
        $body = $response->getBody();
        $body = json_decode($body,1);
        // echo "<pre>";
        // print_r($body['alerts']['alert']);
        // echo count($body['alerts']['alert']);
        // die;
        $this->view->air = $body;
    }


    
}