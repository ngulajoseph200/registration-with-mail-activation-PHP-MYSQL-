<h2>Registration With Mail Activation in PHP &amp; MYSQL</h2>
<p>Nowadays web developers are creating user registration with mail activation. In my own opinion, some of the reasons behind this are:
EMail activation is primarily used to ensure that you're signing up with a real email address, and also one that you have access to and therefore you are the legitimate owner of the email address.</p>

<p>However, It takes care of some jokers(some end users of the site) who may submit funny data to the site.</p>
<h2>Download / Clone</h2>
<p>Clone using git</p>
<pre>git clone https://github.com/ngulajoseph200/registration-with-mail-activation-PHP-MYSQL-.git</pre>
<p>Alternatively you can <a id="url" target="_blank" href="https://codeload.github.com/ngulajoseph200/registration-with-mail-activation-PHP-MYSQL-/zip/master">Download</a> this repository, the zipped folder and and extract the zipped files. Open the includes folder and edit the database config file(config.php) to match your database configurations.</p>
<h2>Installation</h2>
<p>Upload the files in your root-folder in your online server and open the register.php file in your browser. 
(i.e mydomain.com/register.php), register and try signing in before activating your account to see what will happen. If you get a error dialog box during the signing in, then you'll have to open the email account associated with the email address that you registered with and then click on the activation link to activate your account. Once your account is active, you may now login.</p>
<p>Don't worry about the forms validations, have taken care of that.</p>
<p>Otherwise if you want to install it in your local server to test whether the email will be send to your email account, then you will need to install a mailing server. </p>


