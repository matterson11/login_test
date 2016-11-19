<?php
session_start();
include('header.php');
include_once '../bootstrap.php';
include_once '../classes/User.php';


if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
$username = $_SESSION['username'];
$user_id = $_SESSION['user'];

$user = new User();
$list = $user->getAccountList($user_id);
$logins = $user->getLoginAttempts($user_id);

if (isset($_POST['btn-remove'])) {
    if (isset($_POST['account_id'])) {
        $account_id = $_POST['account_id'];
        $delete_account = $user->deleteAccount($account_id, $user_id);
        echo $delete_account['Msg'];
    }
}

if(isset($_POST['btn-logout']))
{
    session_destroy();
    unset($_SESSION['user']);
    header("Location: index.php");
}

?>

<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<div class="row">
			<h1>Signed in as <?php echo $username; ?></h1>
			<div class="table-responsive">
				<table class="table table-bordered">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Delete Account</th>
				</tr>
				<?php
				foreach($list as $k => $val)
				{
					$account_id = $val['id'];
					$account_name = $val['name'];
				?>
				<tr>
					<td><?php echo $account_id; ?></td>
					<td><?php echo $account_name; ?></td>
					<td>
					    <form action="" method="post" id="form-portfolio">
					        <input type="submit" class="btn btn-default" name="btn-remove"
					               value="Remove"/>
					        <input type="hidden" name="account_id" value="<?php echo $account_id; ?>">
					    </form>
					</td>
				</tr>

				<?php
				}
				?>
				</table>
			</div>
		</div>
		<div class="row">
			<h1>Login Attempts</h1>
			<div class="table-responsive">
				<table class="table table-bordered">
				<tr>
					<th>ID</th>
					<th>Date</th>
				</tr>
				<?php
				foreach($logins as $k => $val)
				{
				?>
				<tr>
					<td><?php echo $val['id']; ?></td>
					<td><?php echo $val['date']; ?></td>
				</tr>

				<?php
				}
				?>
				</table>
			</div>
		</div>
		<div class="row">
			<form action="" method="post" id="form-portfolio">
			    <input type="submit" class="btn btn-default" name="btn-logout" value="Logout"/>
			</form>
		</div>
	</div>
</div>
</body>
</html>