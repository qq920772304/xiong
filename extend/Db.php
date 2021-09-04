<?php

namespace extend;

/**
 * 链接数据库
 */
class Db
{
	public $pdo;
	public function __construct()
	{
		//数据库类型
		$dbms	=	dbConfig('dbms');
		//数据库主机名	
		$host	=	dbConfig('host');
		//使用的数据库
		$dbname =	dbConfig('dbname');
		//数据库连接用户名		
		$user	=	dbConfig('user');
		//对应的密码		
		$pass	=	dbConfig('pass');
		//对应端口
		$port 	=   dbConfig('port');
		//链接数据库信息		
		$dsn	=	"$dbms:host={$host};charset=utf8;port={$port};dbname={$dbname}";
		try {
		    $pdo = new \PDO($dsn, $user, $pass); //初始化一个PDO对象
		    $this->pdo = $pdo;
		} catch (\PDOException $e) {
		    die ("链接数据库出现错误：".$e->getMessage());
		}
	}

    /**
     * 查询数据
     * @param $sql
     * @param int $type
     * @return array
     */
	public function query($sql,$type = 0){
	    $pdo = $this->pdo;
	    $smt = $pdo->query($sql);
	    $rows = $smt->fetchAll(\PDO::FETCH_ASSOC);
	    if($type){
            return $rows[0];
        }else{
            return $rows;
        }
    }

    /**
     * 删除、更新、插入
     * @param $sql
     * @return false|int
     */
    public function exec($sql){
        $pdo = $this->pdo;
        $row = $pdo->exec($sql);
        if($pdo->errorInfo()[2]){
            throw new \Exception($pdo->errorInfo()[2]);
        }
        return $row;
    }
}