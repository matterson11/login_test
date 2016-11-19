<?php

class User
{
    protected $mysqli;

    protected function connect() {
        $this->mysqli = new mysqli('localhost', 'root', '', 'test.db');

    }

    public function getAccountList($user_id)
    {
		$this->connect();

    	$query = $this->mysqli->query("SELECT * FROM accounts
    		join account_user on accounts.id = account_user.account_id
    		where account_user.user_id = '".$user_id."' ");
    	
        $page = [];
		$key = 0;
		while ($userRow = $query->fetch_assoc()) {
            $page[$key]['id'] = $userRow["id"];
            $page[$key]['name'] = $userRow["name"];
            $key++;
        }
        return $page;
    }

    public function getLoginAttempts($user_id)
    {
		$this->connect();

    	$query = $this->mysqli->query("SELECT * FROM login_attempt
    		where user_id = '".$user_id."' order by attempt_at desc limit 5");
    	
        $page = [];
		$key = 0;
		while ($userRow = $query->fetch_assoc()) {
            $page[$key]['id'] = $userRow["user_id"];
            $page[$key]['date'] = $userRow["attempt_at"];
            $key++;
        }
        return $page;
    }

    public function deleteAccount($account_id, $user_id)
    {
		$this->connect();
		
		$removeAccount = $this->mysqli->query("delete from account_user
where account_id = '" . $account_id . "' and user_id = '" . $user_id . "'");

		if($removeAccount){
			$query = $this->mysqli->query("SELECT name FROM accounts
    		where id = '".$account_id."' ");
    		$row = $query->fetch_array();
			$account_name = $row['name'];
			return ["Account" => $account_name, "Status" => "Success", "Msg" => "$account_name removed"];
		} else {
			return ["Account" => $account_name, "Status" => "Fail", "Msg" => "Could not delete account"];
		}
    }


}