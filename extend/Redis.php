<?php 

namespace extend;

/**
 * redis 操作类
 */
class Redis
{
	private $redis;
	/**
	 * 构造函数，配置redis
	 */
	public function __construct()
	{
		$host = redisConfig("host");
		$port = redisConfig("port");
		$auth = redisConfig("auth");
		
		$redis = new \Redis();
		$redis->connect($host,$port);
		if($auth){
			$redis->auth($auth);
		}
		$this->redis = $redis;
	}

    /**
     * 设置缓存
     * @param $key
     * @param $data
     */
	public function set($key,$data){
		$this->redis->set($key,$data);
	}

    /**
     * 读取缓存
     * @param $key
     * @return false|mixed|string
     */
	public function get($key){
		return $this->redis->get($key);
	}

    /**
     * 添加到队列
     * @param $key
     * @param $data
     * @return false|int
     */
	public function lpush($key,$data){
		return $this->redis->lPush($key,$data);
	}

    /**
     * 从队列中去除最后一个值
     * @param $key
     * @return bool|mixed
     */
	public function rpop($key): bool
    {
		return $this->redis->rPop($key);
	}

    /**
     * redis清空所有数据
     * @return bool
     */
	public function flushall(): bool
    {
		return $this->redis->flushall();
	}
}