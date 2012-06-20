<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Username';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>			

  
	<legend>Login</legend>
	<?php echo form_open($this->uri->uri_string()); ?>
	<fieldset>
    <label class="control-label" for="login"><?php echo $login_label; ?>:</label>
    <input type="text" name="login" value="" id="login" maxlength="80" class="input-xlarge">
  
  	<label class="control-label" for="password">Password:</label>
    <input type="password" name="password" value="" id="password" class="input-xlarge">
	
		<?php if ($show_captcha) {
			if ($use_recaptcha) { ?>
		<table>
		<tr>
			<td colspan="2">
				<div id="recaptcha_image"></div>
			</td>
			<td>
				<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
				<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
				<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="recaptcha_only_if_image">Enter the words above</div>
				<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
			</td>
			<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
			<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
			<?php echo $recaptcha_html; ?>
		</tr>
		<?php } else { ?>
		<tr>
			<td colspan="3">
				<p>Enter the code exactly as it appears:</p>
				<?php echo $captcha_html; ?>
			</td>
		</tr>
		<tr>
			<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
			<td><?php echo form_input($captcha); ?></td>
			<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
		</tr>
		<?php }
		} ?>	
	</table>
	
	<div>
		<label class="checkbox">
	        <input type="checkbox" name="remember" value="1" id="remember" style="margin:0;padding:0">
	        Remember me
	    </label>
    </div>
    
    <div>
		<button type="submit" class="btn">Submit</button>
	</div>
	
    <?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?> | 
	<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>

	</fieldset>
	<?php echo form_close(); ?>
	
	<?php 
		$facebook = config_item('facebook_app_id');
		$twitter = config_item('tweet_consumer_key');
		$google = config_item('google_app_id');
		$yahoo = config_item('yahoo_openid');
	?>
	<div class="row">
		<? if (!empty($facebook)) { ?>
		<div class="span3">
			<fb:login-button v="2" perms="" length="long" onlogin='window.location="https://graph.facebook.com/oauth/authorize?client_id=<?php echo $this->config->item('facebook_app_id'); ?>&redirect_uri=<?php echo site_url('auth_other/fb_signin'); ?>&amp;r="+window.location.href;'></fb:login-button>
		</div>
		<? }
			if (!empty($twitter)) { ?>
		<div class="span3">
			<a class="twitter" href="<?php echo site_url('auth_other/twitter_signin'); ?>">
				<img style="margin-top:5px;" src="<?php echo base_url(); ?>img/twitter_login_button.gif" alt="twitter login" border="0"/>
			</a>
		</div>
		<? }
			if (!empty($google)) { ?>
		<div class="span3">
			<div id="gfc-button"></div>
		</div>
		<div class="span3">
			<a href="<?php echo site_url('auth_other/google_openid_signin'); ?>">
				<img style="margin-top:5px;" src="<?php echo base_url(); ?>img/google_connect_button.png" alt="google open id" border="0"/>
			</a>
		</div>
		<? }
			if (!empty($yahoo)) { ?>
		<div class="span3">
			<a href="<?php echo site_url('auth_other/yahoo_openid_signin'); ?>">
				<img style="margin-top:5px;" src="<?php echo base_url(); ?>img/yahoo_openid_connect.png" alt="yahoo open id" border="0"/>
			</a>
		</div>
		<? } ?>
	</div>
	
	<p id="viewer-info"></p>
		
	<div id="fb-root"></div>
	<script src="http://connect.facebook.net/en_US/all.js"></script>
	<script type="text/javascript">
	  	FB.init({appId: "<?php echo $this->config->item('facebook_app_id'); ?>", status: true, cookie: true, xfbml: true, oauth: true});
	  	FB.Event.subscribe('auth.sessionChange', function(response) {
	    	if (response.session) 
	    	{
	      		// A user has logged in, and a new cookie has been saved
				//window.location.reload(true);
	    	} 
	    	else 
	    	{
	      		// The user has logged out, and the cookie has been cleared
	    	}
	  	});
	  	
		function getUrlVars() {
		    var vars = {};
		    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
		        vars[key] = value;
		    });
		    return vars;
		}
	</script>
	
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<script type="text/javascript">google.load('friendconnect', '0.8');</script>
	<script type="text/javascript">
		google.friendconnect.container.setParentUrl('/' /* location of rpc_relay.html and canvas.html */);
		google.friendconnect.container.initOpenSocialApi({
		  site: '<?php echo $this->config->item('google_app_id'); ?>',
		  onload: function(securityToken) { initAllData(); }
		});
	
		// main initialization function for google friend connect
		function initAllData() 
		{
			var req = opensocial.newDataRequest();
		  	req.add(req.newFetchPersonRequest("OWNER"), "owner_data");
		  	req.add(req.newFetchPersonRequest("VIEWER"), "viewer_data");
		  	var idspec = new opensocial.IdSpec({
		      	'userId' : 'OWNER',
		      	'groupId' : 'FRIENDS'
		  	});
		  	req.add(req.newFetchPeopleRequest(idspec), 'site_friends');
		  	req.send(onData);
		};
		
		// main function for handling user data
		function onData(data) 
		{
		  	// getting the site data, we don't need this for now
		  	//if (!data.get("owner_data").hadError()) 
		  	//{
		    //	var owner_data = data.get("owner_data").getData();
		    //	document.getElementById("site-name").innerHTML = owner_data.getDisplayName();
		    	//alert('user is logging in');
		  	//}
		
		  	var viewer_info = document.getElementById("viewer-info");
		  	if (data.get("viewer_data").hadError()) 
		  	{
		    	google.friendconnect.renderSignInButton({ 'id': 'gfc-button', 'text':'Click here to join', 'style': 'long' });
		    	document.getElementById('gfc-button').style.display = 'block';
		    	viewer_info.innerHTML = '';
		    	//alert('there has been an error here');
		  	} 
		  	else 
		  	{
		    	document.getElementById('gfc-button').style.display = 'none';
		    	var viewer = data.get("viewer_data").getData();
		    	//viewer_info.innerHTML = "Hello, " + viewer.getDisplayName() + " " +
		        //						"<a href='#' onclick='google.friendconnect.requestSettings()'>Settings</a> | " +
				//				        "<a href='#' onclick='google.friendconnect.requestInvite()'>Invite</a> | " +
				//				        "<a href='#' onclick='google.friendconnect.requestSignOut()'>Sign out</a>";
				//alert('user has been loaded');
				//alert(viewer.getDisplayName());
				//alert(viewer.getId());
				
				// let's redirect the user to our login_google action in auth_other controller
				window.location = "<?php echo site_url('auth_other/gfc_signin/'); ?>" + "/" + viewer.getId();
		  	}
		
			// for displaying friends, but we don't need this for now
		  	//if (!data.get("site_friends").hadError()) 
		  	//{
		    //	var site_friends = data.get("site_friends").getData();
		    //	var list = document.getElementById("friends-list");
		    //	list.innerHTML = "";
		    //	site_friends.each(function(friend) 
		    //	{
		    // 		list.innerHTML += "<li>" + friend.getDisplayName() + "</li>";
		    //	});
		  	//}
		};
	</script>