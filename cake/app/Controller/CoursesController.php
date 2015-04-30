<?php
function quarterHash($quarter)
    {
        $yearQuarter = explode('Q', $quarter);
        if ($yearQuarter[0][1] == 'r')
        {
            return intval($yearQuarter[1]) - 1;
        }
        elseif ($yearQuarter[0][1] == 'o')
        {
            return 3 + intval($yearQuarter[1]);
        }
        elseif ($yearQuarter[0][1] == 'u')
        {
            return 7 + intval($yearQuarter[1]);
        }
        elseif ($yearQuarter[0][1] == 'e')
        {
            return 11 + intval($yearQuarter[1]);
        }
        else
        {
           throw new NotFoundException(__('Invalid course'));
        }
    }
    class CoursesController extends AppController 
    {
        public $helpers = array('Html', 'Form');
        public function index() 
        {
            $this->layout = 'home';
            $this->set('courses', $this->Course->find('all', array('order'=>'quarterID ASC, courseID ASC')));
        }
        public function add() 
        {
            $this->layout = 'home';
            if ($this->request->is('post')) 
            {
                $this->Course->create();
                $this->request->data['Course']['quarterID'] = quarterHash($this->request->data['Course']['quarter']);
                if ($this->Course->save($this->request->data)) 
                {
                    $this->Session->setFlash(__('Your course has been saved.'));
                    return $this->redirect(array('action'=>'index'));
                }
                $this->Session->setFlash(__('Unable to add your course.'));
            }
        }
	public function edit($cid = null, $qtr = null)
        {
            $this->layout = 'home';
            $course = $this->Course->find('first', array('conditions'=>array('Course.courseID'=>$cid, 'Course.quarter'=>$qtr)));
            if (!$course)
            {
                throw new NotFoundException(__('Invalid course'));
            }
            if ($this->request->is(array('post', 'put')))
            {
                $this->request->data['Course']['quarterID'] = quarterHash($this->request->data['Course']['quarter']);
                $courseData = $this->request->data['Course'];
                if ($this->Course->updateAll(array('Course.courseID'=>"'".$courseData['courseID']."'",'Course.quarter'=>"'".$courseData['quarter']."'",'Course.courseTitle'=>"'".$courseData['courseTitle']."'", 'Course.times'=>"'".$courseData['times']."'", 'Course.credits'=>"'".$courseData['credits']."'", 'Course.quarterID'=>"'".$courseData['quarterID']."'"), array('Course.courseID'=>$cid,'Course.quarter'=>$qtr)))
                {
                    $this->Session->setFlash(__('Your course has been updated.'));
                    return $this->redirect(array('action'=>'index'));
                }
                $this->Session->setFlash(__('Unable to update your course.'));
            }
            if (!$this->request->data)
            {
                $this->request->data = $course;
            }
        }
        public function delete($cid = null, $qtr = null)
        {
            $this->layout = 'home';
            $this->Course->query("DELETE FROM courses WHERE courseID = '$cid' AND quarter = '$qtr';");
            $this->Session->setFlash(__('The course has been deleted.'));
            return $this->redirect(array('action'=>'index'));
        }
    }
?>
