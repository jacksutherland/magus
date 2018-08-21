/********* TradeWorm JS 2018 *********/
/*** Developer: jacksutherland.com ***/

var wormhole = {
	register: function()
	{
		var errors = $("#errors");
		var username = $("#username");
		var fn = $("#fn");
		var ln = $("#ln");
		var pass = $("#password");
		var cpass = $("#confirm-password");
		var email = $("#email").keyup(function()
		{
			username.val(email.val());
		});

		var addError = function(msg)
		{
			errors.html('<p class="error text-center">' + msg + '</p>');
		}

		$("#register-form").submit(function()
		{
			var isValid = true;

			var unVal = $.trim(username.val());
			var fnVal = $.trim(fn.val());
			var lnVal = $.trim(ln.val());
			var eVal = $.trim(email.val());
			var pwVal = $.trim(pass.val());
			var cpwVal = $.trim(cpass.val());

			if(unVal == "" || fnVal == "" || lnVal == "" || eVal == "" || pwVal == "" || cpwVal == "")
			{
				isValid = false;
				addError("All fields are required.<br>Please make sure all fields are filled out and try again.");
			}
			else if(eVal.indexOf('@') == -1 || eVal.indexOf('.') == -1)
			{
				isValid = false;
				addError("You've entered an invalid email address.");
			}
			else if(pwVal.length < 8 || !pwVal.match(/\d/))
			{
				isValid = false;
				addError("Password must contain 8 characters and have at least 1 number and 1 letter.");
			}
			else if(pwVal != cpwVal)
			{
				isValid = false;
				addError("Passwords do not match.");
			}

			return isValid;
		});
	}
}