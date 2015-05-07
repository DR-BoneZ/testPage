<?php
    App::import('Vendor', 'TwitterAPIExchange');

    class AboutController extends AppController 
    {
        public $helpers = array('Html', 'Form');
        public function index($id = "gluon") 
        {
            $this->layout = 'home';
            $settings = array(
                'oauth_access_token' => '3236777933-ClqibG1LcapkW3CRGe4P238e26Yd50Uniz0WHGS',
                'oauth_access_token_secret' => 'oN3NFNg7LssczYhSZzYUU0Mar6zhBcyyukqmsOa3vVpAd',
                'consumer_key' => 'bO9yCI2V8hDcPAqAkYi9LpoSq',
                'consumer_secret' => 'IjbEH0bRjayMTQgBrdiv8oFgNYOjG0VmgtOWdwwLEPGeiuDKJ0'
            );
            $url = 'https://api.twitter.com/1.1/search/tweets.json';
            $getfield = '?q=#'.$id;
            $requestMethod = 'GET';
            $twitter = new TwitterAPIExchange($settings);
            $response = $twitter->setGetfield($getfield)
                ->buildOauth($url, $requestMethod)
                ->performRequest();
            $this->set('tweets', json_decode($response, true));
        }
        public function tweetsjson()
        {
            $settings = array(
                'oauth_access_token' => '3236777933-ClqibG1LcapkW3CRGe4P238e26Yd50Uniz0WHGS',
                'oauth_access_token_secret' => 'oN3NFNg7LssczYhSZzYUU0Mar6zhBcyyukqmsOa3vVpAd',
                'consumer_key' => 'bO9yCI2V8hDcPAqAkYi9LpoSq',
                'consumer_secret' => 'IjbEH0bRjayMTQgBrdiv8oFgNYOjG0VmgtOWdwwLEPGeiuDKJ0'
            );
            $url = 'https://api.twitter.com/1.1/search/tweets.json';
            $getfield = '?q=#gluon';
            $requestMethod = 'GET';
            $twitter = new TwitterAPIExchange($settings);
            $response = $twitter->setGetfield($getfield)
                ->buildOauth($url, $requestMethod)
                ->performRequest();
            $this->set('tweets', json_encode(json_decode($response), JSON_PRETTY_PRINT));
        }
    }
?>
