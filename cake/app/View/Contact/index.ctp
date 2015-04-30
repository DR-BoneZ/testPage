<div class="container target">
    <div class="row padded-10">
        <div class="col-sm-10">
            <h1>Contact Me</h1>
        </div>
        <div class="col-sm-2">
            <img class="pull-right img-circle profile-img" src="/img/profile.jpg" />
        </div>
    </div>
    <div class="row padded-10">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading">Contact</div>
                <div class="panel-body">
                    <form action="/cake/contact/send" method="POST">
                        <div class="form-group input text required">
                            <label for="emailAddress">Email Address</label>
                            <input type="email" class="form-control" id="emailAddress" name="data[Contact][emailAddress]" placeholder="Enter email" required />
                        </div>
                        <div class="input text required form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" name="data[Contact][subject]" placeholder="Enter subject" required />
                        </div>
                        <div class="input textarea required form-group">
                            <label for="message">Message</label>
                            <textarea rows="10" cols="45" class="form-control" id="message" name="data[Contact][message]" placeholder="Enter message" required></textarea>
                        </div>
                        <div class="submit">
                            <input type="submit" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
