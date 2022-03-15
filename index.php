<?php
ob_start();
session_start();
require_once 'session.php';
require_once 'header_login.php';
?>
<body id="hal-login">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4" id="top-form">
				<div class="login-panel panel panel-default">
					<div id="body-form">
						<br>
						<!-- <img src="assets/img/logo_karantina.png" width="50%"> -->
						<img src="assets/img/silelogo.jpg" width="30%">
						<hr width="80%">
					</div>
					<div class="panel-body radius">
						<?php
                        if (isset($_POST['login'])):

                            $username = htmlspecialchars($conn->real_escape_string(trim($_POST['username'])));
                            $password = htmlspecialchars($conn->real_escape_string(trim($_POST['password'])));

                            $tampil  = $log->masuk($username);
                            $tampil2 = $log->masuk2($username, $password);

                            if ($tampil->num_rows === 0) {

                                echo '<div class="alert alert-danger text-center" style="text-align: center">Username belum terdaftar !</div>';
                            } else {

                                if ($tampil2->num_rows === 0) {

                                    echo '<div class="alert alert-danger text-center" style="text-align: center">Password tidak sesuai !</div>';

                                } else {

                                    require_once 'data_login.php';

                                }
                            }

                        endif;
                        ?>
						<form action="" method="post">
							<fieldset>
								<div class="form-group">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<input type="password" class="form-control" placeholder="Password" name="password" required>
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									</div>
								</div>
								<button class="btn btn-lg btn-info btn-block" type="submit" name="login" id="login">Login</button>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="foot">
		<p id="hariini"></p>
		<p id="jam"></p>
		<div id="skp">
			<b>
			<font color="white">Stasiun Karantina Pertanian Kelas I Sumbawa Besar</font>
			</b>
		</div>
		<!-- <div id="footer" style="margin-left:  0%;">
			<img src="assets/img/footer-bg.png" width="55%">
		</div> -->
	</div>
	<script src="assets/js/time.js"></script>
	<!-- <script src="assets/js/main.js"></script> -->
</body>
</html>
<?php
$connection->destroy();
ob_end_flush();
?>