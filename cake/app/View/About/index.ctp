<div class="container target">
    <div class="row padded-10">
        <div class="col-sm-10">
            <h1>About Me</h1>
        </div>
        <div class="col-sm-2">
            <img class="pull-right img-circle profile-img" src="/img/profile.jpg" />
        </div>
    </div>
    <div class="row padded-10">
        <div class="col-sm-3 no-margin no-padding">
            <ul class="list-group no-margin no-padding">
                <li class="list-group-item text-muted">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Name</strong></span> Aiden McClelland</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Major</strong></span> Computer Science</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Year</strong></span> Freshman - Q3</li>
            </ul>
            <div class="panel panel-default no-padding margin-12x">
                <div class="panel-heading">
                    Tweets
                </div>
                <div class="panel-body no-padding scroll-425">
                    <?php foreach ($tweets['statuses'] as $tweet): ?>
                        <div class="panel panel-default margin-12x">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a href="https://twitter.com/<?php echo $tweet['user']['screen_name']; ?>"><img class="twitter-avatar" src="<?php echo $tweet['user']['profile_image_url']; ?>" /></a>
                                    </div>
                                    <div class="col-sm-10">
                                        <a href="https://twitter.com/<?php echo $tweet['user']['screen_name']; ?>"><?php echo $tweet['user']['name']; ?></a><br />
                                        <a href="https://twitter.com/<?php echo $tweet['user']['screen_name']; ?>" class="text-muted">@<?php echo $tweet['user']['screen_name']; ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <?php echo $tweet['text']; ?><br />
                                <?php if (array_key_exists('media', $tweet['entities']) && count($tweet['entities']['media']) > 0) { foreach ($tweet['entities']['media'] as $media): ?>
                                    <a href="<?php echo $media['url']; ?>"><img class="fit-width" src="<?php echo $media['media_url']; ?>" /></a>
                                <?php endforeach; } ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-heading">Bio</div>
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            </div>
            <div class="panel panel-default target">
                <div class="panel-heading">Projects</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img class="thumb-300-200" alt="300x200" src="http://www.turrem.net/uploads/3/0/4/0/30400341/1412085113.png" />
                                <div class="caption">
                                    <h3>Turrem</h3>
                                    <p>Voxel-based Real Time Strategy Game</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img class="thumb-300-200" alt="300x200" src="/cake/img/placeholder.jpg" />
                                <div class="caption">
                                    <h3>SaveMe</h3>
                                    <p>Mobile application to end street harassment</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img class="thumb-300-200" alt="300x200" src="/cake/img/placeholder.jpg" />
                                <div class="caption">
                                    <h3>GAMr</h3>
                                    <p>Mobile application to help find party members for your MMO</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
