
<?php include("header.php"); ?> 
<?php include("php/meta.php"); meta("Contact Us - 140Photography", "Twitter directory about photography and imaging related matters"); ?>  
<?php include("nav.php"); ?>
<?php include("php/contact.php"); ?><br/>
<div class="row">
  <div class="nine columns">
    <form method="post" action="http://140Photography.com/contact.php">
      <ul class="tabs-content contained">
        <li id="contactFormTab" class="active">
          <div class="row collapse">
            <h2>Get in Touch!</h2>
            <p>We'd love to hear from you. You can reach out to us with a message and one of our awesome team members will get back to you.</p>
            <div class="two columns">
              <label class="inline">Your Name</label>
            </div>
            <div class="ten columns">
              <input type="text" name="yourName" class="yourName"/>
            </div>
          </div>
          <div class="row collapse">
            <div class="two columns">
              <label class="inline">Your Email</label>
            </div>
            <div class="ten columns">
              <input type="text" name="yourEmail" class="yourEmail"/>
            </div>
          </div>
          <label>What's up?</label>
          <textarea rows="4" name="message" class="message"></textarea>
          <input type="submit" name="submit" class="button radius button"/><?php if(isset($hasError)) { //If errors are found ?><br/><br/>
          <div class="alert-box alert">there was an error! check all the fields.<a class="close">&times;</a></div><?php } ?>
          <?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?><br/><br/>
          <div class="alert-box success">message sent!<a class="close">&times;</a></div><?php } ?>
        </li>
      </ul>
    </form>
  </div>
  <div class="three columns">
    <h5>Social</h5><a href="http://twitter.com/140photography" target="_blank"> <i class="icon-twitter-sign social-icon"></i></a>&nbsp;<a href="http://www.facebook.com/140ph" target="_blank"> <i class="icon-facebook-sign social-icon"></i></a>&nbsp;&nbsp;<a href="http://plus.google.com/u/0/b/115506636060602895618/115506636060602895618/posts" target="_blank"><i class="icon-google-plus-sign social-icon"></i></a>
  </div>
</div><?php include("footer.php"); ?>
<?php include("tail.php"); ?>