<meta name="robots" content="noindex,nofollow">

//***This section is added to functions.php 
//sends user back to login page when they log out
function redirect_to_custom_login_page(){
	wp_redirect(site_url() . "/pabISaHbe");
	exit();
}
add_action("wp_logout", "redirect_to_custom_login_page");

// stops any user from accessing wp-admin or wp-login if not logged in
function fn_redirect_wp_admin(){
	global $pagenow;
	if($pagenow == "wp-login.php"  && !is_user_logged_in() ){
		wp_redirect(site_url() );
		exit();
	}
	if($pagenow == "wp-admin" && !is_user_logged_in() ){
		wp_redirect(site_url() );
		exit();
	}
}
add_action('init', "fn_redirect_wp_admin");





<?php


/* Template Name: Custom Login Page */

get_header();

global $user_ID;
global $wpdb;
        if( !$user_ID ) {

            if( $_POST ) {
                $username = $wpdb->_escape($_POST['username']);
                $password = $wpdb->_escape($_POST['password']);

                $login_array = array();
                $login_array['user_login'] = $username;
                $login_array['user_password'] = $password;

                $verify_user = wp_signon( $login_array, true);

                if( !is_wp_error( $verify_user ) ){
                    echo "<script>window.location = '".site_url()."/wp-admin/'</script>";
                } else {
                    ?>
                    <div class="container">
                    <div class="row" style="margin-top: 5%; margin-bottom: 10%;">
                        <div class="col-sm"></div>
                        <div class="col-sm">
                            <img src="https://www.rocketprotpo.com/wp-content/uploads/2020/10/RocketProTPO-WebHeaderLogo250x100.jpg" alt="Rocket Pro TPO" class="logo_standard"><form method="post" style="margin-top:5%;">
                            <h4 class="log_form">
                                <label for="username">Username/Email</label>
                                <input type="text" id="username" name="username" placeholder="Enter Username or Email" />
                            </h4>
                            <h4 class="log_form">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="Enter Password" />
                            </h4>
                                <h3 style="color: #c8102e">Not So Much, Try Again</h3>
                                <p class="log_form">
                                <button type="submit">Login</button>
                            </p>
                            </form>
                        </div>
                        <div class="col-sm"></div>
                    </div>
                </div>
                    <?php
                }

            }else{
                //user is logged out
                ?>
                <div class="container">
                    <div class="row" style="margin-top: 5%; margin-bottom: 10%;">
                        <div class="col-sm"></div>
                        <div class="col-sm">
                            <img src="https://www.rocketprotpo.com/wp-content/uploads/2020/10/RocketProTPO-WebHeaderLogo250x100.jpg" alt="Rocket Pro TPO" class="logo_standard">
                            <form method="post" style="margin-top:5%;">
                            <h4 class="log_form">
                                <label for="username">Username/Email</label>
                                <input type="text" id="username" name="username" placeholder="Enter Username or Email" />
                            </h4>
                            <h4 class="log_form">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="Enter Password" />
                            </h4>
                            <p class="log_form">
                                <button type="submit">Login</button>
                            </p>
                            </form>
                        </div>
                        <div class="col-sm"></div>
                    </div>
                </div>
            <?php
            }
            get_footer();
        } else {

            // user is logged in
        }
    ?>