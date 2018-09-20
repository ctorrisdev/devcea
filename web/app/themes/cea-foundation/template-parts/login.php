<form method="post" action="http://example.com/wp-login.php" id="loginform" name="loginform" class="bg-black grid-container grid-padding-y grid-padding-x padding-y">
  <h3>connection</h3>
  <div class="grid-x grid-padding-x align-bottom">
    <div class="medium-12 large-5 cell">
      <label for="user_login">Identifiant</label>
      <input type="text" id="user_login" name="log" placeholder="">
    </div>
    <div class="medium-12 large-5 cell">
      <label for="user_pass">Mot de passe</label>
      <input type="text" id="user_pass" name="pwd" placeholder="">
    </div>
    
       <div class=" medium-12 large-2 cell show-for-medium">
       <input type="submit" tabindex="100" value="Ok" id="wp-submit" name="wp-submit" class="button hollow">
      <input type="hidden" value="http://example.com/" name="redirect_to">
    </div>
  </div>

  <div class="grid-x grid-padding-x">
    <div class="medium-6 cell">
      <input type="checkbox" tabindex="90" value="forever" id="rememberme" name="rememberme"> <label>Rester connecter</label>
    </div>
    <div class="medium-6 cell">
      <a href="http://example.com/wp-login.php?action=lostpassword">Mot de passe oublié ?</a>
    </div>
  </div>

  <div class="grid-x grid-padding-x hide-for-medium-up">
    <div class="small-12 cell">
      <input type="submit" tabindex="100" value="Se connecter" id="wp-submit" name="wp-submit" class="button hollow">
      <input type="hidden" value="http://example.com/" name="redirect_to">
    </div>
  </div>
</form>