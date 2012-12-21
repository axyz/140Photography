
<?php include("header.php"); ?> 
<?php include("php/meta.php"); meta("Photography"); ?>  
<?php include("nav.php"); ?>
<?php include("php/contact.php"); ?><br/>
<div class="row">
  <div class="nine columns">
    <form method="post" action="/140Photography/contact.php">
      <ul class="tabs-content contained">
        <li id="contactFormTab" class="active">
          <div class="row collapse">
            <h3>Get in Touch!</h3>
            <p>We'd love to hear from you. You can either reach out to us as a whole and one of our awesome team members will get back to you. We love getting email all day <em>all day</em>.</p>
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
    <h5>Social</h5>
  </div>
</div><?php include("footer.php"); ?>
<?php include("tail.php"); ?>