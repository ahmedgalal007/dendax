<?php 
$Page_Title = "Send Message";
include_once('../Layout/header.php');
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Send Message</h3>
  </div>
  <div class="panel-body">
  <form id="msgForm" class="form-horizontal">

  <div class="form-group">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
      <input type="text" class="form-control" id="name" placeholder="Name" name="name" required minlength="5">
    </div>
  </div>

  <div class="form-group">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
      <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
    </div>
  </div>

  <div class="form-group">
    <label for="phone" class="col-md-2 control-label phone-group">Phone (Optional)</label>
    <div class="col-md-10">
      <input type="text" class="form-control" id="phone" placeholder="phone" name="phone" phoneNumber>
    </div>
  </div>

  <div class="form-group">
    <label for="message" class="col-md-2 control-label">Message</label>
    <div class="col-md-10">
      <textarea class="form-control" id="message" placeholder="Message" name="message" rows="3" required minlength="20" maxlength="50"></textarea>  
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-md-offset-2 col-md-10">
      <button   class="btn btn-danger" onclick="sendMessage();">Send</button>
    </div>
  </div>
  <span id="helpBlock" class="help-block"></span>
</form>

  </div>
</div>


<?php 
include_once('../Layout/footer.php');
?>


<script src="/js/jquery.validate-1.14.0.min.js"></script>
<script src="/js/jquery.validate.additional-methods.min.js"></script>

<script type="text/javascript" src="/user/userController.js"></script>



</body>

</html>