<?php
    App::import('Vendor', 'TwitterAPIExchange');
    App::import('Vendor', 'Facebook', array('file'=>'facebook-php-sdk/autoload.php'));

    use Facebook\FacebookSession;
    use Facebook\FacebookRequest;
    use Facebook\FacebookRedirectLoginHelper;

    //define("GLUON_ID", "799074206830951");

    function make_entities(&$tweets) {
        if (array_key_exists('statuses', $tweets)) {
            foreach ($tweets['statuses'] as &$tweet) {
                if (array_key_exists('entities', $tweet)) {
                    if (array_key_exists('hashtags', $tweet['entities'])) {
                        foreach ($tweet['entities']['hashtags'] as &$hashtag) {
                            $tweet['text'] = str_replace('#'.substr($hashtag['text'], 0, $hashtag['indices'][1] - $hashtag['indices'][0]),
                                                         '<a href="https://twitter.com/hashtag/'.$hashtag['text'].'?src=hash">#'.$hashtag['text'].'</a>', $tweet['text']);
                        }    
                    }
                    if (array_key_exists('user_mentions', $tweet['entities'])) {
                        foreach ($tweet['entities']['user_mentions'] as &$user_mention) {
                            $tweet['text'] = str_replace('@'.substr($user_mention['screen_name'], 0, $user_mention['indices'][1] - $user_mention['indices'][0]),
                                                         '<a href="https://twitter.com/'.$user_mention['screen_name'].'">@'.$user_mention['screen_name'].'</a>', $tweet['text']);
                        }
                    }
                    if (array_key_exists('urls', $tweet['entities'])) {
                        foreach ($tweet['entities']['urls'] as &$url) {
                            $tweet['text'] = str_replace(substr($url['url'], 0, $url['indices'][1] - $url['indices'][0]),
                                                         '<a href="'.$url['url'].'">'.$url['url'].'</a>', $tweet['text']);
                        }
                    }
                    if (array_key_exists('media', $tweet['entities'])) {
                        foreach ($tweet['entities']['media'] as &$url) {
                           // $tweet['text'] = preg_replace('/'.preg_quote(substr($url['url'], 0, $url['indices'][1] - $url['indices'][0] - 1), '/').'./',
                           //                              '<a href="'.$url['url'].'">'.$url['url'].'</a>', $tweet['text']);
                        }
                    }
                }
            }
        }
    }

   function withgluon($data) {
        $ret = array();
        foreach ($data["data"] as $post) {
            $isUsed = false;
            if (array_key_exists("to", $post)) {
                foreach ($post['to']['data'] as $tags) {
                    if ($tags["id"] == "799074206830951") {
                        $isUsed = true;
                    }
                }
            }
            if ($isUsed) {
                $ret[] = $post;
            }
        }
        return $ret;
    }

    class AboutController extends AppController 
    {
        var $uses = array('Token');
        public $helpers = array('Html', 'Form');
        public static $tokens = array();
        public function index($id = "ucsc") 
        {
            $this->layout = 'home';
            $settings = array(
                'oauth_access_token' => '3236777933-ClqibG1LcapkW3CRGe4P238e26Yd50Uniz0WHGS',
                'oauth_access_token_secret' => 'oN3NFNg7LssczYhSZzYUU0Mar6zhBcyyukqmsOa3vVpAd',
                'consumer_key' => 'bO9yCI2V8hDcPAqAkYi9LpoSq',
                'consumer_secret' => 'IjbEH0bRjayMTQgBrdiv8oFgNYOjG0VmgtOWdwwLEPGeiuDKJ0'
            );
            $url = 'https://api.twitter.com/1.1/search/tweets.json';
            $getfield = '?q=#'.$id.'&count=30';
            $requestMethod = 'GET';
            $twitter = new TwitterAPIExchange($settings);
            $response = $twitter->setGetfield($getfield)
                ->buildOauth($url, $requestMethod)
                ->performRequest();
            $tweets = json_decode($response, true);
            make_entities($tweets);
            $this->set('tweets', $tweets);
        }
        public function fblogin($id = "100008413444577", $edge = "")
        {
            session_start();
            FacebookSession::setDefaultApplication('1589731807958485', '75cb5b8cd78a61475c13d5039bef50d6');
            $helper = new FacebookRedirectLoginHelper('http://aiden.dev/cake/about/fbjson/'.$id.'/'.$edge);
            $loginUrl = $helper->getLoginUrl(array('user_posts', 'user_photos', 'read_stream', 'manage_pages'));
            $this->redirect($loginUrl);
        }
        public function fbjson($id = "799074206830951", $edge = "")
        {
            session_start();
            FacebookSession::setDefaultApplication('1589731807958485', '75cb5b8cd78a61475c13d5039bef50d6');
            $helper = new FacebookRedirectLoginHelper('http://aiden.dev/cake/about/fbjson/'.$id.'/'.$edge);
            $session = $helper->getSessionFromRedirect();
            $request = new FacebookRequest($session,'GET',"/$id/$edge");
            $response = $request->execute();
            $graphObject = $response->getGraphObject();
            $this->set('fb', json_encode($graphObject->asArray(), JSON_PRETTY_PRINT));
        }
        public function taggedPosts($authed = FALSE)
        {
            if (!$authed) {
                session_start();
                FacebookSession::setDefaultApplication('1589731807958485', '75cb5b8cd78a61475c13d5039bef50d6');
                $helper = new FacebookRedirectLoginHelper('http://aiden.dev/cake/about/taggedPosts/true');
                $loginUrl = $helper->getLoginUrl(array('user_posts', 'user_photos', 'read_stream'));
                $this->redirect($loginUrl);
            } else {
                session_start();
                FacebookSession::setDefaultApplication('1589731807958485', '75cb5b8cd78a61475c13d5039bef50d6');
                $helper = new FacebookRedirectLoginHelper('http://aiden.dev/cake/about/taggedPosts/true');
                $session = $helper->getSessionFromRedirect();
            //    $request = new FacebookRequest($session,'GET',"/me/accounts");
            //    $response = $request->execute();
            //    $graphObject = $response->getGraphObject();
            //    $resp = json_decode(json_encode($graphObject->asArray()),true);
            //    $tok = $resp['data'][0]['access_token'];
            //    $session = new FacebookSession($tok);
                $request = new FacebookRequest($session,'GET',"/799074206830951/tagged");
                $response = $request->execute();
                $graphObject = $response->getGraphObject();
                $resp = json_decode(json_encode($graphObject->asArray()),true);
                //$gluonPosts = withgluon($resp);
                $this->set('fb', json_encode($resp, JSON_PRETTY_PRINT));
            }
        }
        public function getTokens($count = 1, $start = 0, $authed = FALSE)
        {
            
            if ($start < $count) {
                if (!$authed) {
                    session_start();
                    FacebookSession::setDefaultApplication('1589731807958485', '75cb5b8cd78a61475c13d5039bef50d6');
                    $helper = new FacebookRedirectLoginHelper('http://aiden.dev/cake/about/getTokens/'.$count.'/'.$start.'/true');
                    $loginUrl = $helper->getLoginUrl(array('user_posts', 'user_photos', 'read_stream'));
                    $this->redirect($loginUrl);
                } else {
                    session_start();
                    FacebookSession::setDefaultApplication('1589731807958485', '75cb5b8cd78a61475c13d5039bef50d6');
                    $helper = new FacebookRedirectLoginHelper('http://aiden.dev/cake/about/getTokens/'.$count.'/'.$start.'/true');
                    $session = $helper->getSessionFromRedirect();
                    if ($start == 0) $this->Token->deleteAll(array('Token.name' => $session->getSessionInfo()->asArray()['user_id']));
                    $session = $session->getLongLivedSession('1589731807958485', '75cb5b8cd78a61475c13d5039bef50d6');
                    $tok = $session->getToken();
                    $this->Token->create();
                    $this->Token->save(array('name' => $session->getSessionInfo()->asArray()['user_id'], 'token' => $tok));
                    $this->redirect('http://aiden.dev/cake/about/getTokens/'.$count.'/'.($start + 1));
                }
            } else {
                $fb = "";
                foreach ($this->Token->find('all') as $token) {
                    $fb .= $token['Token']['token']."<br />\n";
                }
                $this->set('fb', $fb);
            }
        }
    }
?>
