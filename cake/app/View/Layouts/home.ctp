<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Aiden McClelland');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $this->fetch('title'); ?>
    </title>
    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css(array('cake.generic', 'bootstrap.min', 'bootstrap.theme', 'aiden.dev.cake'));
        echo $this->Html->script(array('jquery-2.1.3.min', 'bootstrap.min'));
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body class="padded-50-73">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/cake">Aiden McClelland</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="no-margin<?php echo $this->fetch('title') == "About" ? " active" : ""; ?>"><a href="/cake/about">About Me</a></li>
                    <li class="no-margin<?php echo $this->fetch('title') == "Courses" ? " active" : ""; ?>"><a href="/cake/courses">My Courses</a></li>
                    <li class="no-margin<?php echo $this->fetch('title') == "Contact" ? " active" : ""; ?>"><a href="/cake/contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="content" class="full-size no-margin no-padding">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </div>
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid">
            <ol class="breadcrumb" style="text-align: center; margin: 0px;">
                <li class="no-margin<?php echo $this->fetch('title') == "Home" ? " active" : ""; ?>"><a href="/cake">Home</a></li>
                <li class="no-margin<?php echo $this->fetch('title') == "About" ? " active" : ""; ?>"><a href="/cake/about">About Me</a></li>
                <li class="no-margin<?php echo $this->fetch('title') == "Courses" ? " active" : ""; ?>"><a href="/cake/courses">My Courses</a></li>
                <li class="no-margin<?php echo $this->fetch('title') == "Contact" ? " active" : ""; ?>"><a href="/cake/contact">Contact</a></li>
            </ol>
            <ol class="breadcrumb centered no-margin">
                <li class="active">Copyright &copy 2015, Aiden McClelland</li>
            </ol>
        </div>
    </nav>
</body>
</html>
