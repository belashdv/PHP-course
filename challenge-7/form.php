<!--Task: Build an Email form

Fields: Name(required), Email(required), Reason to contact(as a select box)(required), Message(required).

Then validate the data. Make sure that required fields is filled and email is correct format. Then send it to yourself.-->
<?php 
	$form_data = ( ! empty( $_POST ) ) ? $_POST : null; 	
	$form_is_complete = ( empty( $_POST ) ) ? false : null;

	function check_required( $value ) {
        global $form_is_complete;
		if( empty( trim( $value ) ) ) {
			echo '<p class="alert">This is a required field.</p>';
			$form_is_complete = false;
		} 
	}

	function check_email( $email ) {
        global $form_is_complete;
		$regex= '^[\w\.=-]+@[\w\.-]+\.[\w]{2,3}$^';
		if ( ! preg_match( $regex, $email ) ) {
			echo '<p class="alert">You did not input a valid email address.</p>';
			$form_is_complete = false;
		}
	}

	function send_message( $form_data ) {
		$name = filter_var( strip_tags( trim( $form_data['name'] ) ), FILTER_SANITIZE_MAGIC_QUOTES );
		$email = filter_var( $form_data['email'], FILTER_SANITIZE_EMAIL );
		$to = "Dmitrii Belash <belashdv@inbox.lv>";
		$from = "$name <$email>";
		$reason = ucfirst( $form_data['reason'] );
		$subject = "Reason for contact: : $reason";
		$message = filter_var( strip_tags( trim( $form_data['message'] ) ), FILTER_SANITIZE_MAGIC_QUOTES );
		$message = 'From: ' . $from . ', for '. $reason . "\n\n" . $message;

		$headers = 'From: ' . $from . "\r\n" .
    		'Reply-To: ' . $from . "\r\n" .
    		'X-Mailer: PHP/' . phpversion();

		if( mail( $to, $subject, $message, $headers ) )  {
			echo "<h3>Your message has been sent!</h3>";
		}
	}
	
?>
<h2>Contact me</h2>
<form name="contact" method="POST">
    <div>
		<?php if ( isset( $form_data['name'] ) ) check_required( $form_data['name'] ); ?>
        <label for="name">Name:</label> 
        <input type="text" name="name" placeholder="Your name" required/>
    </div>
    <div>
		<?php if ( isset( $form_data['email'] ) ) {
                check_required( $form_data['email'] );
                check_email( $form_data['email'] );
            }  
    	?>
        <label for="email">Email:</label> 
        <input type="email" name="email" placeholder="Your email" required/>
    </div>
    <div>
		<p>Reason for Contact:</p>
		<select name="reason">
			<option value="Consult">Consultation</option>
			<option value="Question">Question</option>
			<option value="Say Hello">Say Hello</option>
		</select>
	</div>
    <div style="margin-top: 10px;">
		<label for="message">What's your message?</label><br/>
		<?php if ( isset( $form_data['message'] ) ) check_required( $form_data['message'] ); ?>
		<textarea name="message" required></textarea>
	</div>
	<div style="margin-top: 10px;">
        <input type="submit" name="submit" value="Submit" />
    </div>
</form>

<?php 
    $form_is_complete = ( !is_null( $form_is_complete ) ) ?  $form_is_complete : true;
	if ( true === $form_is_complete) {
		send_message( $form_data );
	}