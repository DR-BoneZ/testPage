<?php
    App::uses('Post', 'Model/Post');
    class PostTest extends CakeTestCase {
        public function setUp() {
            parent::setUp();
            $this->Post = ClassRegistry::init('Post');
        }
        public function testPost() {
            
        }
    }
?>
