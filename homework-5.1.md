## Homework 5.1: Starting to understand more complex French

* Login to Github and approve my pull request to get the file `homework-5.1.md` in your `assignments` repository.
* Log into Cloud9 and use `git pull` to get the file into your workspace.
 
* Find [the Wordpress project on Github][wordpress], fork it into your own account, and clone it into a Cloud9 workspace.
* Open your Wordpress workspace and find a file that has some branching _if-then-else_ logic; look for some juicy conditionals and guard clauses.
* Copy-paste your examples into `homework-5.1.md` (this file) and attempt to identify the conditions with comments like so:
> USERNAME/Wordpress/path/to/file.php:00
> ```php
>   if ( $mom_says == 'yes' ) // if mom says yes
> ```

* Save your file locally, add and commit it with git, and push your changes to your Github account.
* **Bonus points**: open a pull request back to the original repo with your work to date.

[wordpress]:https://github.com/Wordpress/Wordpress/

https://c9.io/flowerflirt44/wordpress: 59
```php
    <?php if ( empty($_GET['key']) && empty($_POST['key']) ) { ?>

		<h2><?php _e('Activation Key Required') ?></h2>
		<form name="activateform" id="activateform" method="post" action="<?php echo network_site_url('wp-activate.php'); ?>">
			<p>
			    <label for="key"><?php _e('Activation Key:') ?></label>
			    <br /><input type="text" name="key" id="key" value="" size="50" />
			</p>
			<p class="submit">
			    <input id="submit" type="submit" name="Submit" class="submit" value="<?php esc_attr_e('Activate') ?>" />
			</p>
		</form>

	<?php } else {

		$key = !empty($_GET['key']) ? $_GET['key'] : $_POST['key'];
		$result = wpmu_activate_signup($key);
		if ( is_wp_error($result) ) {
			if ( 'already_active' == $result->get_error_code() || 'blog_taken' == $result->get_error_code() ) {
			    $signup = $result->get_error_data();  // if already active result in getting error code
				?>
				<h2><?php _e('Your account is now active!'); ?></h2>
				<?php
				echo '<p class="lead-in">';
				if ( $signup->domain . $signup->path == '' ) {
					printf( __('Your account has been activated. You may now <a href="%1$s">log in</a> to the site using your chosen username of &#8220;%2$s&#8221;. Please check your email inbox at %3$s for your password and login instructions. If you do not receive an email, please check your junk or spam folder. If you still do not receive an email within an hour, you can <a href="%4$s">reset your password</a>.'), network_site_url( 'wp-login.php', 'login' ), $signup->user_login, $signup->user_email, wp_lostpassword_url() );  // if sign up then message check email
				} else {
					printf( __('Your site at <a href="%1$s">%2$s</a> is active. You may now log in to your site using your chosen username of &#8220;%3$s&#8221;. Please check your email inbox at %4$s for your password and login instructions. If you do not receive an email, please check your junk or spam folder. If you still do not receive an email within an hour, you can <a href="%5$s">reset your password</a>.'), 'http://' . $signup->domain, $signup->domain, $signup->user_login, $signup->user_email, wp_lostpassword_url() );
				}
				echo '</p>';
			} else {
				?>
				<h2><?php _e('An error occurred during the activation'); ?></h2> // else an error occured during activation
				<?php
			    echo '<p>'.$result->get_error_message().'</p>';
			}
		} else {
			extract($result);
			$url = get_blogaddress_by_id( (int) $blog_id);
			$user = get_userdata( (int) $user_id);
			?>
			<h2><?php _e('Your account is now active!'); ?></h2>

			<div id="signup-welcome">
				<p><span class="h3"><?php _e('Username:'); ?></span> <?php echo $user->user_login ?></p>
				<p><span class="h3"><?php _e('Password:'); ?></span> <?php echo $password; ?></p>
			</div>

			<?php if ( $url != network_home_url('', 'http') ) : ?>
				<p class="view"><?php printf( __('Your account is now activated. <a href="%1$s">View your site</a> or <a href="%2$s">Log in</a>'), $url, $url . 'wp-login.php' ); ?></p>
			<?php else: ?> // if url then account is now activ
				<p class="view"><?php printf( __('Your account is now activated. <a href="%1$s">Log in</a> or go back to the <a href="%2$s">homepage</a>.' ), network_site_url('wp-login.php', 'login'), network_home_url() ); ?></p>
			<?php endif;
		}
    ```