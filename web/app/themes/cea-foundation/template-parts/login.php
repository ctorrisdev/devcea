<?php if(!is_user_logged_in()): ?>
<form method="post" action="<?php echo wp_login_url( get_permalink() ) ?>" id="loginform" name="loginform" class="bg-black grid-container grid-padding-y grid-padding-x padding-y">
  <h3>connection</h3>
  <div class="grid-x grid-padding-x align-bottom">
    <div class="medium-12 cell">
      <label for="user_login"><?= __('Identifiant'); ?></label>
      <input type="text" id="user_login" name="log" placeholder="">
    </div>
    <div class="medium-12 cell">
      <label for="user_pass"><?= __('Mot de passe'); ?></label>
      <input type="password" id="user_pass" name="pwd" placeholder="">
    </div>
  </div>

  <div class="grid-x grid-padding-x">
    <div class="large-6 cell">
      <input type="checkbox" tabindex="90" value="forever" id="rememberme" name="rememberme"> <label><?= __('Rester connecter'); ?></label>
    </div>
    <div class="large-6 cell">
      <a href="http://dev.c-e-a.asso.fr/wp/wp-login.php?action=lostpassword"><?= __('Mot de passe oublié ?'); ?></a>
    </div>
  </div>

  <div class="grid-x grid-padding-x ">
    <div class="small-12 cell">
      <input type="submit" tabindex="100" value="Se connecter" id="wp-submit" name="wp-submit" class="button expanded">
      <input type="hidden" value="<?php echo esc_url(get_permalink()); ?>" name="redirect_to">
    </div>
  </div>
</form>
<?php endif; ?>