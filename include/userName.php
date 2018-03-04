<div class="userName"><h19 class="uName"><?php echo $_SESSION["userName"]; ?></h19></div>
<div class="userNameCircle"><h20 class="userNameCircleLetter"></h20></div>
<div class="overlay"></div>
<div class="logOutWrapper">
	<h22>Log out</h22>
	<h22 class="darker"><span>Change user</span></h22>
</div>

<script>
	$(function(){
		theName=$('.uName').html();
		theName=theName.charAt(0);
		$('.userNameCircleLetter').html(theName);	
	})
</script>