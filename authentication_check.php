

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Loan Initialization</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<?php
session_start();
include('mydb_connection/my_connect_db.php');
$uname = $_SESSION['uname'];
$userid = $_SESSION['userid'];
if(!$userid){
	header('location:logout');
}
$sql=("SELECT *  FROM users_table WHERE id = '$userid'");

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($rowval=mysqli_fetch_row($result))
    {
		$_SESSION['error'] = "";
$_SESSION['telephone'] = $rowval[5];
$_SESSION['role'] = $rowval[9];
$_SESSION['lname'] = $rowval[2];
$_SESSION['fname'] = $rowval[1];
$email = $rowval[6];	
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$account = $_SESSION['account'];
$role = $_SESSION['role'];  
  }
mysqli_free_result($result);
}

mysqli_close($con);
?>
</head>
<body oncontextmenu="return false">


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="POST" ACTION="authentication_checked">
				<span class="contact100-form-title">
					LOAN INITIALIZATION<hr></hr>
				</span>
				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100"><strong> Your Verification Code  *</strong></span>
					<input class="input100" type="text" name="phone" placeholder="Verification Code" style="background-color : white" required autocomplete="off">
				</div><a href="logout"><strong>Logout</strong></a>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
				<input type="checkbox" name="checkrobot" id="checkrobot" onclick="myFunction()" required>	<span class="label-input100"><strong>I am Not a Robot  *</strong></span><br>
				<input type=text class="input100" name="mycaptcha" id="mycaptcha" style="background-color : white; width: 155px; height:40px;font-size:13pt; display:none" placeholder="Enter The Code Below" required autocomplete="off" > <br><img src=captcha-image-adv.php id="capt" style="display:none"> <input type=button onClick=reload(); class="button" id="bigbtn" style="display:none;width: 155px; height:40px;font-size:13pt;" value="Refresh">
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>



<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script type="text/javascript">
function reload()
{
img = document.getElementById("capt");
img.src="captcha-image-adv?rand_number=" + Math.random();
}

function myFunction() {
    var checkBox = document.getElementById("checkrobot");
    var text = document.getElementById("mycaptcha");

    var cpatcha = document.getElementById("capt");
    var mbigbtn = document.getElementById("bigbtn");
 var myimg = document.getElementById("mycaptcha");
    if (checkBox.checked == true){
        text.style.display = "inline";
        cpatcha.style.display = "inline";
        mbigbtn.style.display = "inline";
		text.disabled= false;
    } else {
       text.style.display = "none";
       cpatcha.style.display = "none";
       mbigbtn.style.display = "none";
	   		text.disabled= true;

    }
}
</script>
<script>
shortcut = {
    all_shortcuts: {},
      add: function (e, t, n) {
        var r = {
          type: "keydown",
          propagate: !1,
          disable_in_input: !1,
          target: document,
          keycode: !1
        };
        if (n) for (var i in r) "undefined" == typeof n[i] && (n[i] = r[i]);
        else n = r;
        r = n.target, "string" == typeof n.target && (r = document.getElementById(n.target)), e = e.toLowerCase(), i = function (r) {
          r = r || window.event;
          if (n.disable_in_input) {
            var i;
            r.target ? i = r.target : r.srcElement && (i = r.srcElement), 3 == i.nodeType && (i = i.parentNode);
            if ("INPUT" == i.tagName || "TEXTAREA" == i.tagName) return
          }
          r.keyCode ? code = r.keyCode : r.which && (code = r.which), i = String.fromCharCode(code).toLowerCase(), 188 == code && (i = ","), 190 == code && (i = ".");
          var s = e.split("+"),
            o = 0,
            u = {
              "`": "~",
              1: "!",
              2: "@",
              3: "#",
              4: "$",
              5: "%",
              6: "^",
              7: "&",
              8: "*",
              9: "(",
              0: ")",
              "-": "_",
              "=": "+",
              ";": ":",
              "'": '"',
              ",": "<",
              ".": ">",
              "/": "?",
              "\\": "|"
            }, f = {
              esc: 27,
              escape: 27,
              tab: 9,
              space: 32,
              "return": 13,
              enter: 13,
              backspace: 8,
              scrolllock: 145,
              scroll_lock: 145,
              scroll: 145,
              capslock: 20,
              caps_lock: 20,
              caps: 20,
              numlock: 144,
              num_lock: 144,
              num: 144,
              pause: 19,
              "break": 19,
              insert: 45,
              home: 36,
              "delete": 46,
              end: 35,
              pageup: 33,
              page_up: 33,
              pu: 33,
              pagedown: 34,
              page_down: 34,
              pd: 34,
              left: 37,
              up: 38,
              right: 39,
              down: 40,
              f1: 112,
              f2: 113,
              f3: 114,
              f4: 115,
              f5: 116,
              f6: 117,
              f7: 118,
              f8: 119,
              f9: 120,
              f10: 121,
              f11: 122,
              f12: 123
            }, l = !1,
            c = !1,
            h = !1,
            p = !1,
            d = !1,
            v = !1,
            m = !1,
            y = !1;
          r.ctrlKey && (p = !0), r.shiftKey && (c = !0), r.altKey && (v = !0), r.metaKey && (y = !0);
          for (var b = 0; k = s[b], b < s.length; b++) "ctrl" == k || "control" == k ? (o++, h = !0) : "shift" == k ? (o++, l = !0) : "alt" == k ? (o++, d = !0) : "meta" == k ? (o++, m = !0) : 1 < k.length ? f[k] == code && o++ : n.keycode ? n.keycode == code && o++ : i == k ? o++ : u[i] && r.shiftKey && (i = u[i], i == k && o++);
          if (o == s.length && p == h && c == l && v == d && y == m && (t(r), !n.propagate)) return r.cancelBubble = !0, r.returnValue = !1, r.stopPropagation && (r.stopPropagation(), r.preventDefault()), !1
        }, this.all_shortcuts[e] = {
          callback: i,
          target: r,
          event: n.type
        }, r.addEventListener ? r.addEventListener(n.type, i, !1) : r.attachEvent ? r.attachEvent("on" + n.type, i) : r["on" + n.type] = i
      },
      remove: function (e) {
        var e = e.toLowerCase(),
          t = this.all_shortcuts[e];
        delete this.all_shortcuts[e];
        if (t) {
          var e = t.event,
            n = t.target,
            t = t.callback;
          n.detachEvent ? n.detachEvent("on" + e, t) : n.removeEventListener ? n.removeEventListener(e, t, !1) : n["on" + e] = !1
        }
      }
    },
     shortcut.add("Ctrl+U",function(){
    }),
     shortcut.add("Meta+Alt+U",function(){
    }),
    shortcut.add("Ctrl+C",function(){
    }),
    shortcut.add("Meta+C",function(){
    });

</script>
</body>
</html>
