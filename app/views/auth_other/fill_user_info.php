<legend>Fill in user info</legend>
<?php echo form_open($this->uri->uri_string()); ?>
	<table>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username" id="username" value="<?php echo set_value('username') != null ? set_value('username') : ''; ?>"/></td>
			<td style="color: red;"><?php echo form_error('username'); ?><?php echo isset($errors['username'])?$errors['username']:''; ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>"/></td>
			<td style="color: red;"><?php echo form_error('email'); ?><?php echo isset($errors['email'])?$errors['email']:''; ?></td>
		</tr>
	</table>
	<button class="btn btn-primary" type="submit">Let me in!</button>
<?php echo form_close(); ?>
				