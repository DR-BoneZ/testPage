<?php
    App::uses('AppController', 'Controller');

    class PostsControllerTest extends ControllerTestCase {
        public function setUp() {
            parent::setUp();
            $this->Post = ClassRegistry::init('Post');
        }
        public function testIndex() {
            $result = $this->testAction('/posts', array('method' => 'GET', 'return' => 'view'));
            $this->assertRegExp('/<html/', $this->contents);
        }
        public function testAdd() {
            $result = $this->testAction('/posts/add', array('method' => 'GET', 'return' => 'view'));
            $this->assertRegExp('/<html/', $this->contents);
            $this->assertRegExp('/<form/', $result);
            $this->testAction('/posts/add', array(
                'data' => array('Post' => array('title' => 'New Post', 'body' => 'This is a new post!'))
            ));
            $this->assertEquals($this->headers['Location'], 'http://aiden.dev/cake/posts');
            $this->testAction('/posts/index', array('method' => 'GET'));
            debug($this->vars);
            $this->assertEquals(end((array_values($this->vars['posts'])))['Post']['title'], 'New Post');
        }
        public function testViewNew() {
            $this->testAction('/posts/index', array('method' => 'GET'));
            $lastID = end((array_values($this->vars['posts'])))['Post']['id'];
            $result = $this->testAction('/posts/view/'.$lastID, array('method' => 'GET', 'return' => 'view'));
            $this->assertRegExp('/<html/', $this->contents);
            echo $result;
        }
        public function testEdit() {
            $this->testAction('/posts/index', array('method' => 'GET'));
            $lastID = end((array_values($this->vars['posts'])))['Post']['id'];
            $result = $this->testAction('/posts/edit/'.$lastID, array('method' => 'GET', 'return' => 'view'));
            $this->assertRegExp('/<html/', $this->contents);
            $this->assertRegExp('/<form/', $result);
            $this->testAction('/posts/edit/'.$lastID, array(
                'data' => array('Post' => array('title' => 'Changed Post', 'body' => 'This post has been altered!'))
            ));
            $this->assertEquals($this->headers['Location'], 'http://aiden.dev/cake/posts');
            $this->testAction('/posts/index', array('method' => 'GET'));
            debug($this->vars);
            $this->assertEquals(end((array_values($this->vars['posts'])))['Post']['title'], 'Changed Post');
        }
        public function testViewEdited() {
            $this->testAction('/posts/index', array('method' => 'GET'));
            $lastID = end((array_values($this->vars['posts'])))['Post']['id'];
            $result = $this->testAction('/posts/view/'.$lastID, array('method' => 'GET', 'return' => 'view'));
            $this->assertRegExp('/<html/', $this->contents);
            echo $result;
        }
        public function testDelete() {
            $this->testAction('/posts/index', array('method' => 'GET'));
            $lastID = end((array_values($this->vars['posts'])))['Post']['id'];
            $this->testAction('/posts/delete/'.$lastID, array('method' => 'DELETE'));
            $this->assertEquals($this->headers['Location'], 'http://aiden.dev/cake/posts');
            $this->testAction('/posts/index', array('method' => 'GET'));
            debug($this->vars);
            $this->assertNotEqual(end((array_values($this->vars['posts'])))['Post']['id'], $lastID);
        }
    }
?>
